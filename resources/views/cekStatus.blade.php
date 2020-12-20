@extends('layouts.user')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            @if ($data->status == 0)
            <div class="alert alert-danger">
                <strong>Pendaftaran anda tidak memenuhi syarat harap kirim kembali dokumen dengan benar</strong>
            </div>
            <form action="{{ url('postRegister') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="row">
                <div class="col">
                  <h2>Biodata</h2>
                  <hr>
                    <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                      <label for="name">Full Name</label>
                      <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
                    </div>
                    <div class="form-row form-group" data-aos="fade-up" data-aos-delay="100">
                      <div class="col">
                        <label for="name">Date of birth</label>
                        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" class="form-control">
                      </div>
                      <div class="col">
                        <label for="name">Place of birth</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group form-row" data-aos="fade-up" data-aos-delay="100">
                      <div class="col">
                        <label for="name">Passport number</label>
                        <input type="text" name="no_passport" value="{{ old('no_passport') }}" class="form-control">
                      </div>
                      <div class="col">
                        <label for="name">Country</label>
                        <input type="text" name="negara" value="{{ old('negara') }}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                      <label for="name">Address</label>
                      <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control">
                    </div>
                    <div class="form-group form-row" data-aos="fade-up" data-aos-delay="100">
                      <div class="col">
                        <label for="name">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                      </div>
                      <div class="col">
                        <label for="name">Email</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                        <label for="name">Photos</label><br>
                        <input type="file" name="image" class="file-control">
                    </div>
                </div>
                <div class="col-sm-5">
                  <h2>Document</h2>
                  <hr>
                  <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                    <label for="name">1. Application Form. <a href="{{ asset('application_form.pdf') }}">Click here to download</a></label><br>
                    <input type="file" name="app_form" class="file-control">
                  </div>
                  <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                    <label for="name">2. Certificate of enrollment from your university</label><br>
                    <input type="file" name="certificate_of_enrollment" class="file-control">
                  </div>
                  <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                    <label for="name">3. Certified university transcript (in English)</label><br>
                    <input type="file" name="certified_university_trancript" class="file-control">
                  </div>
                  <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                    <label for="name">4. Passport</label><br>
                    <input type="file" name="passport" class="file-control">
                  </div>
                  <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                    <label for="name">5. A statement of purpose (in Bahasa Indonesia/English, 500 words, explaining your purpose of study)</label><br>
                    <input type="file" name="purpose" class="file-control">
                  </div>
                  <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                    <label for="name">6. Evidence of English proficiency (min. TOEFL score of 550, or iBT 80, or IELTS of 6.5)</label><br>
                    <input type="file" name="evidence_of_english" class="file-control">
                  </div>
                </div>
                <div class="col-sm-3">
                  <h2>Submit</h2>
                  <hr>
                  <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                    <div class="card p-3" style="background-color:white; height: 200px; overflow: scroll;">
                      <h6>TERMS AND CONDITIONS</h6>
                      <p class="text-justify">Inbound Study Abroad registration issued by UINSA or available on the UINSA Inbound Study Abroad website will be governed by the Terms and Conditions of Registration. Prospective applicants must strictly comply with these Terms and Conditions, unless stated otherwise in a written statement by a legal representative of UINSA.</p>
                      <h6>Registration</h6>
                      <p class="text-justify">To register, the applicant (you) must complete the procedures provided by UINSA. After the applicant has completed the application procedures for student registration in a manner specified by UINSA and has been approved as a student candidate who meets the standards set by UINSA, UINSA will issue a student candidate number and the applicant will become a UINSA student.</p>
                      <p class="text-justify">UINSA can refuse approval of an application for registration as a UINSA student for the following reasons:</p>
                      <ol class="text-justify">
                        <li>The applicant is not registered as a corporation</li>
                        <li>The applicant has been registered</li>
                        <li>It is clear that the applicant has experienced a revocation of registration of prospective students in the past</li>
                        <li>Details of the application for registration of prospective students are incorrect</li>
                        <li>The applicant tries to transfer or sell the registration number of the student candidate or user ID or</li>
                        <li>Other matters deemed by UINSA as inappropriate to approve registration as a student candidate</li>
                        <li>UINSA will notify prospective students by facsimile or e-mail regarding the status of registration for further processing</li>
                      </ol>
                    </div>
                    <input type="checkbox" name="check" id="agree" class="mt-4"><span> I agree with the Terms and Conditions</span>
                  </div>
                  <button type="submit" class="btn btn-success" id="btn-send">Send</button>
                </div>
              </div>
            </form>
        @else
            <div class="alert alert-success">
                <strong>Pendaftaran anda diterima, silahkan cek email untuh tindak lanjut</strong>
            </div>
        @endif
        </div>
    </div>
</div>
@endsection
