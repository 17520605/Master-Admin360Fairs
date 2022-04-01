<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ArticleService {

    public static function getAll(){
        $articles = \App\Models\Article::all();
        return $articles;
    }

    public static function getById($id){
        $article = \App\Models\Article::find($id);
        return $article;
    }

    public static function getBySlug($slug){
        $article= \App\Models\Article::where('slug', $slug)->first();
        return $article;
    }
}
