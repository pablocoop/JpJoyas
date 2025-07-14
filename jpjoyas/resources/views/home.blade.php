@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6">
  {{-- Presentación --}}
  <section class="mb-12">
    <h1 class="text-4xl font-bold mb-4">JP Joyas</h1>
    <p>Bienvenidos a nuestro catálogo online de joyería artesanal</p>
  </section>

  {{-- Historia --}}
  <section class="mb-12">
    <h2 class="text-3xl font-semibold mb-4">Nuestra Historia</h2>
    <p>Historia de JP Joyas</p>
  </section>

  {{-- Blog --}}
  <section>
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-3xl font-semibold">Blog</h2>
      @auth
        <a href="{{ route('blog.create') }}" class="text-blue-600 hover:underline">Nuevo Post</a>
      @endauth
    </div>

    @if($posts->isEmpty())
      <p class="text-gray-600">No hay publicaciones aún.</p>
    @else
      <div class="space-y-8">
        @foreach($posts as $post)
          <article class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-2xl font-bold">{{ $post->title }}</h3>
            <p class="text-sm text-gray-500 mb-2">por {{ $post->user->name }} · {{ $post->created_at->format('d M Y') }}</p>
            @if($post->image_path)
              <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full mb-4 rounded" alt="Imagen del post">
            @endif
            @if($post->video_path)
              <video controls class="w-full mb-4 rounded">
                <source src="{{ asset('storage/' . $post->video_path) }}" type="video/mp4">
                Tu navegador no soporta video.
              </video>
            @endif
            <div class="prose max-w-none">
                {!! Str::limit($post->body, 300) !!}
            </div>
          </article>
        @endforeach
      </div>
    @endif
  </section>
</div>
@endsection
