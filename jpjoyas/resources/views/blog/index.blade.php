@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-20 bg-gray-300/70 backdrop-blur rounded-lg mt-8">

    {{-- Botón superior --}}
    <div class="mb-6 text-left">
        <a href="{{ route('home') }}{{ request('from') ? '#' . request('from') : '#blog' }}"
           class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-200 transition">
            <x-lucide-arrow-left class="w-5 h-5 mr-2" />
            {{ request('from') ? 'Volver a ' . ucfirst(request('from')) : 'Volver al blog' }}
        </a>
    </div>

    <h1 class="text-4xl text-gray-800 mb-10 text-center">Publicaciones del Blog</h1>

    @if($posts->isEmpty())
        <article class="relative bg-gray-300 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
            <p class="text-gray-600 text-center">No hay publicaciones aún.</p>
        </article>
    @else
        <div class="space-y-16">
            @foreach($posts as $post)
                <article class="relative bg-gray-300 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    {{-- Botones flotantes --}}
                    @auth
                        @if(Auth::id() === $post->user_id)
                            <div class="absolute top-6 right-6 flex space-x-2 z-10">
                                <x-edit-button :href="route('blog.edit', $post)" />
                                <x-delete-button :action="route('blog.destroy', $post)" />
                            </div>
                        @endif
                    @endauth

                    <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-500 mb-4">
                        por {{ $post->user->name }} · {{ $post->created_at->format('d M Y') }}
                    </p>

                    @if($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}" class="max-h-80 w-full object-cover mb-6 rounded-md shadow">
                    @endif

                    <div class="prose prose-lg max-w-none text-gray-800">
                        {!! Str::limit($post->body, 1200, '...') !!}
                    </div>

                    <div class="mt-6 text-right">
                        <a href="{{ route('blog.show', $post) }}"
                           class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 font-medium rounded hover:bg-blue-200 transition">
                            <x-lucide-eye class="w-5 h-5 mr-2" /> Leer más
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    @endif

    {{-- Botón inferior --}}
    <div class="mt-12 text-center">
        <a href="{{ route('home') }}{{ request('from') ? '#' . request('from') : '#blog' }}"
           class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-200 transition">
            <x-lucide-arrow-left class="w-5 h-5 mr-2" />
            {{ request('from') ? 'Volver a ' . ucfirst(request('from')) : 'Volver al blog' }}
        </a>
    </div>

</div>
@endsection
