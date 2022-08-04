<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\ContactService;
use App\Models\User;
use App\Models\Profile;

class GalleryController extends Controller
{
    public function index()
    {
        $profiles = Profile::orderby('order', 'DESC')->get();
    
        return view('gallery.index')->with([
            'profiles'=> $profiles,
        ]);
    }

    public function toggleVisiable($id, Request $request)
    {
        $profile = Profile::where('id', $id)->first();
        if(isset($profile)){
            $profile->isPublic = !$profile->isPublic;
            $profile->save();
            return [
                'success' => true,
                'isHidden' => $profile->isPublic,
            ]; 
        }
        else{
            return [
                'success' => false,
                'errors' => 'Thao tác thát bại'
            ]; 
        }
    }

    public function saveOrder(Request $request)
    {
        $orderData = $request->input('orderData');
        if($orderData){
            for ($i=0; $i < count($orderData) ; $i++) {
                 $profile = Profile::find($orderData[$i]);
                if($profile){
                    $profile->order = $i;
                    $profile->save();
                }
            }
            return [
                'success' => true,
            ];
        }
        else{
            return [
                'success' => false,
                'errors' => 'Dữ liệu thứ tự rỗng'
            ];
        }

    }
}
