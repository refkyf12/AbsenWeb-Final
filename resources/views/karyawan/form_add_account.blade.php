@extends('layouts.master')
 
@section('content')
 
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
                    action="{{ url('/karyawan/create/store') }}"
                >
                    @csrf

                    @error('users_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @error('role_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="hidden" name="_method" value="{{ $method }}" />
                    <div class="form-group">
                        <label>ID</label>
                        <input
                            type="string"
                            name="users_id"
                            class="form-control"
                            value="{{ isset($data)?$data->users_id:'' }}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input
                            type="string"
                            name="nama"
                            class="form-control"
                            value="{{ isset($data)?$data->nama:'' }}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input
                            type="string"
                            name="email"
                            class="form-control"
                            value="{{ isset($data)?$data->email:'' }}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Password (Min 8 Characters)</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            value="{{ isset($data)?$data->password:'' }}"
                        />
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                        />
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <br>
                        <select required name="role_id">
                             @foreach($role as $e=>$roles)
                                <option value="{{$roles->id}}">{{$roles->nama_role}}</option>
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
    });
 
    })
</script>
