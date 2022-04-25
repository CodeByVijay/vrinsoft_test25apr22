<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:100',
                'email' => 'email|required|unique:users,email',
                'mobile' => 'required|unique:users,mobile|regex:/[6789][0-9]{9}/|min:10|max:10',
                'add1' => 'required',
                'pincode' => 'required|max:6|min:6',
                'pass' => 'required|min:6',
                're_pass' => 'required|same:pass|min:6',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
            ],
            [
                're_pass.same' => 'Please Enter Password & Confirm Password Same.',
                'image.image' => 'The Profile Image must be an image.'
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->add1.','.$request->add2.','.$request->pincode;
        $user->password = Hash::make($request->pass);

        if ($file = $request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $destinationPath = public_path() . '/user_images';
            $file->move($destinationPath, $fileName);
            $user->profile_img = $fileName;
        }
        $user->save();
        return redirect('/login')->withSuccess(strtoupper($request->name).' Registration Successfully Complete.');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    
}
