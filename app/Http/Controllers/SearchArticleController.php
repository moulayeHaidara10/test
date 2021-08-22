<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $request->validate([
            'query' => 'required',
        ]);

        $query = $request->input('query');
        //dd($query);
        $posts = Article::where('titre', 'LIKE', "%$query%")->orWhere('details', 'like', "%$query%")->paginate(6);
       // dd($posts);
        return view('website.search',compact('posts'));
    }


}
