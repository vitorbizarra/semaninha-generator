<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Barryvanveen\Lastfm\Lastfm;
use GuzzleHttp\Client;

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
    $lastfm = new Lastfm(new Client(), getenv('LASTFM_API_KEY'));

    $albums = $lastfm->userTopAlbums('vitor_bizarra')->get();
    return response()->json($albums);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
