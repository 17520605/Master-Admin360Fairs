<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ProfileService {
    public static function getAll(){
        $profiles = \App\Models\Profile::all();
        return $profiles;
    }
    public static function getById($id){
        $profile = \App\Models\Profile::find($id);
        return $profile;
    }
}
