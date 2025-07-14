@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold mb-6">Editar Post</h1>

    <form method="POST" action="{{ route('blog.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Título --}}
        <div class="mb-4">
            <label class="block font-medium mb-1">Título</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        {{-- Contenido (Trix) --}}
        <div class="mb-4">
            <label class="block font-medium mb-1">Contenido</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body" class="trix-content bg-white border rounded px-3 py-2"></trix-editor>
        </div>

        {{-- Imagen (opcional) --}}
        <div class="mb-4">
            <label class="block font-medium mb-1">Imagen destacada (opcional)</label>
            @if($post->image_path)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->image_path) }}" class="w-48 rounded shadow">
                </div>
            @endif
            <input type="file" name="image" class="w-full border px-3 py-2 rounded">
        </div>

        {{-- Video (opcional) --}}
        <div class="mb-6">
            <label class="block font-medium mb-1">Video (opcional)</label>
            @if($post->video_path)
                <div class="mb-2">
                    <video controls class="w-full rounded shadow">
                        <source src="{{ asset('storage/' . $post->video_path) }}" type="video/mp4">
                        Tu navegador no soporta video.
                    </video>
                </div>
            @endif
            <input type="file" name="video" class="w-full border px-3 py-2 rounded">
        </div>

        {{-- Botones --}}
        <div class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-gray-600 hover:underline">Cancelar</a>
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Actualizar Post
            </button>
        </div>
    </form>
</div>
@endsection
