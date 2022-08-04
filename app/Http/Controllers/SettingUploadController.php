<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\ContactService;
use App\Models\ConfigUpload;

class SettingUploadController extends Controller
{
    public function index()
    {
        $config = ConfigUpload::orderby('id', 'DESC')->get();
        return view('setting-upload.index', ['config'=> $config]);
    }

    public function dataUpload($id, $value, Request $request)
    {
        $config = ConfigUpload::where('id', $id)->first();
        if(isset($config)){
            $config->value = $value;
            $config->save();
            return [
                'success' => true,
            ]; 
        }
        else{
            return [
                'success' => false,
                'errors' => 'Thao tác thát bại'
            ]; 
        }
    }

}
