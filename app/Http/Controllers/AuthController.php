<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            $url = $request->get('url');
            $email = $request->get('email');

            $user = \App\Models\User::where([['email','=', $email],['type','=',\App\Models\User::TYPE_MASTERADMIN]])
            ->orWhere([['email','=', $email],['type','=',\App\Models\User::TYPE_SUPPERADMIN]])->first();
            if($user != null){
                if($user->isRequiredChangePassword == true || $user->password == null){
                    return view('auth.init_password', ['email' => $user->email]);
                }
                else{
                    return view('auth.login', ['url' => $url, 'email' => $email]);
                }
            }
            else{
                return view('auth.login', ['url' => $url]);
            }
        }

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $type = Auth::user()->type;
            if($type == \App\Models\User::TYPE_MASTERADMIN || $type == \App\Models\User::TYPE_SUPPERADMIN){
                return redirect('/');
            }
            else
                return redirect('/login');
        } else {
            return redirect()->back()->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
