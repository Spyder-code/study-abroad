<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Document;
use App\Pesan;
use App\Student;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function profile()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return view('admin.profile',compact('user'));
    }

    public function listPendaftar()
    {
        $data = Student::all();
        return view('admin.listPendaftar',compact('data'));
    }

    public function kotakMasuk()
    {
        $data = Pesan::all();
        return view('admin.kotakMasuk',compact('data'));
    }

    public function validasiFile($id)
    {
        $data = Document::where('student_id',$id)->first();
        return view('admin.validasiFile', compact('data'));
    }

    public function changeImage(Request $request)
    {
        $request->validate([
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->oldImage!="default.jpg"){
            if (file_exists(public_path('images/user/',$request->oldImage))) {
                unlink(storage_path('app/public/images/user/'.$request->oldImage));
                    if ($files = $request->file('image')) {
                        $profileImage = $files->getClientOriginalName();
                        $path = $files->storeAs('public/images/user', $profileImage);
                        $url = Storage::url($path);
                        $imgUrl = url($url);
                        User::where('id',$request->id)
                            ->update([
                            'image' =>  $profileImage,
                            'image_path' =>  $imgUrl,
                        ]);
                    }
            }
        }else{
            if ($files = $request->file('image')) {
                $profileImage = $files->getClientOriginalName();
                $path = $files->storeAs('public/images/user', $profileImage);
                $url = Storage::url($path);
                $imgUrl = url($url);
                User::where('id',$request->id)
                    ->update([
                    'image' =>  $profileImage,
                    'image_path' =>  $imgUrl,
                ]);
            }
        }
        Activity::create([
            'user_id' => Auth::user()->id,
            'nama' => 'Profile',
            'subjek' => 'Mengganti profile image',
        ]);

        return back()->with('success','Foto profil berhasil di ubah!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'oldPassword'  => 'required',
            'newPassword'  => 'required'
        ]);
        Activity::create([
            'user_id' => Auth::user()->id,
            'nama' => 'Profile',
            'subjek' => 'Mengganti password',
        ]);
        $password = Auth::user()->password;
        if(Hash::check($request->oldPassword, $password)){
            User::where('id',$request->id)
            ->update([
            'password' => Hash::make($request->newPassword)
            ]);
            return back()->with('success','Password berhasil di ubah!');
        } else {
            return back()->with('danger','Password gagal di ubah!');
        }
    }
    public function changeEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        User::where('id',$request->id)->update([
            'email' => $request->email
        ]);

        Activity::create([
            'user_id' => Auth::user()->id,
            'nama' => 'Profile',
            'subjek' => 'Mengganti profile email',
        ]);
        return back()->with('success','Email berhasil di ubah!');
    }

    public function deletePesan(Request $request)
    {
        Pesan::where('id',$request->id)->delete();
        Activity::create([
            'user_id' => Auth::user()->id,
            'nama' => 'Pesan',
            'subjek' => 'Menghapus pesan '.$request->judul,
        ]);
        return back()->with('success','Pesan berhasil dihapus');
    }

    public function deleteStudent(Request $request)
    {
        Student::where('id',$request->id)->delete();
        Activity::create([
            'user_id' => Auth::user()->id,
            'nama' => 'Student',
            'subjek' => 'Menghapus Student '.$request->judul,
        ]);
        return back()->with('success','Pesan berhasil dihapus');
    }

    public function validateFile(Request $request)
    {
        $title = array(' Application Form,',' Certificate of enrollment from your university,',' Certified university transcript (in English),',' Passport,',' A statement of purpose,',' Evidence of English proficiency,');
        $data = $request->item;
        if (count($data)==6) {
            Student::find($request->id_user)->update([
                'status' => 2
            ]);
            $val = 'Selamat pendaftaran anda sudah diterima, silahkan menuju ke prosess selanjutnya';
            Document::where('id',$request->id)->update([
                'catatan' => $val,
                'status' =>2
            ]);
        }else{
            Student::find($request->id_user)->update([
                'status' => 1
            ]);
            $false = array();
            for ($i=0; $i < count($title); $i++) {
                if (!in_array($i,$data)) {
                    array_push($false,$i);
                }
            }
            $output = array();
            for ($i=0; $i < count($false); $i++) {
                $no = $false[$i];
                $val = $title[$no];
                array_push($output,$val);
            }
            $data = implode("",$output);
            $val = 'Sorry, your document did not met our requirements, please fix'.$data.' and then send again to the form below';

            Document::where('id',$request->id)->update([
                'catatan' => $val,
                'status' =>1
            ]);
        }


        Activity::create([
            'user_id' => Auth::user()->id,
            'nama' => 'Validasi File',
            'subjek' => 'Memvalidasi Student '.$request->judul,
        ]);

        $user = Student::find($request->id_user);
        $to_name = $user->nama;
        $to_email = $user->email;
        $data = array('name'=>$user->nama, "body" => $val);
        Mail::send('emails', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)->subject('Rigistration Study Abroad');
        $message->from('luaysyauqillah@gmail.com','UINSA International Office');
        });

        return redirect('admin/list-pendaftar')->with('success','Verifikasi Dokumen Sukses');
    }

}
