@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>Karyawan</h4>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
                @endif
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <form class="border" method="GET" action="/karyawan">
                        @csrf
                        <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>
                            Refresh</button>
                    </form>
                    @if(\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2 || \Auth::user()->role_id == 3)
                    <a href="/karyawan/create" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah
                        Data</a>
                    @endif
                </p>
            </div>
            <div class="box-body">

                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                @if(\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2 || \Auth::user()->role_id
                                == 3)
                                <th class="not-export-col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>{{ $e+1 }}</td>
                                <td>{{ $dt->id }}</td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->email }}</td>
                                <td>
                                    @foreach ($roles as $role)
                                    @if ($role->id === $dt->role_id)
                                    {{ $role->nama_role }}
                                    @endif
                                    @endforeach
                                </td>

                                @if(\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2 || \Auth::user()->role_id
                                == 3)
                                <td>
                                    <div class="btn-group" role="group" aria-label="Actions">
                                        <form class="border" method="GET" action="/karyawan/{{$dt->id}}">
                                            @csrf
                                            <button class="btn btn-warning btn-xs btn-edit">
                                                <i class="fa fa-trash-o"></i> Edit
                                            </button>
                                        </form>

                                        <button class="btn btn-info btn-xs btn-detail" data-toggle="modal"
                                            data-target="#detailModal{{ $dt->id }}">
                                            <i class="fa fa-info-circle"></i> Lihat Detail
                                        </button>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @foreach($data as $dt)
                    <div class="modal fade" id="detailModal{{ $dt->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="detailModalLabel{{ $dt->id }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="detailModalLabel{{ $dt->id }}">Detail Informasi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Sisa Cuti:</strong> {{ $dt->sisa_cuti }}</p>
                                    <p><strong>Jam Lebih:</strong>
                                        @if($dt->jam_lebih == null || $dt->jam_lebih == 0)
                                        Tidak pernah lebih
                                        @else
                                        {{ sprintf("%02d Jam %02d Menit", intdiv($dt->jam_lebih, 60), $dt->jam_lebih % 60) }}
                                        @endif
                                    </p>
                                    <p><strong>Jam Kurang:</strong>
                                        @if($dt->jam_kurang == null || $dt->jam_kurang == 0)
                                        Tidak pernah kurang
                                        @else
                                        {{ sprintf("%02d Jam %02d Menit", intdiv($dt->jam_kurang, 60), $dt->jam_kurang % 60) }}
                                        @endif
                                    </p>
                                    <p><strong>Jam Lembur:</strong>
                                        @if($dt->jam_lembur == null || $dt->jam_lembur == 0)
                                        Tidak pernah lembur
                                        @else
                                        {{ sprintf("%02d Jam %02d Menit", intdiv($dt->jam_lembur, 60), $dt->jam_lembur % 60) }}
                                        @endif
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <form class="border" method="POST" action="/karyawan/lemburKeCuti/{{$dt->id}}">
                                        @csrf
                                        <button class="btn btn-danger btn-xs btn-hapus">
                                            <i class="fa fa-trash-o"></i> Lembur
                                        </button>
                                    </form>

                                    <form class="border" method="POST" action="/karyawan/kurangKurangCuti/{{$dt->id}}">
                                        @csrf
                                        <button class="btn btn-danger btn-xs btn-hapus">
                                            <i class="fa fa-trash-o"></i> Cuti
                                        </button>
                                    </form>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <a href="/reset" class="btn btn-sm btn-flat btn-Danger"><i class="fa fa-trash-o"></i> RESET</a>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function () {

        // btn refresh
        $('.btn-refresh').click(function (e) {
            e.preventDefault();
            console.log('button clicked')
            $('.preloader').fadeIn();
            location.reload();

        });

        $('.btn-detail').click(function () {
            // Hide any previously shown modals
            $('.modal').modal('hide');
        });

    })

</script>
