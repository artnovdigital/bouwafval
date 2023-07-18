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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);
Route::post('/login/', [App\Http\Controllers\FrontendController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\FrontendController::class, 'logout']);

Route::get('/addco/', [App\Http\Controllers\FrontendController::class, 'addco']);
Route::post('/addco/', [App\Http\Controllers\FrontendController::class, 'addcoPost']);
Route::get('/company/{id}', [App\Http\Controllers\FrontendController::class, 'detail']);

Route::get('/getAjaxCompanies', [App\Http\Controllers\FrontendController::class, 'getAjaxCompanies']);

Route::get('/image/{id}', [App\Http\Controllers\FrontendController::class, 'image']);

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


