<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    try {
        $connection = DB::connection()->getPdo();
        $version = DB::select('SELECT VERSION() as version')[0]->version;
        return response()->json([
            'status' => 'success',
            'message' => 'Database connection successful',
            'database_version' => $version,
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version()
        ]);
    } catch (Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Database connection failed: ' . $e->getMessage()
        ], 500);
    }
});
