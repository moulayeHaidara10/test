<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Tag;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class FrontController extends Controller
{
    //
    public function home(){
        $posts = Article::with('category', 'user')->orderBy('created_at', 'DESC')->where('status',0)->take(3)->get();
        $firstPosts2 = $posts->splice(0, 1);
        $middleposts = $posts->splice(0, 1);
        $lastPost = $posts->splice(0, 1);

        if(request()->query('search')) {
            $posts = Article::where('titre','LIKE','%{$search}%')->simplePaginate(3);
        } else{
            $posts = Article::simplePaginate(3);
        }

        $recentsPosts = Article::with('category', 'user')->orderBy('created_at', 'DESC')->where('status',0)->paginate(9);
        return view('website.home', compact(['posts', 'recentsPosts', 'firstPosts2', 'middleposts', 'lastPost']));
    }

    public function category($slug){
        $category = Categorie::where('slug', $slug)->first();
        if($category){
            $articles = Article::where('category_id', $category->id)->paginate(9);

            return view('website.category', compact('category', 'articles'));
        } else {
            return redirect()->route('website');
        }
    }
    public function tag($slug){
        $tag = Categorie::where('slug', $slug)->first();
        if($tag){
            $articles = $tag->article()->orderBy('created_at', 'desc')->paginate(9);

            return view('website.tag', compact('tag', 'articles'));
        } else {
            return redirect()->route('website');
        }
    }
    public function setting($slug){
        $setting = Setting::where('slug', $slug)->first();
        if($setting){
            $articles = $setting->article()->orderBy('created_at', 'desc')->paginate(9);

            return view('website.setting', compact('setting', 'articles'));
        } else {
            return redirect()->route('website');
        }
    }
    public function about(){
        return view('website.about');
    }

    public function contact(){
        return view('website.contact');
    }
    public function post($slug){
        $article = Article::with('category', 'user')->where('slug', $slug)->first();
        $articles = Article::with('category', 'user')->inRandomOrder()->limit(3)->get();
             DB::table('articles')
                ->where('id', $article->id)
                ->increment('views', 1);


        $views = $article['views'];
         Article::where('id', $slug)->update(['views' => DB::raw('views + 1')]);

        $categories = Categorie::all();
      $tags = Tag::all();

      $recentsPosts = Article::with('category', 'user')->orderBy('created_at', 'DESC')->where('status',0);
      $latestPost = Article::OrderBy('views', 'DESC')->take(3);
        if($article){
            return view('website.post', compact('article','articles', 'categories', 'recentsPosts', 'latestPost'));
        } else {
            return redirect('/');
        }

    }

}
