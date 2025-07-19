<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

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

    <body class="font-sans antialiased bg-fixed bg-no-repeat bg-top bg-black" style="background-image: url('/images/fondo-jpjoyas.jpg'); background-size: contain;">
        <div class="flex flex-col min-h-screen bg-black/30">
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

            <footer class="bg-black mt-16 border-t border-gray-900">
                <div class="max-w-4xl mx-auto px-6 py-8 text-center text-sm text-gray-600">
                    <p class="mb-4 font-semibold">Encuéntranos en nuestras redes sociales</p>
                    <div class="flex justify-center space-x-6 text-blue-700">
                        <a href="https://www.facebook.com/JuanPabloOsorioJP/" target="_blank" class="hover:underline">
                            Facebook
                        </a>
                        <a href="https://www.instagram.com/invites/contact/?i=1egfgisxytf3a&utm_content=5h9sk0o" target="_blank" class="hover:underline">
                            Instagram
                        </a>
                        <a href="https://wa.me/message/RCSEZTH4EZGMA1" target="_blank" class="hover:underline">
                            WhatsApp
                        </a>
                    </div>
                    <p class="mt-4 text-gray-400">&copy; {{ date('Y') }} JP Joyas · Villarrica</p>
                </div>
            </footer>

        </div>

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
