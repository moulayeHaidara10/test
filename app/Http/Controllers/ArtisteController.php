<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ArtisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artistes = Artiste::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.artiste.index',['artistes' => $artistes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artiste.create');
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
            'name' => 'required|unique:artistes,name',

        ]);
        $artiste = Artiste::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
        ]);

        Session::flash('success', 'L artiste a été ajouté avec succès !');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function show(Artiste $artiste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function edit(Artiste $artiste)
    {
        return view('admin.artiste.edit', compact('artiste'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artiste $artiste)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags,name',

        ]);
        $artiste->name = $request->name;
        $artiste->slug = Str::slug($request->name, '-');
        $artiste->save();


        Session::flash('success', 'artiste a été modifié avec succès !');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artiste $artiste)
    {
        if($artiste){
            $artiste->delete();
            Session::flash('success', 'artiste a été supprimée avec succès !');

            return redirect()->back();
        }
    }
}
