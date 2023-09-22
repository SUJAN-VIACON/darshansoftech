<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CrudWithAjaxController;
use App\Http\Controllers\CrudWithPostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect(route("task1.crudWithPost.create"));
});

Route::prefix('task_1')->as('task1.')->group(function () {
    Route::prefix('crud_with_post')->as('crudWithPost.')->group(function () {
        Route::get("/create", [CrudWithPostController::class, "create"])->name("create");
        Route::get("/edit/{user}", [CrudWithPostController::class, "edit"])->name("edit");
    });

    Route::prefix('crud_with_ajax')->as('crudWithAjax.')->group(function () {
        Route::get("/create", [CrudWithAjaxController::class, "create"])->name("create");
        Route::get("/edit/{user}", [CrudWithAjaxController::class, "edit"])->name("edit");
    });
});

// task 1 both operations taking user resource to perform the crud
Route::resource('users', UserController::class)->only('index', 'store', 'update', 'destroy');

// using react installed by laravel breeze inside the resources/js/ directory
Route::get("/task_2", [TaskController::class, "phoneCallIndex"])->name("task2");
