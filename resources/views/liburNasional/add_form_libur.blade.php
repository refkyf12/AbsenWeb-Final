@extends('layouts.master')
 
@section('content')
<style>
  .custom-input-group {
    font-size: 16px;
  }
</style>
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
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
                    action="{{ url('/libur/create/store') }}"
                >
                    @csrf
                    <input type="hidden" name="_method" value="{{ $method }}" />
                    <!-- <div class="form-group">
                        <label>Judul</label>
                        <input
                            type="string"
                            name="judul"
                            class="form-control"
                            value="{{ isset($data)?$data->judul:'' }}"
                        />
                    </div> -->
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input
                            type="date"
                            name="tanggal"
                            class="form-control"
                            value="{{ isset($data)?$data->tanggal:'' }}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input
                            type="text"
                            name="deskripsi"
                            class="form-control"
                            value="{{ isset($data)?$data->deskripsi:'' }}"
                        />
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

