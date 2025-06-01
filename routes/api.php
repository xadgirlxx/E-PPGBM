<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/provinces', function () {
    // dd('test');
    $response = Http::get('https://wilayah.id/api/provinces.json');
    return response()->json($response->json());
});
Route::get('/regencies/{prov_id}', function ($prov_id) {
    $response = Http::get("https://wilayah.id/api/regencies/$prov_id.json");
    return response()->json($response->json());
});
Route::get('/districts/{kab_id}', function ($kab_id) {
    $response = Http::get("https://wilayah.id/api/districts/$kab_id.json");
    return response()->json($response->json());
});
Route::get('/villages/{district_id}', function ($district_id) {
    $response = Http::get("https://wilayah.id/api/villages/$district_id.json");
    return response()->json($response->json());
});
