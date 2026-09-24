<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Painel</title>
    <!-- Tailwind via CDN para estudos -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-900">

    <nav class="bg-white shadow-sm p-4 flex justify-between items-center max-w-7xl mx-auto mt-4 rounded-lg">
        <span class="font-bold text-xl text-indigo-600">Meu Painel</span>
        
        <div class="flex items-center gap-4">
            <span class="text-sm text-gray-600">Olá, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                    Sair
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto mt-8 px-4">
        <div class="bg-white p-6 rounded-lg shadow-sm">
            <h1 class="text-2xl font-semibold mb-2">Bem-vindo ao Painel de Controle!</h1>
            <p class="text-gray-600">Esta é uma área restrita e protegida por autenticação manual.</p>
        </div>
    </main>

</body>
</html>
