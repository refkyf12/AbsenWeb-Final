<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\logAbsen;
use App\Models\Ketidakhadiran;
use App\Models\Cuti;
use App\Models\User;
use Exception;

class DashboardController extends Controller
{
    function index()
    {
        $this->validate();
        // $result=DB::select(DB::raw("select count(*) as total, keterlambatan from log_absen group by keterlambatan"));
        // dd($result);
        $absenceLog = $this->getAbsenceLog();
        $weeklyAbsenceLog = $this->getWeeklyAbsenceLog() ;
        $monthlyAbsenceLog = $this->getMonthlyAbsenceLog(); 
        $lateDailyLog = $this->getLateDailyLog();
        $lateWeeklyLog = $this->getLateWeeklyLog();
        $lateMonthlyLog = $this->getLateMonthlyLog();
        $totalCutiLog = $this->getCuti();
        $totalEmployee = $this->getTotalEmployee();
        return view('dashboard', compact('lateDailyLog', 'absenceLog', 'weeklyAbsenceLog', 'monthlyAbsenceLog', 
                        'lateWeeklyLog','lateMonthlyLog', 'lateWeeklyLog', 'totalCutiLog', 'totalEmployee' ));
    }
 
    function getLateDailyLog()
     {
        $today = date('Y-m-d');
        $query = logAbsen::select('jam_masuk', 'nama')->join('users', 'users.id', 'log_absen.users_id' )
                ->where('keterlambatan', '=', '1')
                ->where('tanggal', '=', $today);
        $list = $query -> get();
        $count = $query -> count();
        $data = [
            'list'=> $list,
            'total'=> $count
        ];

        return $data;

    }

    function getLateWeeklyLog()
     {
        //$today = date('Y-m-d');
        $week = date('Y-m-d', strtotime('-7 days'));
        $query = logAbsen::select('jam_masuk', 'nama')->join('users', 'users.id', 'log_absen.users_id' )
                ->where('keterlambatan', '=', '1')
                ->where('tanggal', '=', $week);
        $list = $query -> get();
        $count = $query -> count();
        $data = [
            'list'=> $list,
            'total'=> $count
        ];

        return $data;

    }

    function getLateMonthlyLog()
     {
        $lastDay = date('Y-m-t');
        $firstMonth = date('Y-m-01');
        $query = logAbsen::select('jam_masuk', 'nama')->join('users', 'users.id', 'log_absen.users_id' )
                ->where('keterlambatan', '=', '1')
                ->whereBetween('tanggal', [$firstMonth, $lastDay]);
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
                ->where('tanggal', '=', $today);
        $list = $query -> get();
        $count = $query -> count();
        $data = [
            'list'=> $list,
            'total'=> $count
        ];

        return $data;
    }

    function getWeeklyAbsenceLog() 
    {
        // $today = date('Y-m-d');
        $week = date('Y-m-d', strtotime('-7 days'));
        $query = Ketidakhadiran::select('tanggal', 'nama')->join('users', 'users.id', 'ketidakhadiran.users_id' )
                ->where('tanggal', '=', $week);
        $list = $query -> get();
        $count = $query -> count();
        $data = [
            'list'=> $list,
            'total'=> $count
        ];

        return $data;
    }

    function getMonthlyAbsenceLog() 
    {
        $lastMonth = date('Y-m-t');
        $firstDay = date('Y-m-01');
        $query = Ketidakhadiran::select('tanggal', 'nama')->join('users', 'users.id', 'ketidakhadiran.users_id' )
                ->whereBetween('tanggal', [$firstDay, $lastMonth]);
        $list = $query -> get();
        $count = $query -> count();
        $data = [
            'list'=> $list,
            'total'=> $count
        ];

        return $data;
    }

    function getCuti()
    {
        $query = Cuti::select('nama', 'jumlah_hari', 'type', 'deskripsi')->join('users', 'users.id', 'cuti.users_id')
                    ->where('status', '=', '2');
        $list = $query -> get();
        $count = $query -> count();
        $data = [
            'list'=> $list,
            'total'=> $count
        ];

        return $data;
    }

    function getTotalEmployee()
    {
        $query = User::where('role_id', 0)->count();
        return $query;
    }


    

}
