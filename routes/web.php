<?php

use App\Http\Controllers\admin\EducationController;
use App\Http\Controllers\admin\ExtraSkillController;
use App\Http\Controllers\admin\LanguagueController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SkillController;
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

    Route::controller(EducationController::class)->group(function(){
        Route::get('educations','index')->name('educations');
        Route::get('Add/educations','create')->name('AddEducations');
        Route::post('educations/added','store')->name('educations/added');
        Route::post('educations/updated/{education}','update')->name('educations/updated');
        Route::get('educations/delete/{education}','destroy')->name('educations/delete');
    });

    Route::controller(LanguagueController::class)->group(function(){
        Route::get('languagues','index')->name('languagues');
        Route::post('languagues/added','store')->name('languagues/added');
        Route::post('languagues/updated/{languague}','update')->name('languagues/updated');
        Route::get('languagues/delete/{languague}','destroy')->name('languagues/delete');
    });

    Route::controller(SkillController::class)->group(function(){
        Route::get('skills','index')->name('skills');
        Route::post('skills/added','store')->name('skills/added');
        Route::post('skills/updated/{skill}','update')->name('skills/updated');
        Route::get('skills/delete/{skill}','destroy')->name('skills/delete');
    });

    Route::controller(ExtraSkillController::class)->group(function(){
        Route::get('extraSkills','index')->name('extraSkills');
        Route::post('extraSkills/added','store')->name('extraSkills/added');
        Route::post('extraSkills/updated/{extraSkill}','update')->name('extraSkills/updated');
        Route::get('extraSkills/delete/{extraSkill}','destroy')->name('extraSkills/delete');
    });

    Route::controller(ProfileController::class)->group(function(){
        Route::get('profile','index')->name('profile');
        Route::post('profile/update/{id}','update')->name('profile/updated');
        Route::post('change-password','store')->name('password-change');
    });




});

