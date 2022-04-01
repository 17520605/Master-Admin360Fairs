<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Http\Requests\RequestArticle;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\ArticleService;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {   
        $articles = ArticleService::getAll();
        foreach ($articles as $article) {
            $images = \App\Services\StorageService::getUrl($article->poster_id, 'small');
            $article->image = $images ;
        }
        $viewData = [
            'articles'=> $articles,
        ];

        return view('article.index', $viewData);
    }

    public function create()
    {
        return view('article.create');
    }

    public function saveCreate(Request $request)
    {
        $title = $request->input('title');
        $slug = $request->input('slug');
        $short_content = $request->input('short_content');
        $content = $request->input('content');
        $files = $request->file('files');
        $hidden = $request->input('hidden');
        for ($i=0; $i < count($files); $i++) {
            $assetId = \App\Services\StorageService::upload($files[$i], $slug.'_'.($i+1));
        }
        
        $article = new \App\Models\Article();
        $article->title = $title;
        $article->slug = $slug;
        $article->poster_id =  $assetId;
        $article->short_content = $short_content;
        $article->content = $content;
        $article->is_hidden = (!isset($hidden));
        $article->save();

        return redirect()->route('management.get.article.list-articles');

    }

    public function edit($id)
    {
        $article = Article::where('id', $id)->first();
        $image = \App\Services\StorageService::getUrl($article->poster_id, 'original');
        return view('article.edit')->with([
            'article' => $article,
            'image' => $image,
        ]);
    }

    public function saveEdit($id, Request $request)
    {
        $article = Article::where('id', $id)->first();
        $title = $request->input('title');
        $slug = $request->input('slug');
        $short_content = $request->input('short_content');
        $content = $request->input('content');
        $hidden = $request->input('hidden');
        $changedFiles = $request->input('changedFiles');
        
        if($article){
            $image = $article->poster_id;
            if($changedFiles == "1"){
                $file = $request->file('file');
                if(isset($file)){
                    $assetId = \App\Services\StorageService::upload($file, $slug);
                    $image = $assetId;
                }
                else{
                    $image = null;
                }
            }
            $article->title = $title;
            $article->slug = $slug;
            $article->poster_id = $image;
            $article->short_content = $short_content;
            $article->content = $content;
            $article->is_hidden = (!isset($hidden));
            $article->save();
        }
        return redirect()->route('management.get.article.list-articles');;
    }

    public function toggleVisiable($id, Request $request)
    {
        $article = Article::where('id', $id)->first();
        if(isset($article)){
            $article->is_hidden = !$article->is_hidden;
            $article->save();
            return [
                'success' => true,
                'isHidden' => $article->is_hidden,
            ]; 
        }
        else{
            return [
                'success' => false,
                'errors' => 'Thao tác thát bại'
            ]; 
        }
    }


    public function delete($id, Request $request)
    {
        $article = Article::where('id', $id)->first();
        if(isset($article)){
            $article->delete();
            return [
                'success' => true
            ]; 
        }
        else{
            return [
                'success' => false,
                'errors' => 'Xóa thất bại'
            ]; 
        }
    }
}
