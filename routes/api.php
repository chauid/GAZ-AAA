<?php

use App\Http\Controllers\CoinController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
  $data = array(
    'api_version' => 'v1'
  );
  return $data;
});

// v1 API
Route::prefix('/v1')->group([
  'middleware' => 'api',
  'namespace' => 'App\Http\Controllers',
  'prefix' => 'auth'
], function () {
  Route::get('/', function () {
    $ses = session()->get('id');
    $data = array(
      'api version: v1' => 'ok',
      'session_data' => $ses,
    );
    return $data;
  });
  // 코인 데이터 가져오기
  Route::get('/getcoins', [CoinController::class, 'getMinCoinInfo']);
  Route::get('/getcoinhistory', [CoinController::class, 'getCoinHistory']);
  Route::get('/getcomments', [CoinController::class, 'getComments']);

  // 로그인
  Route::post('/login', [JWTAuthController::class, 'login']);
  Route::post('/register', [JWTAuthController::class, 'register']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
