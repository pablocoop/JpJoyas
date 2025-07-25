@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-20 bg-gray-300/70 backdrop-blur rounded-lg mt-8">
  {{-- Contenedor principal --}}  
  {{-- Presentación --}}
  <section id="titulo" class="mb-16 text-center">
    <h1 class="font-dragonwick text-[2.75rem] sm:text-5xl md:text-6xl lg:text-7xl  text-gray-800 mb-4 tracking-tight text-center">
      JP Joyas
    </h1>
    <div class="border border-gray-500 rounded-lg px-6 py-4 inline-block mt-4">
      <p class=" text-lg text-gray-700 mb-4">
        Accede al catálogo de mis redes sociales
      </p>

      <div class="flex justify-center space-x-6">
        <a href="https://wa.me/message/RCSEZTH4EZGMA1" target="_blank" class="text-green-600 hover:text-green-800 text-3xl" aria-label="WhatsApp">
          <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://www.instagram.com/jp.joyas/" target="_blank" class="text-pink-500 hover:text-pink-700 text-3xl" aria-label="Instagram">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.facebook.com/JuanPabloOsorioJP/" target="_blank" class="text-blue-600 hover:text-blue-800 text-3xl" aria-label="Facebook">
          <i class="fab fa-facebook"></i>
        </a>
      </div>
    </div>
    
  </section>
  {{-- Imágenes --}}
  <div class="flex justify-center mb-12">
    {{-- Imagen para celulares --}}
    <img src="{{ asset('images/home-mobile.jpg') }}" class="block md:hidden h-auto w-auto rounded-xl shadow-lg">

    {{-- Imagen para pantallas medianas en adelante --}}
    <img src="{{ asset('images/home.jpg') }}" class="hidden md:block h-auto w-auto rounded-xl shadow-lg">
  </div>
  {{-- Descripción --}}
  <section id="presentacion" class="relative mb-16 bg-gray-300 rounded-lg shadow p-6">
    <h2 class="font-dragonwick text-3xl font-semibold text-gray-800 mb-4">JP Joyas</h2>
    {{-- Botón de edición solo visible si es admin --}}
    @auth
      @if(Auth::user()->is_admin)
        <div class="absolute top-4 right-4">
          <x-edit-button :href="route('info.edit', 'descripcion')" />
        </div>
      @endif
    @endauth

    <p class="text-gray-600 leading-relaxed text-xl">
      {!! $descripcion ?? 'Aquí va la descripción de JP Joyas.' !!}
    </p>
  </section>
  {{-- Historia --}}
  <section id="historia" class="relative mb-16 bg-gray-300 rounded-lg shadow p-6">
    <h2 class="font-dragonwick text-3xl font-semibold text-gray-800 mb-4">Quién Soy</h2>
    {{-- Botón de edición solo visible si es admin --}}
    @auth
      @if(Auth::user()->is_admin)
        <div class="absolute top-4 right-4">
          <x-edit-button :href="route('info.edit', 'historia')" />
        </div>
      @endif
    @endauth
    <p class="text-gray-600 leading-relaxed text-xl">
      {!! $historia ?? 'Aquí va la historia.' !!}
    </p>

    </section>

  {{-- Blog --}}
  <section>
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-3xl font-semibold">Blog</h2>
      @auth
        <a href="{{ route('blog.create') }}"
          class="inline-block bg-blue-100 text-blue-800 font-semibold px-4 py-2 rounded-lg border border-blue-300 hover:bg-blue-200 transition">
          + Nueva publicación
        </a>
      @endauth
    </div>

    @if($posts->isEmpty())
      <p class="text-gray-800">No hay publicaciones aún.</p>
    @else
      <div class="space-y-8">
        @foreach($posts as $post)
        <article class="relative bg-gray-300 p-6 rounded-lg shadow hover:shadow-md transition">
          {{-- Botones flotantes --}}
          @auth
            @if(Auth::id() === $post->user_id)
              <div class="absolute top-2 -right-12 flex flex-col space-y-2 z-10">
                <x-delete-button :action="route('blog.destroy', $post)" />
                <x-edit-button :href="route('blog.edit', $post)" />
              </div>
            @endif
          @endauth

          <div class="flex flex-col md:flex-row md:items-start gap-6">
            
            {{-- Columna de texto --}}
            <div class="flex-1 min-w-0">
              <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $post->title }}</h3>
              <p class="text-sm text-gray-500 mb-3">
                  por {{ $post->user->name }} · {{ $post->created_at->format('d M Y') }}
              </p>

              <div class="prose max-w-none text-gray-700 break-words mb-4">
                  {!! $post->preview_text !!}
              </div>

              {{-- Botón Ver más con texto --}}
              <x-view-button :href="route('blog.show', $post)" />
            </div>

            {{-- Imagen (si existe) --}}
            @if($post->preview_image)
              <div class="w-full md:w-1/3 flex-shrink-0 flex justify-center items-start">
                <div class="max-w-[200px] w-full">
                  {!! $post->preview_image !!}
                </div>
              </div>
            @endif

          </div>
        </article>

        @endforeach


      </div>
    @endif
  </section>
</div>
@endsection
