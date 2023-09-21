<?php

use App\Http\Controllers\BlogController;
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
    return redirect(route("task_1.subtask_1"));
});


Route::prefix('task_1')->as('task_1.')->group(function () {
    Route::get("/subtask_1", [TaskController::class, "crudWithPostIndex"])->name("subtask_1");
    Route::get("/subtask_2", [TaskController::class, "crudWithAjaxIndex"])->name("subtask_2");
    Route::get("/subtask_3", [TaskController::class, "fileUploadIndex"])->name("subtask_3");
});
Route::get("/task_2", [TaskController::class, "phoneCallIndex"])->name("task_2");


Route::post("/users", [UserController::class, 'store'])->name('users.store');
Route::post("/blogs", [BlogController::class, 'store'])->name('blogs.store');
