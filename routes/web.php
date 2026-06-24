<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
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

Route::get('/debug-user/{id}', function ($id) {

    try {

        throw new Exception(
            "SQL error near users table. DB password: secret123"
        );

    } catch (Exception $e) {

        Log::error($e);

        return response()->json([
            'error' => 'Internal server error',
            'reference' => 'ERR-001'
        ], 500);

    }
});