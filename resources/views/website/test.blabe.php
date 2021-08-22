@extends('layouts.admin')


@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Modifier Paramètre</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=" {{ route('website') }} ">Accueil</a></li>
            </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="card-title">Modifier Paramètre  </h3>

                </div>
            </div>
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-10 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        <form action="{{ route('setting.update', [$setting->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                @include('includes.errors')
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Titre</label>
                                <input type="text" class="form-control" name="titre" value="{{ $article->titre }}" id="exampleInputEmail1" placeholder="Entrer le titre">
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-8">
                                      <label class="custom-file-label" for="customFile">Image</label>
                                      <input type="file" class="custom-file-input" name="image" id="image">
                                    </div>
                                    <div class="col-4">
                                      <div style="max-width: 100px; max-height: 300px; overflow:hidden;margin-left: auto">
                                        <img src="{{ $setting->image }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Paragraphe</label>
                                  <textarea name="details" id="details"  rows="10" class="form-control">{{ $article->details }}</textarea>
                                </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-lg btn-primary">Modifier article</button>
                            </div>
                          </form>
                    </div>
                <table class="table table-striped">

                </table>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('style')

<link rel="stylesheet" href="{{asset('/admin/css/summernote-bs4.min.css')}}">
@endsection

@section('script')

        <script src="{{asset('/admin/js/summernote-bs4.min.js')}}"></script>

        <script>
          $('#details').summernote({
            placeholder: 'Votre paragraphe cici',
            tabsize: 2,
            height: 100
          });
        </script>
@endsection


migration

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('site_logo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->text('apropos')->nullable();
            $table->string('copyright')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}


/// model

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];
}



// controller

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}


// seed

$table->enum('publier', ['1', '0']);

use Illuminate\Database\Seeder;


class SettingTableSeeder extends Seeder
{
     /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'titre' => 'exemple',
            'copyright' => 'Copyright ©2020 All rights reserved',
        ]);
    }
}
