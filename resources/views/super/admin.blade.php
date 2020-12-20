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
        <div class="col col-sm">
            <div class="card mt-3">
                <div class="card-body">
                    <h1>Tambah Admin</h1>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ url('addAdmin') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <ul class="list-group text-left">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col col-4">
                                                <label for="address">Name</label>
                                            </div>
                                            <div class="col col-2">
                                                <label for="">:</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col col-4">
                                                <label for="address">Email</label>
                                            </div>
                                            <div class="col col-2">
                                                <label for="">:</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-group text-left">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col col-4">
                                                <label for="address">Password</label>
                                            </div>
                                            <div class="col col-2">
                                                <label for="">:</label>
                                            </div>
                                            <div class="col">
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col col-4">
                                                <label for="address">Confirm Password</label>
                                            </div>
                                            <div class="col col-2">
                                                <label for="">:</label>
                                            </div>
                                            <div class="col">
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive-sm">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td class="d-flex flex-row">
                                <form action="{{url('deletePesan')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <input type="hidden" name="judul" value="{{$item->nama}}">
                                    <button type="submit" onclick="return confirm('Are You Sure?')" class="ml-2 btn btn-danger">Hapus</button>
                                </form>
                                <form action="{{url('deletePesan')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <input type="hidden" name="judul" value="{{$item->nama}}">
                                    <button type="submit" onclick="return confirm('Are You Sure?')" class="ml-2 btn btn-info">Reset Password</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script>
    $(function(){
        var table = $('.table').DataTable();
    });
</script>
@endsection
