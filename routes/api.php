<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// define the middleware for authentication
$middleware = ['auth:sanctum'];
// define the prefix for the api routes
$prefix = 'api/v1';
// create the user route
Route::middleware($middleware)->get('/user', function (Request $request) {
    return $request->user();
});
// create the api routes
Route::middleware($middleware)->prefix($prefix)->name('api.')->group(function () {
    Route::apiResource('/tasks', 'TaskController');
});
