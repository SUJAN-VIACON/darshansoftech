<?php

use App\Http\Controllers\TaskController;
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


Route::prefix('task_1')->as('task1.')->group(function () {
    Route::get("/subtask_1", [TaskController::class, "crudWithPostIndex"])->name("subtask_1");
    Route::get("/subtask_2", [TaskController::class, "crudWithAjaxIndex"])->name("subtask_2");
    Route::get("/subtask_3", [TaskController::class, "fileUploadIndex"])->name("subtask_3");
});

Route::get("/task_2", [TaskController::class, "phoneCallIndex"])->name("task_2");
