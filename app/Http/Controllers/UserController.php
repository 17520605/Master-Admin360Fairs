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

class UserController extends Controller
{
    public function index()
    {   
        $users = \App\Models\User::where('type','touradmin')->get();
        foreach($users as $user){
            $userinfo = \App\Models\Profile::where('userId',  $user->id)->first();
            $user->userinfo = $userinfo;
        }
        return view('user.index', ['users'=> $users]);
    }
}
