<?php

use Illuminate\Support\Facades\Route;
use App\Services\AuthDecisionService;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin-test/{token?}', function ($token = null) {

    $auth = new AuthDecisionService();

    return $auth->canAccessAdminPanel($token)
        ? 'ACCESS GRANTED'
        : 'ACCESS DENIED';
});