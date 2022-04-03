<?php

namespace App\Http\Controllers;
use Cloudinary\Uploader;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;


class StorageController extends Controller
{
    public function upload(Request $request)
    {
        // Cach 1
        if($request->hasFile('file')){
            $rs = $this->uploadFile($request->file('file'));
            return response(json_encode($rs));
        }

        // // Cach 2
        // if($request->hasFile('file')){
        //     $rs = \App\Services\StorageService::uploadFile($request->file('file'));
        //     return response(json_encode($rs));
        // }

        return response();

    }
}
