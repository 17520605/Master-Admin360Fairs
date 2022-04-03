<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = Profile::where('userId', $user-> id)-> first();
        Session::put('nameAuth', $profile-> name);
        Session::put('avatarAuth', $profile-> avatar);
        return view('dashboard.index');
    }
}
