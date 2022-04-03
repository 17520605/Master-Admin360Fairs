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

class UserController extends Controller
{
    public function index()
    {   
        $users = \App\Models\Users::where([
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
        $password = $request->input('password');
        $address = $request->input('address');
        $type = $request->input('type');
        $isPublic = $request->input('isPublic');
        $user = User::where('email', $email)->first();
        if($user != null){
           
        }
        else{
            $random = Str::random(45);
            $user = new User;
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->level = 40;
            $user->accessToken = $random;
            $user->type = 'touradmin';
            $user->save();
            $userId = User::where('email', $email)->first();
            if($userId != null){
                $userId = $userId->id;
                $profile = new Profile;
                $profile->name =$name;
                $profile->email = $email;
                $profile->userId =$userId;
                $profile->contact =$phone;
                $profile->address =$address;
                $profile->type = $type;
                $profile->save();
            }
        }
        return redirect()->route('master.get.user.list-users');
    }

    public function edit($id)
    {
        $user = Profile::where('UserId', $id)->first();
        return view('user.edit')->with(['user' => $user]);
    }

    public function saveEdit($id, Request $request)
    {
        $userId = $id;
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $password = $request->input('password');
        $address = $request->input('address');
        $type = $request->input('type');
        $isPublic = $request->input('isPublic');
        $user = User::where('id', $userId)->first();
        if($password == null){
            $password = $user->password;
        }
        else
        {
            $password = bcrypt($password);
        }

        $user->email = $email;
        $user->password = $password;
        $user->save();
        $profile = Profile::where('UserId', $id)->first();
        $profile->name =$name;
        $profile->email = $email;
        $profile->userId =$userId;
        $profile->contact =$phone;
        $profile->address =$address;
        $profile->type = $type;
        $profile->save();

        return redirect()->route('master.get.user.list-users');
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
