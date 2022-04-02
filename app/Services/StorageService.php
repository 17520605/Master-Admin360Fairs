<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class StorageService {
    
    public static function uploadFile($file)
    {   
        $path = Storage::disk('temp')->putFile('/', $file);
        $res = cloudinary()->upload(Storage::disk('temp')->path($file->hashName()), [
            'resource_type' => 'auto'
        ])->getResponse();
        
        // delete file
        $path = Storage::disk('temp')->delete($path);

        $resObj = json_decode(json_encode($res));
        return $resObj;
    }
}
