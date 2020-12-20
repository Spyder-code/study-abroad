<?php

namespace App\Http\Controllers;

use App\Document;
use App\Pesan;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = Student::all();
        return view('index',compact('data'));
    }

    public function cekStatus(Request $request)
    {
        $nodaf = $request->nodaf;
        $data = Student::where('nodaf',$nodaf)->first();
        return view('cekStatus',compact('data'));
    }

    public function addPesan(Request $request)
    {
        Pesan::create([
            'nama' => $request->name,
            'subjek' => $request->subject,
            'isi' => $request->message,
            'email' => $request->email,
            'status' => 0
        ]);
        return redirect('/#contact')->with('success-contact','Pesan berhasil di terkirim');
    }

    public function addRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'no_passport' => 'required',
            'negara' => 'required',
            'alamat' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'app_form' => 'required|mimes:pdf|max:2048',
            'certificate_of_enrollment' => 'required|mimes:pdf|max:2048',
            'certified_university_trancript' => 'required|mimes:pdf|max:2048',
            'passport' => 'required|mimes:pdf|max:2048',
            'purpose' => 'required|mimes:pdf|max:2048',
            'evidence_of_english' => 'required|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('/#team')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->file()) {
            $data = new Student();
            $data->nama = $request->nama;
            $data->tgl_lahir = $request->tgl_lahir;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->no_passport = $request->no_passport;
            $data->negara = $request->negara;
            $data->alamat = $request->alamat;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->status = 0;
            $data->save();
            $nodaf = 'STDN2911'.$data->id;

            $profileImage = 'photo.jpg';
            $path = $request->file('image')->storeAs('public/student/'.$nodaf, $profileImage);
            $url = Storage::url($path);
            $imgUrl = url($url);

            Student::where('id',$data->id)->update([
                'image' => $imgUrl,
                'nodaf' => $nodaf,
            ]);

            $document = new Document();

            $app_form = $request->file('app_form')->storeAs('public/student/'.$nodaf, 'app_form.pdf');
            $certificate_of_enrollment = $request->file('certificate_of_enrollment')->storeAs('public/student/'.$nodaf, 'certificate_of_enrollment.pdf');
            $certified_university_trancript = $request->file('certified_university_trancript')->storeAs('public/student/'.$nodaf, 'certified_university_trancript.pdf');
            $passport = $request->file('passport')->storeAs('public/student/'.$nodaf, 'passport.pdf');
            $purpose = $request->file('purpose')->storeAs('public/student/'.$nodaf, 'purpose.pdf');
            $evidence_of_english = $request->file('evidence_of_english')->storeAs('public/student/'.$nodaf,'evidence_of_english.pdf');

            $document->student_id = $data->id;
            $document->app_form = '/storage/student/'.$nodaf. '/app_form.pdf';
            $document->certificate_enrollment = '/storage/student/'.$nodaf. '/certificate_of_enrollment.pdf';
            $document->certificate_university_transcript = '/storage/student/'.$nodaf. '/certified_university_trancript.pdf';
            $document->passport = '/storage/student/'.$nodaf. '/passport.pdf';
            $document->purpose = '/storage/student/'.$nodaf. '/purpose.pdf';
            $document->evidence_english = '/storage/student/'.$nodaf. '/evidence_of_english.pdf';
            $document->status = 0;
            $document->save();

            return redirect('/#team')->with('success-register','Registration is Success, Please check Your status registration in next day!');
        }
    }
}
