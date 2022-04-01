<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadFile($file, $isUsed = false)
    {   
        $path = Storage::disk('temp')->putFile('/', $file);
        $res = cloudinary()->upload(Storage::disk('temp')->path($file->hashName()), [
            'resource_type' => 'auto'
        ])->getResponse();
        
        // delete file
        $path = Storage::disk('temp')->delete($path);

        $resObj = json_decode(json_encode($res));

        // save asset
        $asset = new \App\Models\Asset();
        $asset->name = $file->getClientOriginalName();
        $asset->url = $resObj->url;
        $asset->format = $file->getClientOriginalExtension();
        $asset->size = $resObj->bytes;
        $asset->isUsed = $isUsed;
        $asset->save();

        return $resObj;
    }
}
