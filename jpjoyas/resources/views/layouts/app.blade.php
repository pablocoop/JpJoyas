<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <x-rich-text::styles theme="richtextlaravel" data-turbo-track="false" />
        <!-- Trix Editor -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.umd.min.js"></script>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content') 
            </main>
        </div>

        // Include Trix Editor scripts
        <script>
            document.addEventListener("trix-attachment-add", function (event) {
                const attachment = event.attachment;
                if (attachment.file) {
                uploadTrixImage(attachment);
                }
            });

            function uploadTrixImage(attachment) {
                // FormData para enviar la imagen
                const file = attachment.file;
                const form = new FormData();
                form.append("attachment", file);

                // Enviar POST a endpoint Laravel
                fetch("/trix-upload", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: form,
                })
                .then(response => response.json())
                .then(result => {
                // Una vez subida, le pasamos la URL real a Trix
                attachment.setAttributes({
                    url: result.url,
                    href: result.url
                });
                })
                .catch(error => {
                console.error("Error al subir imagen a Trix:", error);
                });
            }
        </script>


    </body>
</html>
