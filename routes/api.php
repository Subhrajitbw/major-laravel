<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------login------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::controller(App\Http\Controllers\Auth\RegisterController::class)->group(function(){
//     Route::post('register', 'register');
//     Route::post('login', 'login');
// });
 Route::post('register',[RegisterController::class, 'validator']);
 //Route::post('register',[RegisterController::class, 'create']);

 Route::post('login', [LoginController::class, 'login']);

 Route::get('blogs', function () {
    $posts = TCG\Voyager\Models\Post::all();
    return response($posts, 201);
});

Route::get('blogs/{post}', function ($post) {
    
    $posts = TCG\Voyager\Models\Post::where('slug', $post)->firstOrFail();
    return response($posts, 201);
});

// Route::middleware('auth:sanctum')->group( function () {
//     Route::resource('products', ProductController::class);
// });

