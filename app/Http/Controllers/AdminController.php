<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('username', $admin->email);
            return redirect()->route('admin.dashboard')->withSuccess('Admin Login Successfully');
        }
        return redirect("admin")->withSuccess('Login details are not valid');
    }

    public function dashboard()
    {
        if (Session::get('username')) {
            $data['admin'] = Admin::where('email',Session::get('username'))->first();
            $data['users'] = User::all();
            return view('admin.dashboard',$data);
        }
        return redirect("admin")->withSuccess('You are not allowed to access');
    }

    public function userDelete($id){
        $user = User::find($id);
        if($user->profile_img){
            $path = public_path()."/user_images/".$user->profile_img;
            unlink($path);
        }
        $user->delete();
        return redirect()->route('admin.dashboard')->withSuccess('User Successfully Delete.');
        
    }

    public function signOut(){
        Session::flush();
        return redirect('admin');
    }
}
