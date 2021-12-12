<?php

namespace App\Http\Controllers\customer;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profileAuth = DB::table('profile')->where('userId', $user->id)->first();

        $profile = \App\Models\Profile::where('userId', Auth::id())->first();
        return view('customer.dashboard')->with(['profileAuth' => $profileAuth ]);
    }
}
