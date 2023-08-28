@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>Hubungan kerja</h4>
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
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>Refresh</button>
                    @if(\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2 || \Auth::user()->role_id == 3)
                        <a href="/hubungan-kerja/create" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i>Tambah Data</a>
                    @endif
                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Atasan</th>
                                <th>Nama Bawahan</th>
                                @if(\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2 || \Auth::user()->role_id == 3)
                                <th class="not-export-col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                                <tr>
                                <td>{{ $e+1 }}</td>
                                <td>{{ $dt->Atasan->nama }}</td>
                                <td>{{ $dt->Bawahan->nama }}</td>         
                                
                                @if(\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2 || \Auth::user()->role_id == 3)
                                <td
                                    style="display:flex;gap:4px;"
                                >
                                    <div style="width:60px">
                                        <a href="/hubungan-kerja/{{$dt->id}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o">Edit</i></a>
                                    </div>
                                    <form
                                        class="border"
                                        method="POST"
                                        action="/hubungan-kerja/{{$dt->id}}"
                                    >
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="btn btn-danger btn-xs btn-hapus"><i class="fa fa-trash-o">Hapus</i></button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="/reset" class="btn btn-sm btn-flat btn-Danger"><i class="fa fa-trash-o"></i> RESET</a>

            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>