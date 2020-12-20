<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Student;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SuperController extends Controller
{
    public function index()
    {
        return view('super.index');
    }

    public function profile()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return view('super.profile', compact('user'));
    }

    public function admin()
    {
        $data = User::role('admin')->get();
        return view('super.admin', compact('data'));
    }

    public function activity()
    {
        $data = User::role('admin')->get();
        return view('super.activity', compact('data'));
    }

    public function activityDetail($nama)
    {
        $user = User::where('name',$nama)->first();
        $id = $user->id;
        $data = Activity::all()->where('user_id',$id);
        return view('super.detailActivity', compact('data'));
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
        return back()->with('success','Foto profil berhasil di ubah!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'oldPassword'  => 'required',
            'newPassword'  => 'required'
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
        return back()->with('success','Email berhasil di ubah!');
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => 'default.jpg',
            'image_path' => 'http://127.0.0.1:8000/storage/images/user/1.png'
        ]);

        $admin->assignRole('admin');
        return back()->with('success','Admin berhasil di tambah!');
    }

    public function deleteActivity(Request $request)
    {
        Activity::destroy($request->id);
        return back()->with('success','Activity berhasil di hapus!');
    }

    public function laporan()
    {
        $aktivitas = Activity::all()->sortByDesc('created_at');
        $allStudent = Student::all()->sortByDesc('created_at');
        $studentL = Student::all()->where('status',2)->sortByDesc('created_at');
        $studentTL = Student::all()->where('status',0)->sortByDesc('created_at');
        return view('super.laporan',compact('aktivitas','allStudent','studentL','studentTL'));
    }
}
