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

//Dashboard

Route::get('/',[\App\Http\Controllers\Admin\ForAdminController::class,'send']);
Route::get('/home',[\App\Http\Controllers\Admin\ForAdminController::class,'home']);
Route::get('/product',[\App\Http\Controllers\Admin\ForAdminController::class,'product']);
Route::get('/person',[\App\Http\Controllers\Admin\ForAdminController::class,'person']);
Route::get('/order',[\App\Http\Controllers\Admin\ForAdminController::class,'order']);
Route::get('/message',[\App\Http\Controllers\Admin\ForAdminController::class,'message']);
Route::get('/msk',[\App\Http\Controllers\Admin\ForAdminController::class,'msk']);

Route::post('/addproduct',[\App\Http\Controllers\Admin\ForAdminController::class,'addproduct']);
Route::post('/updateproduct',[\App\Http\Controllers\Admin\ForAdminController::class,'productupdate']);
Route::post('/deleteproduct',[\App\Http\Controllers\Admin\ForAdminController::class,'productdelete']);
Route::get('/prods',[\App\Http\Controllers\Admin\ForAdminController::class,'allProducts']);
Route::post('/addkitchen',[\App\Http\Controllers\Admin\ForAdminController::class,'addkitchen']);
Route::post('/updatekitchen',[\App\Http\Controllers\Admin\ForAdminController::class,'updatekitchen']);
Route::post('/kitchendelete',[\App\Http\Controllers\Admin\ForAdminController::class,'kitchendelete']);
Route::post('/addperson',[\App\Http\Controllers\Admin\ForAdminController::class,'addperson']);
Route::post('/updateperson',[\App\Http\Controllers\Admin\ForAdminController::class,'updateperson']);
Route::post('/persondelete',[\App\Http\Controllers\Admin\ForAdminController::class,'persondelete']);
Route::post('/seenmessage',[\App\Http\Controllers\Admin\ForAdminController::class,'seenmessage']);
Route::post('/seenorder',[\App\Http\Controllers\Admin\ForAdminController::class,'seenorder']);

//For project

Route::get('/pieworld',[\App\Http\Controllers\Project\PieworldController::class,'sendproject']);
Route::post('/insertmessage',[\App\Http\Controllers\Project\PieworldController::class,'insertmessage']);
Route::get('/orderpage',[\App\Http\Controllers\Project\PieworldController::class,'orderpage']);
Route::post('/src',[\App\Http\Controllers\Project\PieworldController::class,'src']);
Route::post('/insertorder',[\App\Http\Controllers\Project\PieworldController::class,'insertorder']);
Route::get('/productlist',[\App\Http\Controllers\Project\PieworldController::class,'productlist']);




