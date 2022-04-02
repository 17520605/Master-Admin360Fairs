<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\RequestArticle;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\ArticleService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {   
        $articles = ArticleService::getAll();
        return view('article.index', ['articles'=> $articles]);
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
        $file =  $request->file('files');
        $isPublic = $request->input('public');
        
        $banner = 'https://res.cloudinary.com/virtual-tour/image/upload/v1637651914/Background/webinar-default-poster_f23c8z.jpg';
        if($file)
        {
            $banner = $this->uploadFile($file, true)->url;
        }

        $article = new \App\Models\Article();
        
        $article->title = $title;
        $article->slug = $slug;
        $article->banner =  $banner;
        $article->short_content = $short_content;
        $article->content = $content;
        $article->isPublic = $isPublic;
        $article->save();

        return redirect()->route('master.get.article.list-articles');

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
        return redirect()->route('master.get.article.list-articles');;
    }

    public function toggleVisiable($id, Request $request)
    {
        $article = Article::where('id', $id)->first();
        if(isset($article)){
            $article->isPublic = !$article->isPublic;
            $article->save();
            return [
                'success' => true,
                'isHidden' => $article->isPublic,
            ]; 
        }
        else{
            return [
                'success' => false,
                'errors' => 'Thao tác thát bại'
            ]; 
        }
    }

    public function uploadFile($file)
    {   
        $path = Storage::disk('temp')->putFile('/', $file);
        $res = cloudinary()->upload(Storage::disk('temp')->path($file->hashName()), [
            'resource_type' => 'auto'
        ])->getResponse();
        
        // delete file
        $path = Storage::disk('temp')->delete($path);

        $resObj = json_decode(json_encode($res));
        return $resObj;
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
