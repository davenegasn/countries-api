<?php

use App\Http\Controllers\Api\CountriesController;
use Illuminate\Support\Facades\Route;

Route::get('/countries', CountriesController::class)->middleware('auth');

