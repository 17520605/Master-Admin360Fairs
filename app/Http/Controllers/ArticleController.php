<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\RequestArticle;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {   
        $articles = ArticleService::getAll();
        return view('article.index', ['articles'=>  $articles]);
    }

    public function create()
    {
        return view('article.create');
    }

    public function saveCreate(Request $request)
    {
        $title = $request-> input('title');
        $slug = $request-> input('slug');
        $shortDescription = $request-> input('short_description');
        $content = $request-> input('content');
        $file =  $request-> file('files');
        $isPublic = $request-> input('public');
        $author = $request-> input('author');
        $banner = 'https://res.cloudinary.com/virtual-tour/image/upload/v1637651914/Background/webinar-default-poster_f23c8z.jpg';
        
        if(isset($file))
        {
            $res = $this-> uploadFile($file,true);
            $banner = $res-> url;
        }

        $article = new \App\Models\Article();
        
        $article-> title = $title;
        $article-> slug = $slug;
        $article-> banner =  $banner;
        $article-> shortDescription = $shortDescription;
        $article-> content = $content;
        $article-> author = $author;
        $article-> type = 'system';
        $article-> isPublic = isset($isPublic);
        $article-> save();

        return redirect()-> route('master.get.article.list-articles');

    }

    public function edit($id)
    {
        $article = Article::where('id', $id)-> first();
        return view('article.edit')-> with(['article' =>  $article]);
    }

    public function saveEdit($id, Request $request)
    {
        $article = Article::where('id', $id)-> first();
        $title = $request-> input('title');
        $slug = $request-> input('slug');
        $shortDescription = $request-> input('short_description');
        $content = $request-> input('content');
        $isPublic = $request-> input('public');
        $author = $request-> input('author');
        $changedFiles = $request-> input('changedFiles');
        
        if($article){
            $banner = $article-> banner;
            if($changedFiles == "1"){
                $file = $request-> file('file');
                if(isset($file))
                {
                    $res = $this-> uploadFile($file,true);
                    $banner = $res-> url;
                }
                else{
                    $banner = 'https://res.cloudinary.com/virtual-tour/image/upload/v1637651914/Background/webinar-default-poster_f23c8z.jpg';
                }
            }

            $article-> title = $title;
            $article-> slug = $slug;
            $article-> banner =  $banner;
            $article-> shortDescription = $shortDescription;
            $article-> content = $content;
            $article-> author = $author;
            $article-> type = 'system';
            $article-> isPublic = isset($isPublic);
            $article-> save();
        }
        return redirect()-> route('master.get.article.list-articles');;
    }

    public function toggleVisiable($id, Request $request)
    {
        $article = Article::where('id', $id)-> first();
        if(isset($article)){
            $article-> isPublic = !$article-> isPublic;
            $article-> save();
            return [
                'success' =>  true,
                'isHidden' =>  $article-> isPublic,
            ]; 
        }
        else{
            return [
                'success' =>  false,
                'errors' =>  'Thao tác thát bại'
            ]; 
        }
    }


    public function delete($id, Request $request)
    {
        $article = Article::where('id', $id)-> first();
        if(isset($article)){
            $article-> delete();
            return [
                'success' =>  true
            ]; 
        }
        else{
            return [
                'success' =>  false,
                'errors' =>  'Xóa thất bại'
            ]; 
        }
    }
}
