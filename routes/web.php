<?php

use App\Models\User;
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'show'])->name('index');
//Route::get('/{id}/delete', [
//    'as' => 'delete',
//    'uses' => [\App\Http\Controllers\UserController::class, 'delete'],
//]);
Route::get('/{id}/delete', [\App\Http\Controllers\UserController::class, 'delete'])->name('delete');
Route::get('/{id}/update', [\App\Http\Controllers\UserController::class, 'temp']);


Route::post('/{id}/update', [\App\Http\Controllers\UserController::class, 'update'])->name('update');

Route::name('user.')->group(function (){
    Route::view('/private', 'private')->middleware('auth')->name('private');

    Route::get('/login', function (){
        if(auth()->check()){
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

    Route::get('/logout', function (){
        auth()->logout();
        return redirect('/login');
    })->name('logout');

    Route::get('/registration', function (){
        if(auth()->check()){
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration', [\App\Http\Controllers\RegisterController::class, 'save']);
});
