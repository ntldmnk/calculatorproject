<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisztracioController;
use App\Http\Controllers\KoretController;
use App\Http\Controllers\OsszetevoController;
use App\Http\Controllers\EtelController;
use App\Http\Controllers\OsszesitesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/regisztraciok',[RegisztracioController::class,'index']);
Route::get('/koretek',[KoretController::class,'index']);
Route::get('/osszetevok',[OsszetevoController::class,'index']);
 Route::get('/etelek',[EtelController::class,'index']);
Route::get('/etkezesiNaplok',[OsszesitesController::class,'index']);
/////////////////////////////////////////////////////////////////////////////
Route::post('/regisztraciok',[RegisztracioController::class,'store']);
Route::post('/login',[RegisztracioController::class,'login']);
Route::post('/koretek',[KoretController::class,'store']);
Route::post('/osszetevok',[OsszetevoController::class,'store']);
Route::post('/etelek',[EtelController::class,'store']);
Route::post('/etkezesiNaplok',[OsszesitesController::class,'store']);
/////////////////////////////////////////////////////////////////////////////
Route::get('/regisztraciok/{regisztracioID}',[RegisztracioController::class,'getById']);
Route::get('/koretek/{id}',[KoretController::class,'getById']);
Route::get('/osszetevok/{id}',[OsszetevoController::class,'getById']);
Route::get('/etelek/{id}',[EtelController::class,'getById']);
Route::get('/etkezesiNaplok/{etkezesiNaploID}',[OsszesitesController::class,'getById']);
/////////////////////////////////////////////////////////////////////////////
Route::delete('/regisztraciok/{id}',[RegisztracioController::class,'destroy']);
Route::delete('/osszetevok/{id}',[OsszetevoController::class,'destroy']);
Route::delete('/etkezesiNaplok/{id}',[OsszesitesController::class,'destroy']);
Route::delete('/koretek/{id}',[KoretController::class,'destroy']);
Route::delete('/etelek/{id}',[EtelController::class,'destroy']);
/////////////////////////////////////////////////////////////////////////////
Route::put('/etkezesiNaplok/{id}',[OsszesitesController::class,'update']);
Route::put('/koretek/{id}',[KoretController::class,'update']);
Route::put('/etelek/{id}',[EtelController::class,'update']);
Route::put('/osszetevok/{id}',[OsszetevoController::class,'update']);
Route::put('/regisztraciok/{id}',[RegisztracioController::class,'update']);
/////////////////////////////////////////////////////////////////////////////
Route::get('/etelkajanev/{etelNev}',[EtelController::class,'searchbyname']);
Route::get('/koretkajanev/{koretNev}',[KoretController::class,'searchbyname']);
Route::get('/osszesiteskajanev/{etkezesiNaploNev}',[OsszesitesController::class,'searchbyname']);
Route::get('/osszetevokajanev/{osszetevoNev}',[OsszetevoController::class,'searchbyname']);
Route::get('/regkajanev/{felhNev}',[RegisztracioController::class,'searchbyname']);

