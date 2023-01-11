<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/', 'HomeController@index');
Route::get('/user/{name}', 'UserController@show');
Route::view('/about', 'pages.about')->name('about');

Route::redirect('/log-in', '/login', 301)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::prefix('app')->group(function () {
        Route::get('dashboard', 'DashboardController')->name('dashboard');
        Route::resource('tasks', 'TaskController')->name('tasks.');
    });
    Route::middleware(['is_admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', 'Admin\DashboardController');
        Route::get('stats', 'Admin\StatsController');
    });
});

require __DIR__ . '/auth.php';
