<?php

use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    require base_path('app/Http/Routes/v1/api.php');
});
