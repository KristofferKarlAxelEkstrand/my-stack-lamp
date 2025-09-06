<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LAMP Stack</title>
    {!! Vite::useCspNonce() !!}
    @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-hej-600 min-h-screen flex items-center justify-center p-0 m-0">
    <div class="text-center">
        <h1 class="text-5xl font-bold text-gray-900 mb-4">LAMP Stack</h1>
        <p class="text-xl text-gray-700 mb-8">Laravel • Apache • MariaDB • PHP</p>

        <div class="space-x-4">
            <a href="/test" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                Test Database
            </a>
            <a href="https://laravel.com/docs" target="_blank"
                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">
                Documentation
            </a>
        </div>
    </div>
</body>

</html>