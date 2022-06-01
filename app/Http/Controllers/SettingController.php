<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\ContactService;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.index');
    }
    
    public function deleteVideoIntro(Request $request)
    {
        $profileId = $request->id;
        $url = $request->url;
        $profile = \App\Models\Profile::find($profileId);
        if($profile != null)
        {
            $profile->video = $url ;
            $profile->save();
        }
        return true;
    }

    public function saveVideoIntro(Request $request)
    {
        $profileId = $request->id;
        $url = $request->url;
        $profile = \App\Models\Profile::find($profileId);
        if($profile != null)
        {
            $profile->video = $url;
            $profile->save();
        }
        return true;
    }
}
