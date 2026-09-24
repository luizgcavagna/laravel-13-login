<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Painel</title>
    <!-- Tailwind via CDN para estudos -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen py-10">

    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Criar Conta no Painel</h2>

        <!-- Exibição de erros de validação -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Nome Completo</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2 border">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2 border">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Senha (mínimo 8 caracteres)</label>
                <input type="password" name="password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2 border">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Confirme a Senha</label>
                <!-- O Laravel exige o nome exatamente como password_confirmation devido à regra 'confirmed' -->
                <input type="password" name="password_confirmation" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2 border">
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded-md hover:bg-indigo-700 font-semibold transition mt-2">
                Cadastrar e Entrar
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
            Já tem uma conta? <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Faça login</a>
        </p>
    </div>

</body>
</html>
