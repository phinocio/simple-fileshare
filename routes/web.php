<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
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

Route::get('/', function () {
    return redirect('/files', 301);
});

Route::get('/files', [FileController::class, 'index']);
Route::post('/files', [FileController::class, 'upload']);
Route::get('/files/{file}', [FileController::class, 'download']);
Route::post('/files/{file}', [FileController::class, 'destroy']);