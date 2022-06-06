<?php

use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/MakeMigrationFile', [DemoController::class, 'MakeMigrationFile']);
Route::get('/RunMigration', [DemoController::class, 'RunMigration']);
Route::get('/AppCacheClear', [DemoController::class, 'AppCacheClear']);
Route::get('/EnvConfig', [DemoController::class, 'EnvConfig']);
