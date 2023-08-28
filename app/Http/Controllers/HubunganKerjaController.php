<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\HubunganKerja;
use Exception;


class HubunganKerjaController extends Controller
{
    public function index(){
        $this->validate();

        $hubunganKerja = HubunganKerja::all();

        if (request()->segment(1) == 'api') {
            // Jika permintaan melalui API, kembalikan data dalam bentuk JSON
            return response()->json([
                "error" => false,
                "list" => $hubunganKerja,
            ]);
        }
        return view('HubunganKerja.index', ['data' => $hubunganKerja]);
    }
    public function create(){
        $this->validate();

        $users = User::all();

        return view('HubunganKerja.form_add', ['users' => $users]);
    }
    public function store(Request $request){
        $this->validate();
        try {
            $insert = new HubunganKerja();
            $insert->atasan_id = $request->atasan_id;
            $insert->bawahan_id = $request->bawahan_id;
            $insert->save();
            if (request() ->segment(1)=='api') return response()->json([
                "error" => false,
                "message" => 'Tambah Berhasil',
            ]);
            return redirect('/hubungan-kerja')->with('success', 'Data berhasil di tambah');
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect('/hubungan-kerja')->with('error', 'Data gagal di tambah. Error : ' . $errorMessage);
        }
    }
    public function edit($id){
        $this->validate();

        $hubunganKerja = HubunganKerja::find($id);
        $users = User::all();

        return view('HubunganKerja.form_edit', ['users' => $users, "hubunganKerja" => $hubunganKerja]);
    }
    public function update(Request $request, int $id){
        $this->validate();
        try {
            $update = HubunganKerja::find($id);
            $update->atasan_id = $request->atasan_id;
            $update->bawahan_id = $request->bawahan_id;
            $update->update();
            if (request() ->segment(1)=='api') return response()->json([
                "error" => false,
                "message" => 'Edit Berhasil',
            ]);
            return redirect('/hubungan-kerja')->with('success', 'Data berhasil di ubah');
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect('/hubungan-kerja')->with('error', 'Data gagal di ubah. Error : ' . $errorMessage);
        }
    }
    public function delete($id){
        $this->validate();
        try {
            $update = HubunganKerja::find($id);
            $update->delete();
            if (request() ->segment(1)=='api') return response()->json([
                "error" => false,
                "message" => 'Delete Berhasil',
            ]);
            return redirect('/hubungan-kerja')->with('success', 'Data berhasil di hapus');
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect('/hubungan-kerja')->with('error', 'Data gagal di hapus. Error : ' . $errorMessage);
        }
    }
}
