<?php namespace App\Models;


class Contact extends BaseModel {
    
    protected $table = 'contacts';

    protected $fillable = [
       'id',
       'name',
       'phone',
       'email',
       'title',
       'content',
       'status',
       'created_at',
       'updated_at'
    ];
}
