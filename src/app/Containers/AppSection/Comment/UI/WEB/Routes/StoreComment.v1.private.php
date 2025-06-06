<?php

use App\Containers\AppSection\Comment\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('comments/store', [Controller::class, 'store'])
    ->middleware(['auth:web']);

