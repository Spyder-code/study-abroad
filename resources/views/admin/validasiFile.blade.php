@extends('layouts.admin')
@section('role', "Admin")
@section('head')
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.5.207/build/pdf.min.js"></script>
@endsection
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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col">
            <h1>Verifikasi Dokumen {{ $data->user->nama }}</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ url('validasiFile') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="hidden" name="id_user" value="{{ $data->student_id }}">
                <input type="hidden" name="judul" value="{{ $data->user->nama }}">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" type="button" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Application Form
                                </button>
                            </h5>
                            <input type="checkbox" name="item[]" value="0" class="form-control">
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <iframe src="https://docs.google.com/viewer?url={{ url('/').$data->app_form }}&embedded=true" frameborder="0" height="500px" width="100%"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" type="button" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Certificate of enrollment from your university
                            </button>
                        </h5>
                        <input type="checkbox" name="item[]" value="1" class="form-control">
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                            <iframe src="https://docs.google.com/viewer?url={{ url('/').$data->certificate_enrollment }}&embedded=true" frameborder="0" height="500px" width="100%"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" type="button" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Certified university transcript (in English)
                            </button>
                            </h5>
                            <input type="checkbox" name="item[]" value="2" class="form-control">
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                            <iframe src="https://docs.google.com/viewer?url={{ url('/').$data->certificate_university_transcript }}&embedded=true" frameborder="0" height="500px" width="100%"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" type="button" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Passport
                                </button>
                            </h5>
                            <input type="checkbox" name="item[]" value="3" class="form-control">
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <iframe src="https://docs.google.com/viewer?url={{ url('/').$data->passport }}&embedded=true" frameborder="0" height="500px" width="100%"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" type="button" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                A statement of purpose
                            </button>
                        </h5>
                        <input type="checkbox" name="item[]" value="4" class="form-control">
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                            <iframe src="https://docs.google.com/viewer?url={{ url('/').$data->purpose }}&embedded=true" frameborder="0" height="500px" width="100%"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" type="button" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Evidence of English proficiency
                            </button>
                            </h5>
                            <input type="checkbox" name="item[]" value="5" class="form-control">
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                            <iframe src="https://docs.google.com/viewer?url={{ url('/').$data->evidence_english }}&embedded=true" frameborder="0" height="500px" width="100%"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3" onclick="return confirm('Are You Sure?')">Submit</button>
            </form>
        </div>
    </div>

    </div>

@endsection

