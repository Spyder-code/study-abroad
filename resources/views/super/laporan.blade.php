@extends('layouts.admin')
@section('role','Super User')
@section('content')
    <div class="container">
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
            <div class="col-sm-8">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                Pendaftar Lulus
                            </div>
                            <div class="card-body">
                                <table class="table data-table table-responsive-sm">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Negara</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($studentL as $item)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $item->nama}}</td>
                                        <td>{{$item->negara}}</td>
                                        <td>
                                            @if ($item->status == 0)
                                                <span class="badge badge-danger">Belum diverifikasi</span>
                                            @elseif($item->status == 1)
                                                <span class="badge badge-warning">Dokumen Salah</span>
                                            @elseif($item->status == 2)
                                                <span class="badge badge-success">Verifikasi Suksess</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-5">
                        <div class="card">
                            <div class="card-header bg-danger text-white">
                                Pendaftar Tidak Lulus
                            </div>
                            <div class="card-body">
                                <table class="table data-table table-responsive-sm">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Negara</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($studentTL as $item)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $item->nama}}</td>
                                        <td>{{$item->negara}}</td>
                                        <td>
                                            @if ($item->status == 0)
                                                <span class="badge badge-danger">Belum diverifikasi</span>
                                            @elseif($item->status == 1)
                                                <span class="badge badge-warning">Dokumen Salah</span>
                                            @elseif($item->status == 2)
                                                <span class="badge badge-success">Verifikasi Suksess</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card mt-5">
                            <div class="card-header bg-primary text-white">
                                List Semua Pendaftar
                            </div>
                            <div class="card-body">
                                <table class="table data-table table-responsive-sm">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Negara</th>
                                        <th scope="col">Waktu Daftar</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($allStudent as $item)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $item->nama}}</td>
                                        <td>{{$item->negara}}</td>
                                        <td>{{date('d F Y', strtotime($item->created_at))}}</td>
                                        <td>
                                            @if ($item->status == 0)
                                                <span class="badge badge-danger">Belum diverifikasi</span>
                                            @elseif($item->status == 1)
                                                <span class="badge badge-warning">Dokumen Salah</span>
                                            @elseif($item->status == 2)
                                                <span class="badge badge-success">Verifikasi Suksess</span>
                                            @endif
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
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        Aktivitas admin terkini
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama admin</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($aktivitas as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $item->user->name}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->subjek}}</td>
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
        var table = $('.data-table').DataTable({
            responsive:true
        });
    });
</script>
@endsection
