<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [HomeController::class, 'create'])->name('create');
    Route::post('/dashboard/store', [HomeController::class, 'store'])->name('store');
    Route::get('/dashboard/Alluser', [HomeController::class, 'Alluser'])->name('Alluser');
    Route::get('/dashboard/delete_user/{id}', [HomeController::class, 'delete_user'])->name('delete_user');
    Route::get('/dashboard/edit_user/{id}', [HomeController::class, 'edit_user'])->name('edit_user');

});
Route::middleware('auth')->group(function () {
route::get('index',[TasksController::class,'index' ])->name('task.index');
route::get('task/create',[TasksController::class,'create' ])->name('task.create');
route::post('task/store',[TasksController::class,'store' ])->name('task.store');
route::get('task/edit{id}',[TasksController::class,'edit' ])->name('task.edit');
route::post('task/update{id}',[TasksController::class,'update' ])->name('task.update');
route::get('task/delete{id}',[TasksController::class,'destory' ])->name('task.delete');



});
