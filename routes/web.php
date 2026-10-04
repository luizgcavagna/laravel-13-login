<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Painel\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'attempt']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Esqueci a Senha (Solicitação)
    Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

    // Redefinir a Senha
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
});

// ==========================================
// Rotas Protegidas do ADMINISTRADOR
// ==========================================
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.') // Já adiciona "admin." no começo de todas as rotas internas
    ->group(function () {
    
        // URL: /admin/dashboard | Nome da rota: admin.dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard'); // CORRIGIDO: Removido o "admin." duplicado

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ==========================================
// Rotas Protegidas do USUÁRIO COMUM
// ==========================================
Route::middleware(['auth'])
    ->prefix('user')
    ->name('user.') // Já adiciona "user." no começo de todas as rotas internas
    ->group(function () {
        
        // URL: /user/dashboard | Nome da rota: user.dashboard
        // DICA: Se preferir que a URL seja apenas "/dashboard", mude o primeiro parâmetro para '/'
        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('dashboard');

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});