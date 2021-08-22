<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{


    public function edit(Setting $setting){
        $setting = Setting::first();
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting){

      // dd($request->all());
        $this->validate($request, [
            'nom' => 'required',
            'copyright' => 'required',
        ]);

        $setting = Setting::first();
        $this->validate($request, [
            'nom' => 'required',
            'copyright' => 'required',

        ]);
        $setting->nom = $request->nom;
        $setting->copyright = $request->copyright;
        $setting->description = $request->description;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->whatsapp = $request->whatsapp;



        if($request->hasFile('logo')){
            $logo = $request->logo;
            $image_new_name = time() . '.' . $logo->getClientOriginalName();
            $logo->move('storage/setting/', $image_new_name);
            $setting->logo = '/storage/setting/' . $image_new_name;
            $setting->save();
        }

        Session::flash('success', 'Paramètre modifié avec succès');
        return redirect()->back();
    }

}
