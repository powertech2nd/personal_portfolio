<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\TechStackController;
use App\Http\Controllers\WorkplaceController;
use App\Http\Controllers\TechStackTypeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('educations', EducationController::class);

    Route::get('/workplaces/indexApi', [WorkplaceController::class, 'indexApi'])->name('workplaces.indexApi');
    Route::resource('workplaces', WorkplaceController::class);

    Route::resource('techStackTypes', TechStackTypeController::class);

    Route::get('/techStacks/indexApi', [TechStackController::class, 'indexApi'])->name('techStacks.indexApi');
    Route::resource('techStacks', TechStackController::class);
});