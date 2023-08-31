@extends('layouts.master')

@section('content')

<!-- Modal -->
<div class="modal fade" id="modalTerlambat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Terlambat Harian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Masuk</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lateDailyLog['list'] as $e=>$dt)
                                <tr>
                                    <td>{{$dt->jam_masuk}}</td>
                                    <td>{{$dt->nama}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTerlambatWeekly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Terlambat Mingguan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Masuk</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lateWeeklyLog['list'] as $e=>$dt)
                                <tr>
                                    <td>{{$dt->jam_masuk}}</td>
                                    <td>{{$dt->nama}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTerlambatMonth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Terlambat Bulanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Masuk</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lateMonthlyLog['list'] as $e=>$dt)
                                <tr>
                                    <td>{{$dt->jam_masuk}}</td>
                                    <td>{{$dt->nama}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAbsen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Absen Harian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Masuk</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($absenceLog['list'] as $e=>$dt)
                                <tr>
                                    <td>{{$dt->tanggal}}</td>
                                    <td>{{$dt->nama}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalAbsenWeekly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Absen Mingguan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Masuk</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($weeklyAbsenceLog['list'] as $e=>$dt)
                                <tr>
                                    <td>{{$dt->tanggal}}</td>
                                    <td>{{$dt->nama}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAbsenMonthly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Absen Bulanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Jam Masuk</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($monthlyAbsenceLog['list'] as $e=>$dt)
                                <tr>
                                    <td>{{$dt->tanggal}}</td>
                                    <td>{{$dt->nama}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCuti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Cuti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jumlah Hari</th>
                                    <th>Tipe Cuti</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($totalCutiLog['list'] as $e=>$dt)
                                <tr>
                                    <td>{{$dt->nama}}</td>
                                    <td>{{$dt->jumlah_hari}}</td>
                                    @if($dt->type == 1)
                                    <td>Cuti</td>
                                    @endif
                                    @if($dt->type == 2)
                                    <td>Izin</td>
                                    @endif
                                    <td>{{$dt->deskripsi}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h3>Dashboard</h4>
    </div>
</div>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Laporan Harian</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>

    <div class="box-body">


        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3" data-toggle="modal" data-target="#modalTerlambat">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Karyawan Terlambat</span>
                    <span class="info-box-number">{{$lateDailyLog['total']}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3" data-toggle="modal" data-target="#modalAbsen">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Karyawan Tidak Masuk</span>
                    <span class="info-box-number">{{$absenceLog['total']}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3" data-toggle="modal" data-target="#modalCuti">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Karyawan Cuti</span>
                    <span class="info-box-number">{{$totalCutiLog['total']}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="chart tab-pane" id="daily-chart" style="position: relative; height: 300px;"></div>

    </div>
</div>


<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Laporan Mingguan</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>

    <div class="box-body">


        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3" data-toggle="modal" data-target="#modalTerlambatWeekly">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Karyawan Terlambat</span>
                    <span class="info-box-number">{{$lateWeeklyLog['total']}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3" data-toggle="modal" data-target="#modalAbsenWeekly">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Karyawan Tidak Masuk</span>
                    <span class="info-box-number">{{$weeklyAbsenceLog['total']}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3" data-toggle="modal" data-target="#modalCuti">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Karyawan Cuti</span>
                    <span class="info-box-number">{{$totalCutiLog['total']}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="chart tab-pane" id="week-chart" style="position: relative; height: 300px;"></div>

    </div>
</div>

<div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Laporan Harian</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>

                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">


                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3" data-toggle="modal" data-target="#modalTerlambatMonth">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Karyawan Terlambat</span>
                            <span class="info-box-number">{{$lateMonthlyLog['total']}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3" data-toggle="modal" data-target="#modalAbsenMonthly">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Karyawan Tidak Masuk</span>
                            <span class="info-box-number">{{$monthlyAbsenceLog['total']}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3" data-toggle="modal" data-target="#modalCuti">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Karyawan Cuti</span>
                            <span class="info-box-number">{{$totalCutiLog['total']}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="chart tab-pane" id="month-chart" style="position: relative; height: 300px;"></div>

            </div>
        </div>


<!-- <div class="col-12 col-sm-6 col-md-4">
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Jam Masuk</th>
          <th>Nama</th>
        </tr>
      </thead>
      <tbody>
        @foreach($lateDailyLog['list'] as $e=>$dt)
        <tr>
          <td>{{$dt->jam_masuk}}</td>
          <td>{{$dt->nama}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div> -->

@endsection
@section('scripts')
<script>
    // var total = "{{$totalEmployee}}"    
    var karyawanTerlambat = "{{$lateDailyLog['total']}}"
    var karyawanAbsen = "{{$absenceLog['total']}}"
    var karyawanCuti = "{{$totalCutiLog['total']}}"
    var karyawanTerlambatWeekly = "{{$lateWeeklyLog['total']}}"
    var karyawanAbsenWeekly = "{{$weeklyAbsenceLog['total']}}"
    var karyawanTerlambatMonth = "{{$lateMonthlyLog['total']}}"
    var karyawanAbsenMonth = "{{$monthlyAbsenceLog['total']}}"

    var totalEmployees = parseInt(karyawanAbsen) + parseInt(karyawanTerlambat) + parseInt(karyawanCuti);
    var totalEmployeesWeek = parseInt(karyawanAbsenWeekly) + parseInt(karyawanTerlambatWeekly) + parseInt(karyawanCuti);
    var totalEmployeesMonth = parseInt(karyawanAbsenMonth) + parseInt(karyawanTerlambatMonth) + parseInt(karyawanCuti);


    var percentageTerlambat = (parseInt(karyawanTerlambat) / totalEmployees) * 100;
    var percentageAbsen = (parseInt(karyawanAbsen) / totalEmployees) * 100;
    var percentageCuti = (parseInt(karyawanCuti) / totalEmployees) * 100;

    var percentageTerlambatWeek = (parseInt(karyawanTerlambatWeekly) / totalEmployeesWeek) * 100;
    var percentageAbsenWeek = (parseInt(karyawanAbsenWeekly) / totalEmployeesWeek) * 100;
    var percentageCutiWeek = (parseInt(karyawanCuti) / totalEmployeesWeek) * 100;

    var percentageTerlambatMonth = (parseInt(karyawanTerlambatMonth) / totalEmployeesMonth) * 100;
    var percentageAbsenMonth = (parseInt(karyawanAbsenMonth) / totalEmployeesMonth) * 100;
    var percentageCutiMonth = (parseInt(karyawanCuti) / totalEmployeesMonth) * 100;

    var donut = new Morris.Donut({
        element: 'daily-chart',
        resize: true,
        colors: ['#3c8dbc', '#f56954', '#00a65a'],
        data: [{
                label: 'Karyawan Terlambat',
                value: percentageTerlambat.toFixed(2)
            },
            {
                label: 'Karyawan Tidak Masuk',
                value: percentageAbsen.toFixed(2)
            },
            {
                label: 'Karyawan Cuti',
                value: percentageCuti.toFixed(2)

            }
        ],
        formatter: function (y, data) {
            return y + '%';
        },
        hideHover: 'auto'
    });
    var donut2 = new Morris.Donut({
        element: 'week-chart',
        resize: true,
        colors: ['#3c8dbc', '#f56954', '#00a65a'],
        data: [{
                label: 'Karyawan Terlambat',
                value: percentageTerlambatWeek.toFixed(2)
            },
            {
                label: 'Karyawan Tidak Masuk',
                value: percentageAbsenWeek.toFixed(2)
            },
            {
                label: 'Karyawan Cuti',
                value: percentageCutiWeek.toFixed(2)
            }
        ],
        formatter: function (y, data) {
            return y + '%';
        },
        hideHover: 'auto'
    });

    var donut3 = new Morris.Donut({
        element: 'month-chart',
        resize: true,
        colors: ['#3c8dbc', '#f56954', '#00a65a'],
        data: [{
                label: 'Karyawan Terlambat',
                value: percentageTerlambatMonth.toFixed(2)
            },
            {
                label: 'Karyawan Tidak Masuk',
                value: percentageAbsenMonth.toFixed(2)
            },
            {
                label: 'Karyawan Cuti',
                value: percentageCutiMonth.toFixed(2)
            }
        ],
        formatter: function (y, data) {
            return y + '%';
        },
        hideHover: 'auto'
    });

    donut.redraw();
    donut2.redraw();
    donut3.redraw();

</script>
@endsection
