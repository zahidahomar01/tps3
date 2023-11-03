<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
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

    //TRY & ERROR
    Route::get('/Project', [ProjectController::class,'index'])->name('Project.index');
    Route::get('/Project/create',[ProjectController::class,'create'])->name('Project.create');
   
    Route::get('/Job', [JobController::class,'index'])->name('Job.index');
    Route::get('/Job/create',[JobController::class,'create'])->name('Job.create');

    // Route::get('/Job/{proj_id}/jobs', 'JobController@index')->name('Job.index');
   // Route::get('/Project/create',[ProjectController::class,'create'])->name('Project.create');

});        
 /*   Route::resource('project', ProjectController::class);
    Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');

    Route::get('/job', [JobController::class,'index'])->name('job.index');
    Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
    Route::post('/job', [JobController::class, 'store'])->name('job.store');
    Route::get('/job/{job}/edit',[JobController::class,'edit'])->name('job.edit');
    Route::put('/job/{job}/update',[JobController::class,'update'])->name('job.update');
    Route::get('/job/{job}', [JobController::class,'show'])->name('job.show');
   */
    // Route::resource('/job', JobController::class);
    //Route::get('job/{job}', 'JobController@show');
 //   Route::get('/job', 'JobController@index')->name('job.index');
 //   Route::get('job/{job_id}', 'JobController@show');

    /* KALAU GUNA LARAVEL TK PERLU BUAT 1 PER 1 BUAT MCM ATAS NI ^
    Route::get('/project',[ProjectController::class,'index'])->name('project.index');
    Route::get('/project/create',[ProjectController::class,'create'])->name('project.create');
    Route::post('/project',[ProjectController::class,'store'])->name('project.store');
    Route::get('/project/{project}/edit',[ProjectController::class,'edit'])->name('project.edit');
    Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
*/

    //    Route::post('/project/{project}/edit',[ProjectController::class,'edit'])->name('project.edit');


  /*  Route::get('/Project2', function () {
        return view('Project2.index');
    })->name('Project2.index');

    Route::get('/Project2', function () {
        return view('Project2.edit');
    })->name('Project2.edit');

    Route::get('/Project2', function () {
        return view('Project2.create');
    })->name('Project2.create');

    Route::get('/pic', function () {
        return view('pics');
    })->name('pics');

   // Route::get('/Project2', [ProjectController::class, 'index'])->name('Project2.index');
    Route::resource('/Project2', ProjectController::class);
    Route::resource('pics','PicController');
    Route::resource('job', 'JobController');
   // Route::get('/Project2', 'ProjectController@index')->name('Project2.index');
   // Route::get('/project2', 'Project2Controller@index')->name('Project2.index');
   // Route::resource('/Project2', 'Project2Controller');
  */





