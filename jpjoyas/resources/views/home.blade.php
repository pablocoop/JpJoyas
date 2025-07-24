@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-20 bg-gray-300/70 backdrop-blur rounded-lg mt-8">
  {{-- Contenedor principal --}}  
    
  {{-- Presentación --}}
  <section id="titulo" class="mb-16 text-center">
    <h1 class="font-dragonwick text-7xl text-gray-700 mb-4 tracking-tight">JP Joyas</h1>
    {{-- <p class="text-lg text-gray-600 max-w-2xl mx-auto">Joyería online de Villarrica, creada por Juan Pablo Osorio Valenzuela con un objetivo claro: ofrecer joyas de plata de primera calidad, elaboradas con prolijidad y precisión, y diseñadas para ser accesibles sin comprometer la excelencia. Al eliminar los intermediarios, te ofrecemos joyas sin sobreprecios ni comisiones por reventa, directamente del fabricante a tus manos. Descubre la auténtica calidad de la plata, sin costos innecesarios.</p> --}}
  </section>
  <section id="descripcion" class="mb-16 bg-gray-300 rounded-lg shadow p-6">
    <h2 class="text-3xl font-semibold text-gray-800 mb-4">JPJoyas</h2>
    <p class="text-gray-600 leading-relaxed">
    Joyería online de Villarrica, creada por Juan Pablo Osorio Valenzuela con un objetivo claro: ofrecer joyas de plata de primera calidad, elaboradas con prolijidad y precisión, y diseñadas para ser accesibles sin comprometer la excelencia. Al eliminar los intermediarios, te ofrecemos joyas sin sobreprecios ni comisiones por reventa, directamente del fabricante a tus manos. Descubre la auténtica calidad de la plata, sin costos innecesarios.
    </p>
  </section>
  {{-- Historia --}}
  <section id="historia" class="mb-16 bg-gray-300 rounded-lg shadow p-6">
    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Nuestra Historia</h2>
    <p class="text-gray-600 leading-relaxed">Mi historia con la joyería comenzó en 2017, cuando empecé a vender joyas de plata importadas desde fábricas de Italia y Tailandia. Sin embargo, pronto descubrí que mis habilidades manuales y formación profesional me permitían crear algo más auténtico: joyas diseñadas y fabricadas por mí mismo.

Con el tiempo, he descubierto la verdadera ventaja de trabajar con plata pura, libre de aleaciones que pueden alterar su calidad y brillo. Esto me permite crear joyas que no solo son hermosas, sino que también mantienen su pureza y valor. Mis diseños reflejan la esencia de la idiosincrasia chilena y son elaborados con dedicación y atención al detalle, lo que me permite ofrecer piezas de alta calidad a precios justos.

Hoy en día, me enorgullece ofrecer joyas que no solo son hermosas, sino que también llevan un pedacito de mi historia y dedicación.</p>
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
