@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>Edit Hubungan Kerja</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
               
            <form
                    class="border"
                    style="padding: 20px"
                    method="POST"
                    action="{{ url('/hubungan-kerja/' . $hubunganKerja->id) }}"
                >
                    @csrf
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="form-group">
                        <label>Nama Atasan</label>
                        <br>
                        <select class="form-select" required name="atasan_id">
                            @foreach($users as $e=>$user)
                                <option value="{{$user->id}}" {{$hubunganKerja->atasan_id == $user->id ? 'selected' : 'nope'}}>{{$user->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Bawahan</label>
                        <br>
                        <select class="form-select" required name="bawahan_id">
                            @foreach($users as $e=>$user)
                                <option value="{{$user->id}}" {{$hubunganKerja->bawahan_id == $user->id ? 'selected' : 'nope'}}>{{$user->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="text-align: center">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>

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
