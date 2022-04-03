<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\RequestArticle;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\ArticleService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Input;
use App\Services\MailService;

class UserController extends Controller
{
    public function index()
    {   
        $users = \App\Models\User::where([
            ['type','touradmin']
        ])->get();
        foreach($users as $user)
        {
            $userinfo = \App\Models\Profile::where('userId',  $user->id)->first();
            $user->userinfo = $userinfo;
        }
        return view('user.index', ['users'=> $users]);
    }
    public function create()
    {
        return view('user.create');
    }

    public function saveCreate(Request $request)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $type = $request->input('type');

        $user = User::where('email', $email)->first();
        if($user != null){
            return response()->json([
                'result' => 'fail',
                'message' => 'Email đã tồn tại'
            ], 200);
        }
        else
        {
            $random = Str::random(45);
            $user = new User;
            $user->email = $email;
            $user->password = null;
            $user->level = 40;
            $user->accessToken = $random;
            $user->isRequiredChangePassword = true;
            $user->type = 'touradmin';
            $user->save();

            $profile = new Profile;
            $profile->name = $name;
            $profile->email = $email;
            $profile->userId = $user->id;
            $profile->contact = $phone;
            $profile->type = $type;
            $profile->save();

            $mail = new MailService(
                [$email],
                '360fairs. Xác thực tài khoản',
                'mail.verify',
                [
                    'name' =>  $name,
                    'email' => $email,
                    'token' => $user->accessToken
                ]
            );

            $mail->sendMail();

            return response()->json([
                'result' => 'ok',
                'data' => [
                    'user' => $user,
                    'profile' => $profile,
                ],
            ], 200);
        }
        return redirect()->route('master.get.user.list-users');
    }

    public function edit($id)
    {
        $profile = Profile::where('UserId', $id)->first();
        return view('user.edit')->with(['profile' => $profile]);
    }

    public function saveEdit($id, Request $request)
    {
        $userId = $id;
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $password = $request->input('password');
        $type = $request->input('type');

        $user = User::where('id', $userId)->first();
        $user->email = $email;
        $user->save();
        
        $profile = Profile::where('userId', $id)->first();
        $profile->name = $name;
        $profile->email = $email;
        $profile->contact = $phone;
        $profile->type = $type;
        $profile->save();

        return response()->json([
            'result' => 'ok',
            'data' => [
                'user' => $user,
                'profile' => $profile,
            ],
        ], 200);
    }

    public function toggleVisiable($id, Request $request)
    {
        $article = Article::where('id', $id)->first();
        if(isset($article)){
            $article->isPublic = !$article->isPublic;
            $article->save();
            return [
                'success' => true,
                'isHidden' => $article->isPublic,
            ]; 
        }
        else{
            return [
                'success' => false,
                'errors' => 'Thao tác thát bại'
            ]; 
        }
    }

    public function sendEmailVerify($id, Request $request)
    {
        $user = User::where('id', $id)->first();
        $profile = Profile::where('userId', $id)->first();
        if(isset($profile) && isset($user)){
            $mail = new MailService(
                [$profile->email],
                '360fairs. Xác thực tài khoản',
                'mail.verify',
                [
                    'name' =>  $profile->name,
                    'email' => $profile->email,
                    'token' => $user->accessToken
                ]
            );
    
            $mail->sendMail();
    
            return response()->json([
                'result' => 'ok',
                'message' => "Đã gửi email xác thực"
            ], 200);
        }
        else
        {
            return response()->json([
                'result' => 'fail',
                'message' => "ID tài khoản không chính xác"
            ], 200);
        }

    }

    public function delete($id, Request $request)
    {
        $User = User::where('id', $id)->first();
        if(isset($User)){
            $User->delete();
            $Profile = Profile::where('userId', $id)->first();
            if(isset($Profile)){
                $Profile->delete();
            }
            return [
                'success' => true
            ]; 
        }
        else{
            return [
                'success' => false,
                'errors' => 'Xóa thất bại'
            ]; 
        }
    }
}
