<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Tour;
use App\Models\User;
use App\Models\Article;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = Profile::where('userId', $user->id)->first();
        Session::put('nameAuth', $profile->name);
        Session::put('avatarAuth', $profile->avatar);

        $tour =Tour::where([
            ['isPublic', true],
            ['isDeleted', false]
        ])->get();
        $tourCount =  $tour->count();

        $article =Article::where([
            ['isPublic', true],
        ])->get();
        $articleCount =  $article->count();

        $user =User::where([
            ['isPublic', true],
            ['type', 'touradmin']
        ])->get();
        $userCount =  $user->count();

        $contact =Contact::get();
        $contactCount =  $contact->count();
        
        $viewData= [
            'tourCount'  =>$tourCount,
            'userCount'  =>$userCount,
            'articleCount' =>$articleCount,
            'contactCount' => $contactCount,
        ];
        return view('dashboard.index',$viewData);
    }
}
