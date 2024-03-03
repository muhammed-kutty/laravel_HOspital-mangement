<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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




Route::get('/', [HomeController::class,'index'])->name('index');

Route::get('/home', [HomeController::class,'redirect'])->name('redirect');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/add_docters', [AdminController::class,'addview'])->name('admin.addview');
Route::post('/upload_docts', [AdminController::class ,'upload_docts'])->name('admin.upload_docts');

Route::post('appointment', [HomeController::class,'appointment'])->name('user.appointment');
Route::get('myappointment', [HomeController::class,'myappointment'])->name('user.myappointment');
Route::get('cancelappointment/{id}', [HomeController::class,'cancelappointment'])->name('user.cancelappointment');

Route::get('showappointments', [AdminController::class,'showappointments'])->name('admin.showappointments');

Route::get('deleteappointments/{id}', [AdminController::class,'deleteappointments'])->name('admin.deleteappointment');
Route::get('approveappointments/{id}', [AdminController::class,'approveappointments'])->name('admin.approveappointment');


Route::get('docters', [AdminController::class,'docters'])->name('admin.docters');
Route::get('deletedocters/{id}', [AdminController::class,'deletedocters'])->name('admin.deletedocters');
Route::get('editdocters/{id}', [AdminController::class,'editdocters'])->name('admin.edittedocters');
Route::post('updatedocters/{id}', [AdminController::class,'updatedocters'])->name('admin.updatedocters');





