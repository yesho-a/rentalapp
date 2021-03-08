<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\DropzoneController;






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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

//Route::get('/tenant', [App\Http\Controllers\TenantController::class, 'index']);
//Route::get('/tenant', [TenantController::class, 'index']);
Route::resource('tenant', TenantController::class);
Route::get('/simon','App\Http\Controllers\TenantController@simon');
Route::resource('property', PropertyController::class);
Route::resource('payment', PaymentController::class);
Route::resource('user',UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('perm', PermissionController::class);
Route::get('invoice/{id}','App\Http\Controllers\TenantController@invoice');
Route::get('send/{id}','App\Http\Controllers\TenantController@sendinvoice');
Route::patch('/perm/{id}/update/', 'PermissionController@update')->name('permission.update');
Route::patch('/perm/{id}/edit/', 'PermissionController@edit')->name('permission.edit');
//Route::get('/perm/{id}/delete/', 'App\Http\Controllers\PermissionController@destroy')->name('permission.destroy');
Route::delete('/perm/{id}', 'App\Http\Controllers\PermissionController@destroy')->name('permission.destroy');
Route::get('/list','App\Http\Controllers\PaymentController@getPaymentsList');
Route::get('/payment/create','App\Http\Controllers\PaymentController@ajax');
Route::get('/sidebar','App\Http\Controllers\HomeController@sidebar');
Route::get('/admin','App\Http\Controllers\HomeController@admin');
Route::get('/table','App\Http\Controllers\HomeController@table');
Route::get('/comp','App\Http\Controllers\HomeController@compose');
Route::get('/read','App\Http\Controllers\HomeController@read');
Route::get('/inbox','App\Http\Controllers\HomeController@inbox');


Route::get('/data', 'App\Http\Controllers\HomeController@data');
Route::get('/prop', 'App\Http\Controllers\HomeController@prop');

Route::get('pdf','App\Http\Controllers\TenantController@generatePDF');

//new

//Route::get('upload-ui', [FileUploadController::class, 'dropzoneUi' ]);
//Route::post('file-upload', [FileUploadController::class, 'dropzoneFileUpload' ])->name('dropzoneFileUpload');

//
//Route::get('dropzone', [FileUploadController::class, 'dropzone']);

//Route::post('dropzone/store', [FileUploadController::class, 'dropzoneStore'])->name('dropzone.store');

Route::get('dropzone', [DropzoneController::class, 'dropzone']);
Route::post('dropzone/store', [DropzoneController::class, 'dropzoneStore'])->name('dropzone.store');
