<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedBackController;


Route::apiResource('/api/createFeedBack', FeedBackController::class);
