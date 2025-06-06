<?php

use App\Containers\AppSection\Comment\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('comments/{id}', [Controller::class, 'update'])
    ->middleware(['auth:web']);

