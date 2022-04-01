<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
