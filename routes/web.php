<?php

use App\Http\Controllers;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/employees', 'App\Http\Controllers\EmployeeController@index')
    ->middleware(['auth'])->name('employees');

Route::get('/employeesAdmin', 'App\Http\Controllers\EmployeeController@admin')
    ->middleware(['auth'])->name('employeesAdmin');

Route::get('/employeesAdmin/create', 'App\Http\Controllers\EmployeeController@create')
    ->middleware(['auth'])->name('create employee');

Route::post('/employeesAdmin', 'App\Http\Controllers\EmployeeController@store')
    ->middleware(['auth'])->name('store employee');

Route::get('/employees/{id}', [Controllers\EmployeeController::class, 'show'])
    ->middleware(['auth'])->name('show employee');

Route::get('/employeesAdmin/{id}/edit', [Controllers\EmployeeController::class, 'edit'])
    ->middleware(['auth'])->name('edit employee');

Route::post('/employeesAdmin/{id}', 'App\Http\Controllers\EmployeeController@update')
    ->middleware(['auth'])->name('update employee');

// ToDo: Update method to DELETE instead GET
Route::get('/employeesAdmin/{id}/delete', [Controllers\EmployeeController::class, 'destroy'])
    ->middleware(['auth'])->name('delete employee');

require __DIR__.'/auth.php';
