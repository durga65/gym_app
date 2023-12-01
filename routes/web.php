<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymProgramController;
use App\Http\Controllers\GymCoachController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TagController;

/*
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('programs', GymProgramController::class);

Route::resource('coachs', GymCoachController::class);
Route::resource('roles', RoleController::class);
//Route::group(['middleware' => ['auth']], function() {
//Route::resource('roles', RoleController::class);
//});

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('/testing', function(){
    return 'testing';
});

Route::resource('tags', TagController::class);