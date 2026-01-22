<?php

declare(strict_types=1);

use App\Controllers\HomeController;
use App\Controllers\SampleController;
use Slim\App;

return function (App $app) {
    $app->get('/', [HomeController::class, 'index']);
    $app->get('/sample', [SampleController::class, 'index']);
};
