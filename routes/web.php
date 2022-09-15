<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProjectController;
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
    Route::get('/workplaces/dropdownList', [WorkplaceController::class, 'dropdownList'])->name('workplaces.dropdownList');
    Route::resource('workplaces', WorkplaceController::class);

    Route::get('/techStackTypes/dropdownList', [TechStackTypeController::class, 'dropdownList'])->name('techStackTypes.dropdownList');
    Route::resource('techStackTypes', TechStackTypeController::class);

    Route::get('/techStacks/indexApi', [TechStackController::class, 'indexApi'])->name('techStacks.indexApi');
    Route::get('/techStacks/dropdownList', [TechStackController::class, 'dropdownList'])->name('techStacks.dropdownList');
    Route::get('/techStacks/showList', [TechStackController::class, 'showList'])->name('techStacks.showList');
    Route::resource('techStacks', TechStackController::class);

    Route::get('/projects/indexApi', [ProjectController::class, 'indexApi'])->name('projects.indexApi');
    Route::resource('projects', ProjectController::class);
});