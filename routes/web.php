<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Painel\AuthController;

// Rotas de Visitantes (GUEST)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'attempt']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Esqueci a Senha (Solicitação)
    Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

    // Redefinir a Senha (Formulário vindo do link do e-mail)
    // O Laravel exige exatamente o nome 'password.reset' para essa rota funcionar no e-mail
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
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