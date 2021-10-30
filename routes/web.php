<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/albums', AlbumController::class);
Route::post('albums/{album}/upload', [AlbumController::class, 'upload'])->name('albums.upload');
Route::get('albums/{album}/image/{image}', [AlbumController::class, 'showImage'])->name('albums.image.show');
Route::delete('albums/{album}/image/{image}', [AlbumController::class, 'destroyImage'])->name('albums.image.destroy');
