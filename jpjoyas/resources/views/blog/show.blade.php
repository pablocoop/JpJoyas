@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10">
    <a href="{{ url()->previous() }}"
    class="inline-flex items-center mb-6 px-4 py-2 bg-gray-100 text-gray-800 rounded hover:bg-gray-200 transition">
        <x-lucide-arrow-left class="w-5 h-5 mr-2" />
        Volver
    </a>
    <article class="bg-white p-6 rounded-lg shadow">
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
                <div class="mt-6 flex gap-4">
                    <a href="{{ route('blog.edit', $post) }}"
                       class="text-blue-600 hover:underline">Editar</a>

                    <form action="{{ route('blog.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Eliminar esta publicación?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">
                            Eliminar
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </article>
</div>
@endsection
