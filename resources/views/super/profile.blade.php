@extends('layouts.admin')
@section('role','Super User')
@section('content')
    <div class="container">
    @error('nomor')
    <div class="alert alert-danger mt-3">{{ $message }}</div>
    @enderror
    @error('alamat')
    <div class="alert alert-danger mt-3">{{ $message }}</div>
    @enderror
    @if ($message = Session::get('success'))
        <div class="row">
            <div class="col mt-3">
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="row">
            <div class="col mt-3">
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col col-sm text-center">
            <div class="card mt-3">
                <img class="img-thumbnail ml-5 mr-5 mt-3" src="{{ $user->image_path }}" style="height:300px" alt="{{$user->name}}">
                <div class="card-body">
                    <ul class="list-group text-left">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col col-4">
                                    <label for="address">Username</label>
                                </div>
                                <div class="col col-2">
                                    <label for="">:</label>
                                </div>
                                <div class="col">
                                    {{$user->name}}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
                <div class="col mt-3">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <h4>Ganti Foto Profil</h4>
                    <hr>
                <form  method="post" action="{{url('changeImageUser')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="img" class="file" name="image"/>
                    <span class="text-danger">{{ $errors->first('images') }}</span>
                    <input type="hidden" name="oldImage" value="{{ $user->image }}">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-success float-right mr-5">Change</button>
                </form>
                <h4 class="mt-5">Ganti Password</h4>
                <hr>
                <form class="form-row"  method="post" action="{{url('updatePassword')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="col">
                        <div class="form-group">
                            <label for="pass1">Old Password</label>
                            <input type="password" class="form-control" name="oldPassword">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="pass2">New Password</label>
                            <input type="password" class="form-control" name="newPassword">
                        </div>
                        <button type="submit" class="btn btn-success mb-2 float-right mr-5">Change</button>
                    </div>
                </form>
                <h4 class="mt-2">Ganti Username</h4>
                <hr>
                <form class="form-row"  method="post" action="{{url('updateUsername')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <label for="pass1">Username</label>
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" name="username">
                            <button type="submit" class="btn btn-success mb-2 float-right ml-5">Change</button>
                        </div>
                </form>
        </div>
    </div>
</div>
@endsection