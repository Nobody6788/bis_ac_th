<?php

use Illuminate\Support\Facades\Route;

Route::get('/php-info', function () {
    phpinfo();
});
