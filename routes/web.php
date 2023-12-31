<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/storages', [App\Http\Controllers\StorageController::class, 'index']);

Route::get('/recipes', [App\Http\Controllers\ReciptController::class, 'index']);
Route::get('/recipes/{id}', [App\Http\Controllers\ReciptController::class, 'detail']);
Route::get('/recepeadd/', [App\Http\Controllers\ReciptController::class, 'recepeAdd']);
Route::post('/recepeadd/', [App\Http\Controllers\ReciptController::class, 'recepeAddPost']);
Route::post('/recepeDelete/', [App\Http\Controllers\ReciptController::class, 'recepeDelete']);


Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);
Route::post('/login/', [App\Http\Controllers\FrontendController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\FrontendController::class, 'logout']);

Route::get('/addco/', [App\Http\Controllers\FrontendController::class, 'addco']);
Route::post('/addco/', [App\Http\Controllers\FrontendController::class, 'addcoPost']);
Route::get('/company/{id}', [App\Http\Controllers\FrontendController::class, 'detail']);

Route::get('/getAjaxCompanies', [App\Http\Controllers\FrontendController::class, 'getAjaxCompanies']);
Route::post('/postKarma', [App\Http\Controllers\FrontendController::class, 'postKarma']);


Route::get('/image/{id}', [App\Http\Controllers\FrontendController::class, 'image']);

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


