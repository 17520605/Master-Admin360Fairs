<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

const TYPE_SPEAKER = 'speaker';
const TYPE_PARTNER = 'partner';
const TYPE_TOURADMIN = 'touradmin';
const TYPE_SUPPERADMIN = 'superadmin';

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            $url = $request->get('url');
            $email = $request->get('email');

            $user = Users::where([['email','=', $email],['type','=',TYPE_SUPPERADMIN]])
            ->orWhere([['email','=', $email],['type','=',TYPE_SUPPERADMIN]])->first();            
            if($user != null){
                if($user->isRequiredChangePassword == true || $user->password == null){
                    return view('auth.init_password', ['email' => $user->email]);
                }
                else{
                    return view('auth.login', ['url' => $url, 'email' => $email]);
                }
            }
            else{
                return view('auth.login', ['url' => $url])->with(['notif'=>'']);
            }
        }

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $type = Auth::user()->type;
            if($type == TYPE_MASTERADMIN || $type == TYPE_SUPPERADMIN){
                
                return redirect('/');
            }
            else
                return view('auth.login')->with(['notif'=>'EMAIL OR PASSWORD ERROR']);
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
