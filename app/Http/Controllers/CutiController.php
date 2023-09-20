<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\User;
use App\Models\Rules;
use App\Models\liburNasional;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\LogKegiatan;
use App\Models\HubunganKerja;
use Exception;

class CutiController extends Controller
{
    public function getLamaKerja(){
        $rules = Rules::where('key', "lama_kerja")->first();
        $lamaKerja = $rules["value"];
        return $lamaKerja;
    }
    public function index(){
        $this->validate();
        if(request()->segment(1) == 'api'){
            $usersId = request()->input('users_id'); // Ambil nilai users_id dari query parameter

            if ($usersId) {
                // Jika users_id diberikan, ambil data log absen yang sesuai dengan users_id
                $cuti = Cuti::where('users_id', $usersId)->get();
            } else {
                // Jika users_id tidak diberikan, ambil semua data log absen
                $cuti = Cuti::all();
            }
            return response()->json([
                "error" => false,
                "list" => $cuti,
            ]);
        }else{
            if(Auth::user()->role_id == 1){
                $cuti = Cuti::with('User')
                    ->where('type', 1)
                    ->get();
    
                $izin = Cuti::with('User')
                    ->where('type', 2)
                    ->get();
            }else{
                $hubunganKerja1 = HubunganKerja::where('atasan_id', Auth::id())->select("bawahan_id")->get();
                $hubunganKerja2 = HubunganKerja::whereIn('atasan_id', $hubunganKerja1)->select("bawahan_id")->get();
                $cuti1 = Cuti::with('User')->whereIn('users_id', $hubunganKerja1)->where("type", 1)->where("status", NULL);
                $cuti = Cuti::with('User')->whereIn('users_id', $hubunganKerja2)->where("type", 1)->where("status", 1)->union($cuti1)->get();
                $izin = Cuti::with('User')->whereIn('users_id', $hubunganKerja1)->where("type", 2)->get();
            }
            return view('cuti.index', ['data' => $cuti, 'dataIzin' => $izin]);
        }
    }

    public function filter(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $cuti = Cuti::whereDate('tanggal_awal','>=',$start_date)->whereDate('tanggal_akhir','<=',$end_date)->get();

        //dd($log_absen);

        return view('cuti.index', ['data'=>$cuti]);
    }

    public function create(){
        $libur_nasional = liburNasional::pluck('tanggal')->toArray();
        $users = DB::table('users')->get();
        return view('cuti.add_form_cuti', [
            'users' => $users,
            'title' => 'Tambah Cuti',
            'method' => 'POST',
            'action' => 'cuti'
        ], compact('libur_nasional'));
    }

    public function store(Request $request){
        try{
            $user = User::find($request->nama);

            $liburNasional = LiburNasional::pluck('tanggal')->toArray();
            $total = 0;
            $cutiData = new Cuti;
            $cutiData->users_id = $request->nama ;
            $cutiData->tanggal_awal = $request->tanggal_awal;
            $cutiData->tanggal_akhir = $request->tanggal_akhir;
            $currentDate = $request->tanggal_awal;
            $endDate = $request->tanggal_akhir;

            if($liburNasional != null){
                foreach($liburNasional as $items){
                        while($currentDate <= $endDate){
                            $dayOfWeek = date('l', strtotime($currentDate));
                            $currentDate = date('Y-m-d', strtotime($currentDate. '+1 day'));
                            if($dayOfWeek != "Sunday" && $dayOfWeek != "Saturday" && $currentDate != $items && $endDate != $items){
                                $total = $total + 1;
                                
                            }
                            
                        }
                        $cutiData->jumlah_hari = $total;
                        
                }
            }else{
                while($currentDate <= $endDate){
                    $dayOfWeek = date('l', strtotime($currentDate));
                    $currentDate = date('Y-m-d', strtotime($currentDate. '+1 day'));
                    if($dayOfWeek != "Sunday" && $dayOfWeek != "Saturday" ){
                        $total = $total + 1;
                        
                    }
                    
                }
                $cutiData->jumlah_hari = $total;
            }

            if($cutiData->jumlah_hari > $user->sisa_cuti) return redirect('/cuti')->with('error', 'Sisa cuti mu kurang, silahkan ubah waktu cuti. Sisa cuti ' . $user->sisa_cuti . ".");
            
            $cutiData->deskripsi = $request->deskripsi;
            $cutiData->type = $request->type;
            $cutiData->save();
            if (request()->segment(1)=='api') return response()->json([
                "error" => false,
                "message" => 'Tambah cuti berhasil',
            ]);
            

            if (Auth::check())
            {
                date_default_timezone_set("Asia/Jakarta");
                $id = Auth::id();
                $date = date("Y-m-d h:i:sa");
                $data = $request->nama;
                $text = 'Melakukan Tambah Cuti Karyawan ' . $data;
                $logKegiatan = new LogKegiatan;
                $logKegiatan->users_id = $id;
                $logKegiatan->kegiatan = $text;
                $logKegiatan->created_at = $date;
                $logKegiatan->save();
            }
            if (request() ->segment(1)=='api') return response()->json([
                "error" => false,
                "message" => 'Tambah Berhasil',
            ]);

            // $user = User::find($request->nama);
            // $user->jam_lebih = $user->jam_lebih - ($request->jumlah_jam*60); // Subtract $newValue from the old value
            // $user->save();

            return redirect('/cuti')->with('success', 'Data berhasil di tambah');
        }catch(Exception $e){
            $errorMessage = $e->getMessage();
            return redirect('/cuti')->with('error', 'Data gagal di tambah. Error : ' . $errorMessage);
        }        
        
    }


    public function show_approval($id){
        $data = Cuti::find($id);

        return view('cuti.approval_cuti', compact('data'));
    }
    public function approval($id, Request $request)
    {
        try{
            $data = Cuti::find($id);
            $data->status = (int)$request->status;

            //1 diterima, 2 ditolak, null belum diproses
            if($request->status == 2){
                $user = User::find($data->users_id);
                $temp = $user->sisa_cuti - $data->jumlah_hari;
                $user->sisa_cuti = $temp;

                $data->update();
                $user->update();
                
                if (Auth::check())
                {
                    date_default_timezone_set("Asia/Jakarta");
                    $id = Auth::id();
                    $date = date("Y-m-d h:i:sa");
                    $data = $user->nama;
                    $text = 'Melakukan Approval Cuti Pada Karyawan ' . $data;
                    $logKegiatan = new LogKegiatan;
                    $logKegiatan->users_id = $id;
                    $logKegiatan->kegiatan = $text;
                    $logKegiatan->created_at = $date;
                    $logKegiatan->save();
                }
            }else if($request->status == 3 || $request->status == 1){
                $user = User::find($data->users_id);
                $data->update();

                if (Auth::check())
                {
                    date_default_timezone_set("Asia/Jakarta");
                    $id = Auth::id();
                    $date = date("Y-m-d h:i:sa");
                    $data = $user->nama;
                    $text = 'Melakukan Approval Cuti Pada Karyawan ' . $data;
                    $logKegiatan = new LogKegiatan;
                    $logKegiatan->users_id = $id;
                    $logKegiatan->kegiatan = $text;
                    $logKegiatan->created_at = $date;
                    $logKegiatan->save();
                }
            }

            return redirect('/cuti')->with('success', 'Data cuti berhasil diperbarui');
        }catch(Exception $e){
            $errorMessage = $e->getMessage();
            return redirect('/cuti')->with('error', 'Data cuti gagal diperbarui');
        }
        //dd($id);
        
        
    }

    public function storeMobile(Request $request){
        try{
        $user = User::find($request->nama);


        $liburNasional = LiburNasional::pluck('tanggal')->toArray();
        $total = 0;
        $cutiData = new Cuti;
        $cutiData->users_id = $request->users_id ;
        $cutiData->tanggal_awal = $request->tanggal_awal;
        $cutiData->tanggal_akhir = $request->tanggal_akhir;
        $currentDate = $request->tanggal_awal;
        $endDate = $request->tanggal_akhir;


        if($liburNasional != null){

            foreach($liburNasional as $items){
                    while($currentDate <= $endDate){
                        $dayOfWeek = date('l', strtotime($currentDate));
                        $currentDate = date('Y-m-d', strtotime($currentDate. '+1 day'));
                        if($dayOfWeek != "Sunday" && $dayOfWeek != "Saturday" && $currentDate != $items && $endDate != $items){
                            $total = $total + 1;
                            
                        }
                        
                    }
                    $cutiData->jumlah_hari = $total;
                    
            }

        }else{

            while($currentDate <= $endDate){
                $dayOfWeek = date('l', strtotime($currentDate));
                $currentDate = date('Y-m-d', strtotime($currentDate. '+1 day'));
                if($dayOfWeek != "Sunday" && $dayOfWeek != "Saturday" ){
                    $total = $total + 1;
                    
                }
                
            }
            $cutiData->jumlah_hari = $total;
        }


        
        $cutiData->deskripsi = $request->deskripsi;
        $cutiData->save();




        if (request()->segment(1)=='api') return response()->json([
            "error" => false,
            "message" => 'Tambah cuti berhasil',
        ]);
        

        }catch(Exception $e){
            $errorMessage = $e->getMessage();
        }        
        
    }
}
