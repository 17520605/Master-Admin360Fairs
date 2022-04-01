<?php namespace App\Models;


class Article extends BaseModel {
    
    protected $table = 'article';

    protected $fillable = [
       'id',
       'title',
       'slug',
       'name',
       'banner',
       'shortDescription',
       'content',
       'author',
       'isPublic',
       'created_at',
       'updated_at'
    ];
}
