@extends('layouts.master')

@section('content')
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalTerlambat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
  <div class="info-box mb-3">
    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Karyawan Tidak Hadir</span>
      <span class="info-box-number">41,410</span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-4">
  <div class="info-box mb-3">
    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Karyawan</span>
      <span class="info-box-number">41,410</span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>

<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>

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
  var karyawanTerlambat = "{{$lateDailyLog['total']}}"
  var donut = new Morris.Donut({
    element  : 'sales-chart',
    resize   : true,
    colors   : ['#3c8dbc', '#f56954', '#00a65a'],
    data     : [
      { label: 'Karyawan Terlambat', value: karyawanTerlambat},
      { label: 'Karyawan Tidak Masuk', value: 30 },
      { label: 'Karyawan Cuti', value: 20 }
    ],
    hideHover: 'auto'
  });

  donut.redraw(); 
</script>
@endsection