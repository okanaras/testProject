<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//herhangi bir link olmadiginda yonlenecek yer
Route::get('/', function () {
    return view('auth.login');
});

// starter auth 
Route::get('/dashboard', function () {
    return view('admin.home');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

// end auth 


/* ********************************************************** */


/* starter companies actions */
Route::controller(CompanyController::class)->middleware(['auth', 'verified'])->group(function () {
    // list action
    Route::get('/company/list', 'index')->name("company-list");

    // add action
    Route::get('/company/add', 'create')->name("company-add");
    Route::post('/company/add-post', 'store')->name("company-add-post");

    // edit action, update action
    Route::get('/company/edit/{id}', 'edit')->name("company-edit"); // duzenleme icin burda extra olarak id sinide almaliyiz ki verileri gelsin
    Route::post('/company/edit-post/{id}', 'update')->name("company-edit-post");

    // delete action
    Route::get('/company/delete/{id}', 'destroy')->name('company-delete'); // silinecek verinin id si gerektigi icin burda da extra olarak id sini de belirttik

    //info action
    Route::get('/company/show/{id}', 'show')->name("company-show"); // goruntulenecek verinin id si gerektigi icin burda da extra olarak id sini de belirttik

});

/*end companies actions */


/* ********************************************************** */


/* starter employees actions */

Route::controller(EmployeeController::class)->middleware(['auth', 'verified'])->group(function () {

    // list action
    Route::get('/employee/list', 'index')->name("employee-list");

    // add action
    Route::get('/employee/add', 'create')->name("employee-add");
    Route::post('/employee/add-post', 'store')->name("employee-add-post");

    // edit action, update action
    Route::get('/employee/edit/{id}', 'edit')->name("employee-edit"); // duzenleme icin burda extra olarak id sinide almaliyiz ki verileri gelsin
    Route::post('/employee/edit-post/{id}', 'update')->name("employee-edit-post");

    // delete action
    Route::get('/employee/delete/{id}', 'destroy')->name('employee-delete'); // silinecek verinin id si gerektigi icin burda da extra olarak id sini de belirttik

    //info action
    Route::get('/employee/show/{id}', 'show')->name("employee-show"); // goruntulenecek verinin id si gerektigi icin burda da extra olarak id sini de belirttik
});

/*end employees actions */


/* ********************************************************** */

/*starter admin actions */
// logout islemini yapan kisim
Route::controller(AuthController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name("admin.logout");
});

/*end admin actions */