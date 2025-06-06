<?php

use App\Containers\AppSection\Comment\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('comments/{id}/edit', [Controller::class, 'edit'])
    ->middleware(['auth:web']);

