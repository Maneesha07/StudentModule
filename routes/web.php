<?php

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
Route::domain(env('DOMAIN_SITE'))->group(
    function () {
        Auth::routes();

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::prefix('students')->group(
            function () {
                Route::get('/', 'App\Http\Controllers\StudentsController@index')->name('students.index');
                Route::get('/list', 'App\Http\Controllers\StudentsController@getStudents')->name('students.list');
                Route::get('/create', 'App\Http\Controllers\StudentsController@create')->name('students.create');
                Route::post('/create', 'App\Http\Controllers\StudentsController@store')->name('students.store');
                Route::get('/{student}', 'App\Http\Controllers\StudentsController@edit')->name('students.edit');
                Route::put('/{student}', 'App\Http\Controllers\StudentsController@update')->name('students.update');
                Route::delete('/{student}', 'App\Http\Controllers\StudentsController@destroy')->name('students.destroy');
            }
        );
        Route::prefix('marks')->group(
            function () {
                Route::get('/', 'App\Http\Controllers\MarksController@index')->name('marks.index');
                Route::get('/list', 'App\Http\Controllers\MarksController@getMarks')->name('marks.list');
                Route::get('/create', 'App\Http\Controllers\MarksController@create')->name('marks.create');
                Route::post('/create', 'App\Http\Controllers\MarksController@store')->name('marks.store');
                Route::get('/{marks}', 'App\Http\Controllers\MarksController@edit')->name('marks.edit');
                Route::put('/{marks}', 'App\Http\Controllers\MarksController@update')->name('marks.update');
                Route::delete('/{marks}', 'App\Http\Controllers\MarksController@destroy')->name('marks.destroy');
            }
        );
    }
);