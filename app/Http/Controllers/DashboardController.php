<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\logAbsen;
use App\Models\Ketidakhadiran;
use Exception;

class DashboardController extends Controller
{
    function index()
    {
        $this->validate();
        // $result=DB::select(DB::raw("select count(*) as total, keterlambatan from log_absen group by keterlambatan"));
        // dd($result);
        $lateDailyLog = $this->getLateDailyLog();
        return view('dashboard', compact('lateDailyLog'));
    }

    function getLateDailyLog()
     {
        $today = date('Y-m-d');
        $query = logAbsen::select('jam_masuk', 'nama')->join('users', 'users.id', 'log_absen.users_id' )
                ->where('keterlambatan', '=', '1')
                ->where('tanggal', '=', '2023-07-03');
        $list = $query -> get();
        $count = $query -> count();
        $data = [
            'list'=> $list,
            'total'=> $count
        ];

        return $data;

    }

    function getAbsenceLog() 
    {
        $today = date('Y-m-d');
        $query = Ketidakhadiran::select('tanggal', 'nama')->join('users', 'users.id', 'ketidakhadiran.users_id' )
                ->where('tanggal', '=', '2023-07-03');
        $list = $query -> get();
        $count = $query -> count();
        $data = [
            'list'=> $list,
            'total'=> $count
        ];

        return $data;
    }
}
