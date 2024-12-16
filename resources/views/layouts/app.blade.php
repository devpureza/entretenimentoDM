<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EntreDM - Notícias de Entretenimento')</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Primeira Sessão do Menu -->
    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logoDM.svg') }}" alt="EntreDM" class="h-7">
            </div>

            <!-- Botões -->
            <div class="flex space-x-4">
                <button class="bg-gray-200 text-gray-800 hover:bg-gray-300 px-4 py-2 rounded-lg">
                    Compartilhar
                </button>
                <button class="bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-lg">
                    Entrar
                </button>
            </div>
        </div>
    </header>

    <!-- Segunda Sessão do Menu (Categorias) -->
    <nav class="bg-blue-800 text-white py-2">
        <div class="container mx-auto flex justify-center space-x-6">
            <a href="#cinema" class="hover:underline">Cinema</a>
            <a href="#music" class="hover:underline">Música</a>
            <a href="#games" class="hover:underline">Games</a>
            <a href="#series" class="hover:underline">Séries</a>
            <a href="#tecnologia" class="hover:underline">Tecnologia</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>© {{ date('Y') }} EntreDM. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>
