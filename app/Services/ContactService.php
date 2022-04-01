<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ContactService {
    public static function getAll(){
        $contacts = \App\Models\Contact::all();
        return $contacts;
    }
    public static function getById($id){
        $contact = \App\Models\Contact::find($id);
        return $contact;
    }
}
