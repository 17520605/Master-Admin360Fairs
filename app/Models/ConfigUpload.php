<?php namespace App\Models;


class ConfigUpload extends BaseModel {
    
    protected $table = 'config_upload';

    protected $fillable = [
       'id',
       'type',
       'value',
       'created_at',
       'updated_at'
    ];
}
