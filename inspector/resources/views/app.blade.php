<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="icon" href="/icon.png">

        <!-- Scripts -->
        @routes

        @production
            @php
                $manifest = json_decode(file_get_contents(
                    public_path('build/manifest.json'),
                    true
                ));
            @endphp
            {{-- <script type="module" src="<?php echo("/build/{$manifest['resources/js/app.js']['file']}"); ?>"></script>
            <link rel="stylesheet" href="<?php echo("/build/{$manifest['resources/js/app.js']['css'][0]}"); ?>" /> --}}
            
            {{-- TODO: A refaire au propre!! --}}
            <script type="module" src="/build/assets/app-549b947a.js"></script>
            <link rel="stylesheet" href="/build/assets/app-e3795e91.css">
        @else
            @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @endproduction
        
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
