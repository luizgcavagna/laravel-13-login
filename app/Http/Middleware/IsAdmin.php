<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        // 1. Se não estiver logado, o 'auth' nativo já manda para o login. 
        // Mas por garantia, se falhar, redireciona.
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // 2. Se for admin, permite que continue para a rota solicitada
        if (auth()->user()->role === 'admin') {
            return $next($request);
        }

        // 3. Se NÃO for admin (ex: 'user' ou 'client'), redireciona para o painel dele
        return redirect()->route('user.dashboard')
            ->with('error', 'Você não tem permissão de administrador.');
    }
}
