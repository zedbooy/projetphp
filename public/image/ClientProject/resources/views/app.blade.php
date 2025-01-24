<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EMSI Hub')</title>
    <style>
        /* Incluez ici vos styles ou utilisez @vite pour compiler votre CSS */
        @yield('styles')
    </style>
</head>
<body>
    <!-- Top Bar -->
    @include('partials.top-bar')

    <!-- Header -->
    @include('partials.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>
