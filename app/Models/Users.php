<?php namespace App\Models;

class Users extends BaseModel {
    
    protected $table = 'users';

    protected $fillable = [
       'id',
       'level',
       'type',
       'email',
       'email_verified_at',
       'password',
       'isRequiredChangePassword',
       'maximumTour',
       'accessToken',
       'remember_token',
       'created_at',
       'updated_at'
    ];
}
