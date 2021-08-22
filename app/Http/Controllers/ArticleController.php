<?php

namespace App\Http\Controllers;


use App\Http\Middleware\checkUser;
use Illuminate\Support\Facades\Session;
use App\Models\Categorie;
use App\Models\Tag;
use App\Models\Artiste;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        $articles = Article::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.article.index', [
            'articles' => $articles,
            'titre' => 'liste des articles',
            'meta_desc' => 'c\'est la description de l\'article',
            ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Categorie::all();
        $artistes = Artiste::all();
        $user_id = User::all();
        return view('admin.article.create', compact(['categories', 'tags', 'artistes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'titre' => 'required|unique:articles,titre',
            'image' => 'required|image',
            'details' => 'required',
            'category' => 'required',
            ]);

            $article = Article::create([

                'titre' => $request->titre,
                'slug' => Str::slug($request->titre),
                'image' => 'image.jpg',
                'details' => $request->details,
                'category_id' => $request->category,
                'published' => Carbon::now(),
                'publier' => $request->publier,
                'user_id' =>  auth()->user()->id,

            ]);

           // $article->tags()->attach($request->tags);


            if($request->hasFile('image')){
                $image = $request->image;
                $image_new_name = time() . '.' . $image->getClientOriginalName();
                $image->move('storage/article/', $image_new_name);
                $article->image = '/storage/article/' . $image_new_name;
                $article->save();
            }

            Session::flash('success', 'article a été ajoutée avec succès !');
                return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $tags = Tag::all();
        $artistes = Artiste::all();
        $user_id = User::all();
        return view('admin.article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        $artistes = Artiste::all();
        $categories = Categorie::all();
        $user_id = User::all();
        if(auth()->user()->id !== $article->user_id){
            return redirect('/article')->with('error', 'Unauthorized page!!');
        }
       return view('admin.article.edit', compact(['article', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'titre' => "required|unique:articles,titre, $article->id",
            'details' => 'required',
            'category' => 'required',
            ]);


                $article->titre = $request->titre;
                $article->slug = Str::slug($request->titre);
                $article->details = $request->details;
                $article->category_id = $request->category;



            if($request->hasFile('image')){
                $image = $request->image;
                $image_new_name = time() . '.' . $image->getClientOriginalName();
                $image->move('storage/article/', $image_new_name);
                $article->image = '/storage/article/' . $image_new_name;

            }
            $article->save();

            Session::flash('success', 'article a été modifiée avec succès !');
                return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if(auth()->user()->id !== $article->user_id){
            return redirect('/article')->with('error', 'Unauthorized page!!');
        }
        if($article){
            if(file_exists($article->image)){
                unlink(public_path($article->image));
            }

            $article->delete();
            Session::flash('success', 'article a été supprimée avec succès !');
        }
        return redirect()->back();
    }
    public function changeArticleStatus(Request $request)
        {
            $article = Article::find($request->user_id);
            $article->status = $request->status;
            $article->save();

            return response()->json(['success'=>'Status change successfully.']);
        }

}
