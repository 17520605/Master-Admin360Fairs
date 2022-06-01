<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\ContactService;

class GallaryController extends Controller
{
    public function index()
    {
        return view('gallary.index');
    }
}
