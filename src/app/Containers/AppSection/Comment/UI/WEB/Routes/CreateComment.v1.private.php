<?php

use App\Containers\AppSection\Comment\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('comments/create', [Controller::class, 'create'])
    ->middleware(['auth:web']);

