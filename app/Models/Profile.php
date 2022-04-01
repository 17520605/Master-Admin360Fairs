<?php namespace App\Models;


class Profile extends BaseModel {
    
    protected $table = 'profile';

    protected $fillable = [
       'id',
       'userId',
       'type',
       'avatar',
       'logo',
       'background',
       'name',
       'address',
       'email',
       'contact',
       'facebook',
       'youtube',
       'website',
       'description	',
       'profile',
       'isPublic',
       'created_at',
       'updated_at'
    ];
}
