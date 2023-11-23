<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\JobController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route ::resource('/Project', ProjectController::class);
    Route::delete('/Project/{project}', [ProjectController::class, 'destroy'])->name('Project.destroy');

    Route::get('/Project/{project}/Job', [JobController::class, 'index'])->name('Job.index');
    Route::get('/Job/create', [JobController::class, 'create'])->name('Job.create');
    Route::get('/Project/{job}/Job', [JobController::class, 'show'])->name('Job.show');
    Route::get('/Job/{job}/edit', [JobController::class, 'edit'])->name('Job.edit');
    Route::delete('/Job/{job_id}', [JobController::class, 'destroy'])->name('Job.destroy');
    Route::put('/Job/{job}',[JobController::class, 'update'])->name('Job.update');
    Route::get('/search/', [JobController::class, 'search'])->name('search');
    Route::post('/Job', [JobController::class,'store'])->name('Job.store');
    

    Route::get('/Pic', [PicController::class, 'index'])->name('Pic.index');
    Route::get('/Pic/create', [PicController::class, 'create'])->name('Pic.create');
    Route::get('/Pic/{pic}', [PicController::class, 'show'])->name('Pic.show');
    Route::get('/Pic/{pic}/edit', [PicController::class, 'edit'])->name('Pic.edit');
    Route::delete('/Pic/{pic}', [PicController::class, 'destroy'])->name('Pic.destroy');
    Route::put('/Pic/{pic}',[PicController::class, 'update'])->name('Pic.update');
    Route::post('/Pic', [PicController::class,'store'])->name('Pic.store');

});        
