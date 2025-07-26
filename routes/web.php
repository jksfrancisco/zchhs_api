<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

Route::middleware('web')->group(function () {
    Route::post('/login', function (Request $request) {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            Log::warning('Login failed', [
                'email' => $request->input('email'),
                'ip' => $request->ip(),
                'status' => 'invalid credentials',
            ]);

            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $request->session()->regenerate();

        Log::info('Login successful', [
            'user_id' => Auth::id(),
            'email' => Auth::user()->email,
            'ip' => $request->ip(),
        ]);

        return response()->json(['message' => 'Login successful']);
    });
});

Route::middleware(['web', 'auth:sanctum'])->post('/logout', function (Request $request) {
    Log::info('User logged out', [
        'user_id' => $request->user()?->id ?? 'anonymous',
        'email' => $request->user()?->email ?? 'anonymous',
        'ip' => $request->ip(),
    ]);

    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return response()->json(['message' => 'Logged out']);
});

Route::middleware(['web', 'auth.custom'])->get('/users', function (Request $request) {
    return response()->json($request->user());
});

Route::middleware(['web', 'auth.custom'])->group(function () {
    Route::get('/students', function () {
        $students = require base_path('app/Data/Students.php');
        return response()->json($students);
    });
});
