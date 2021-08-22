<?php

use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Front end route
Route::get('/', 'App\Http\Controllers\FrontController@home')->name('website');
Route::get('/about', 'App\Http\Controllers\FrontController@about')->name('website.about');
Route::get('/category/{slug}', 'App\Http\Controllers\FrontController@category')->name('website.category');
Route::get('/tag/{slug}', 'App\Http\Controllers\FrontController@tag')->name('website.tag');
Route::get('/contact', 'App\Http\Controllers\FrontController@contact')->name('website.contact');
Route::get('/article/{slug}', 'App\Http\Controllers\FrontController@post')->name('website.post');
//Route::get('/save-comment/{slug}', 'App\Http\Controllers\FrontController@save_comment')->name('website.post');
// poost search
Route::get('/search','App\Http\Controllers\searchArticleController@index')->name('website.search');
//Route::get('/blogs', 'App\Http\Controllers\FrontController@getArticles')->name('getArticles');

//Route::get('/', 'App\Http\Controllers\FrontController@home')->name('website');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/admin/login', 'App\Http\Controllers\AdminController@login')->name('auth.login');

Route::post('/admin/login', [AdminController::class,'submit_login']);

Route::middleware('auth:sanctum')->group(function (){

Route::get('redirects', 'App\Http\Controllers\AdminController@index');


Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->middleware('auth');

// Categorie

Route::get('admin/categorie/{id}/delete', [CategorieController::class,'destroy']);

Route::resource('admin/categorie', CategorieController::class);


// Article

//Route::get('/changeStatus', [ArticleController::class,'changeArticleStatus'])->name('changeStatus');


Route::get('admin/article/{id}/delete', [ArticleController::class,'destroy']);

Route::resource('admin/article', ArticleController::class);

Route::resource('admin/tag', 'App\Http\Controllers\TagController');

Route::resource('admin/artiste', 'App\Http\Controllers\ArtisteController');

Route::resource('admin/user', 'App\Http\Controllers\UserController');

Route::get('admin/users', [UserController::class, 'create'])->name('users.create');

Route::post('admin/users', [UserController::class, 'store'])->name('user.store');

Route::get('admin/users', [UserController::class, 'index'])->name('users.index');

Route::get('admin/user', [UserController::class, 'edit'])->name('user.edit');

Route::post('admin/user', [UserController::class, 'update'])->name('user.update');

Route::get('admin/users/{id}/delete', [UserController::class,'destroy']);

Route::get('admin/setting', [SettingController::class, 'edit'])->name('setting.edit');

Route::post('admin/setting', [SettingController::class, 'update'])->name('setting.update');

//Route::resource('user', [UserController::class]);
//Route::get('admin/article', [ArticleController::class, 'index'])->name('article.index');
    //Route::get('admin/user', [UserController::class,'index']);
    Route::get('admin/changeStatus', [UserController::class,'changeStatus'])->name('changeStatus');
    Route::get('admin/changeArticleStatus', [ArticleController::class,'changeArticleStatus'])->name('changeArticleStatus');

    Route::get('admin/profile', [UserController::class])->name('user.profile');
    Route::post('admin/profile', [UserController::class])->name('user.profile.update');
});

