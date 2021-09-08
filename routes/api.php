<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavbarApiController;
use App\Http\Controllers\API\NewsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::get('/navbar', [NavbarApiController::class,'index'])->name('api.navbar.index');
//Route::post('/navbar', [NavbarApiController::class,'store'])->name('api.navbar.store');
//Route::resource('/navbar', NavbarApiController::class);


Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::apiResource('/news', NewsController::class)->middleware('auth:api') ;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
