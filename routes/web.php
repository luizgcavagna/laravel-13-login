<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Painel\AuthController;

// Rotas de Visitantes (GUEST)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'attempt']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Rotas Protegidas (AUTH)
Route::middleware('auth')->prefix('painel')->group(function () {
    
    // Rota do Dashboard
    Route::get('/dashboard', function () {
        return view('painel.dashboard');
    })->name('painel.dashboard');

    // Rota de Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});