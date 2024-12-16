<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
                <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
                    Bem-vindo ao Teste Tailwind
                </h1>

                <div class="space-y-6">
                    <div class="bg-blue-100 p-4 rounded-md">
                        <h2 class="text-xl font-semibold text-blue-800 mb-2">
                            Card 1
                        </h2>
                        <p class="text-blue-600">
                            Este é um exemplo de card usando Tailwind CSS.
                        </p>
                    </div>

                    <div class="bg-green-100 p-4 rounded-md">
                        <h2 class="text-xl font-semibold text-green-800 mb-2">
                            Card 2
                        </h2>
                        <p class="text-green-600">
                            Outro exemplo de estilização com Tailwind.
                        </p>
                    </div>

                    <button class="w-full bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700 transition-colors">
                        Clique Aqui
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>
