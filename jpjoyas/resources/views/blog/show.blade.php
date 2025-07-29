@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-4xl px-6 py-20 bg-gray-300/70 backdrop-blur rounded-lg mt-8">
    <a href="{{ route('home') }}#blog"
    class="inline-flex items-center mb-6 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-200 transition">
        <x-lucide-arrow-left class="w-5 h-5 mr-2" />
        Volver al blog
    </a>
    <article class="bg-gray-300 p-6 rounded-lg shadow">
        {{-- Título --}}
        <h1 class="text-3xl font-bold mb-2">{{ $post->title }}</h1>

        {{-- Autor y fecha --}}
        <p class="text-sm text-gray-500 mb-4">
            por {{ $post->user->name }} · {{ $post->created_at->format('d M Y') }}
        </p>

        {{-- Imagen (si existe) --}}
        @if($post->image_path)
            <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full mb-4 rounded shadow" alt="Imagen del post">
        @endif

        {{-- Video (si existe) --}}
        @if($post->video_path)
            <video controls class="w-full mb-4 rounded shadow">
                <source src="{{ asset('storage/' . $post->video_path) }}" type="video/mp4">
                Tu navegador no soporta video.
            </video>
        @endif

        {{-- Contenido HTML desde Trix --}}
        <div class="prose max-w-none">
            {!! $post->body !!}
        </div>

        {{-- Acciones (solo si el usuario es el autor) --}}
        @auth
            @if(Auth::id() === $post->user_id)
                <div class="absolute top-6 right-6 flex space-x-2 z-10">
                    <x-edit-button :href="route('blog.edit', $post)" />
                    <x-delete-button :action="route('blog.destroy', $post)" />
                </div>
            @endif
        @endauth
    </article>
        <div class="mt-8 text-center">
        <a href="{{ route('home') }}#blog"
        class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-200 transition">
            <x-lucide-arrow-left class="w-5 h-5 mr-2" />
            Volver al blog
        </a>
    </div>

</div>
@endsection
