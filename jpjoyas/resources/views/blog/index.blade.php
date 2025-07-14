@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-10">
    <h1 class="text-4xl font-bold mb-6">Publicaciones del Blog</h1>

    @if($posts->isEmpty())
        <p class="text-gray-600">No hay publicaciones aún.</p>
    @else
        <div class="space-y-12">
            @foreach($posts as $post)
                <article class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-2xl font-bold mb-2">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-500 mb-4">
                        por {{ $post->user->name }} · {{ $post->created_at->format('d M Y') }}
                    </p>

                    @if($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full mb-4 rounded">
                    @endif

                    <div class="prose max-w-none">
                        {!! Str::limit($post->body, 600) !!}
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('blog.show', $post) }}" class="text-indigo-600 hover:underline">Leer más →</a>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
</div>
@endsection
