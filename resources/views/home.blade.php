<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Option 1: Use Vite to load the CSS (recommended) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Option 2: If you don't want to use Vite, uncomment this line to use compiled CSS -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <header>
        <div class="navbar bg-accent-content  p-8 text-4xl flex">
            <image src="{{ asset('images/logo/pentagon-48.png') }}" alt="Logo" class="w-16 h-16 rounded-full">
            <p class="text-center text-2xl text-red-500">amahoela</p>

        </div>
    </header>
</body>
</html>