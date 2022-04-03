<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

const LEVEL_USER = 40;
const LEVEL_SUPPERADMIN = 50;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // view
        if ($request->getMethod() == 'GET') {
            $callback = $request->get('callback');
            $email = $request->get('email');

            return view('auth.login', ['callback' => $callback, 'email' => $email]);

            $user = User::where([
                ['email','=', $email],
                ['level','=',LEVEL_SUPPERADMIN]
            ])->first();
            if(isset($user)){
                if($user->isRequiredChangePassword == true || $user->password == null){
                    return view('auth.init_password', ['email' => $user->email]);
                }
                else{
                   
                }
            }
            else{
                return view('auth.login', ['callback' => $callback])->with(['notif'=>'']);
            }
        }

        // handle
        if ($request->getMethod() == 'POST'){
            $credentials = $request->only(['email', 'password']);
            if (Auth::attempt($credentials)) {
                $level = Auth::user()->level;
                if($level == LEVEL_SUPPERADMIN){
                    return response()->json([
                        'result' => 'ok',
                        'message' => "Đăng nhập thành công"
                    ], 200);
                }
                else{
                    return response()->json([
                        'result' => 'fail',
                        'message' => "Tài khoản không có quyền truy cập"
                    ], 200);
                }
            } else {
                return response()->json([
                    'result' => 'fail',
                    'message' => "Tài khoản hoặc mật khẩu không chính xác"
                ], 200);
            }
        }
    }

    // public function initPassword(Request $request)
    // {
    //     // view
    //     if ($request->getMethod() == 'GET'){
    //         $callback = $request->get('callback');
    //         $email = $request->get('email');
    //         $user = User::where([
    //             ['email','=', $email],
    //             ['level','=',LEVEL_SUPPERADMIN]
    //         ])->first();
    //         if(isset($user)){
    //             if($user->isRequiredChangePassword == true || $user->password == null){
    //                 return view('auth.init_password', ['email' => $user->email]);
    //             }
    //             else{
    //             return redirect('/login')->with(['callback' => $callback, 'email' => $email]);
    //             }
    //         }
    //         else{
    //             return redirect('/login')->with(['callback' => $callback, 'email' => $email]);
    //         }
    //     }
        
    //     // handle
    //     if ($request->getMethod() == 'POST'){
    //         $email = $request->input('email');
    //         $password = $request->input('password');
    //         $user = User::where([
    //             ['email','=', $email],
    //         ])->first();

    //        // to do

    //     }
    // }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
