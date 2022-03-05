<?php

use App\Http\Controllers\admin\LanguagueController;
use App\Http\Controllers\admin\WorkExprienceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', function () { return view('admin.dashboard');})->name('dashboard');

    Route::controller(WorkExprienceController::class)->group(function(){
        Route::get('workExperiences','index')->name('workExperiences');
        Route::get('Add/workExperiences','create')->name('AddworkExperiences');
        Route::post('workExperiences/added','store')->name('workExperiences/added');
        Route::post('workExperiences/updated/{workExprience}','update')->name('workExperiences/updated');
        Route::get('workExperiences/delete/{workExprience}','destroy')->name('workExperiences/delete');
    });

    Route::controller(LanguagueController::class)->group(function(){
        Route::get('languagues','index')->name('languagues');
        Route::post('languagues/added','store')->name('languagues/added');
        Route::post('languagues/updated/{languague}','update')->name('languagues/updated');
        Route::get('languagues/delete/{languague}','destroy')->name('languagues/delete');
    });

    Route::get('profile', function () {
        return view('admin.profile');
    })->name('profile');




});

