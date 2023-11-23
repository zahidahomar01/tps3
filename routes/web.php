<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\AdminPicController;
use App\Http\Controllers\AdminJobController;

use App\Http\Controllers\UserProjectController;
use App\Http\Controllers\UserPicController;
use App\Http\Controllers\UserJobController;
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

    //Normal User 
    Route::resource('User/Project', UserProjectController::class)->middleware('auth');
    Route::resource('User/Pic', UserPicController::class)->middleware('auth');
    Route::resource('User/Job', UserJobController::class)->middleware('auth');
   
    Route::get('User/Project', [UserProjectController::class, 'index'])->name('User.Project.index');

    Route::get('User/Pic', [UserPicController::class, 'index'])->name('User.Pic.index');
    Route::get('User/Pic/create', [UserPicController::class, 'create'])->name('User.Pic.create');
    Route::get('User/Pic/{pic}', [UserPicController::class, 'show'])->name('User.Pic.show');
    Route::get('User/Pic/{pic}/edit', [UserPicController::class, 'edit'])->name('User.Pic.edit');
    Route::delete('User/Pic/{pic}', [UserPicController::class, 'destroy'])->name('User.Pic.destroy');
    Route::put('User/Pic/{pic}',[UserPicController::class, 'update'])->name('User.Pic.update');
    Route::post('User/Pic', [UserPicController::class,'store'])->name('User.Pic.store');

    Route::get('User/Project/{project}/Job', [UserJobController::class, 'index'])->name('User.Job.index');
    
    //Admin
    Route::middleware(['auth', 'admin'])->group(function () 
    
        {
            Route::resource('Admin/Project', AdminProjectController::class)->middleware('admin');
            Route::resource('Admin/Pic', AdminPicController::class)->middleware('admin');
            Route::resource('Admin/Job', AdminJobController::class)->middleware('admin');
        
            Route::get('Admin/Project', [AdminProjectController::class, 'index'])->name('Admin.Project.index');
            Route::get('Admin/Project/create', [AdminProjectController::class, 'create'])->name('Admin.Project.create');
            Route::get('Admin/Project/{project}/Project', [AdminJobController::class, 'show'])->name('Admin.Project.show');
            Route::get('Admin/Project/{job}/edit', [AdminProjectController::class, 'edit'])->name('Admin.Project.edit');
            Route::put('Admin/Project/{project}',[AdminProjectController::class, 'update'])->name('Admin.Project.update');
            Route::post('Admin/Project', [AdminProjectController::class,'store'])->name('Admin.Project.store');
            Route::delete('Admin/Project/{project}', [AdminProjectController::class, 'destroy'])->name('Admin.Project.destroy');
        
            Route::get('Admin/Project/{project}/Job', [AdminJobController::class, 'index'])->name('Admin.Job.index');
            Route::get('Admin/Job/create', [AdminJobController::class, 'create'])->name('Admin.Job.create');
            Route::get('Admin/Project/{job}/Job', [AdminJobController::class, 'show'])->name('Admin.Job.show');
            Route::get('Admin/Job/{job}/edit', [AdminJobController::class, 'edit'])->name('Admin.Job.edit');
            Route::delete('Admin/Job/{job_id}', [AdminJobController::class, 'destroy'])->name('Admin.Job.destroy');
            Route::put('Admin/Job/{job}',[AdminJobController::class, 'update'])->name('Admin.Job.update');
            Route::get('/search/', [AdminJobController::class, 'search'])->name('search');
            Route::post('Admin/Job', [AdminJobController::class,'store'])->name('Admin.Job.store');
            

            Route::get('Admin/Pic', [AdminPicController::class, 'index'])->name('Admin.Pic.index');
            Route::get('Admin/Pic/create', [AdminPicController::class, 'create'])->name('Admin.Pic.create');
            Route::get('Admin/Pic/{pic}', [AdminPicController::class, 'show'])->name('Admin.Pic.show');
            Route::get('Admin/Pic/{pic}/edit', [AdminPicController::class, 'edit'])->name('Admin.Pic.edit');
            Route::delete('Admin/Pic/{pic}', [AdminPicController::class, 'destroy'])->name('Admin.Pic.destroy');
            Route::put('Admin/Pic/{pic}',[AdminPicController::class, 'update'])->name('Admin.Pic.update');
            Route::post('Admin/Pic', [AdminPicController::class,'store'])->name('Admin.Pic.store');
        }
    );
//Admin
        

        // Route::get('Admin', ['middleware' =>'admin', function()
        // {
        // }
    // ]);


/*

ORIGINAL

    Route ::resource('Project', ProjectController::class);
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

    */

});