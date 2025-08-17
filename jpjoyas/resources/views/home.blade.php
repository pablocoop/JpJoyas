@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-8 bg-gray-300/70 backdrop-blur rounded-lg mt-8">
  {{-- Contenedor principal --}}  
  {{-- Presentación --}}
  <section id="titulo" class="mb-4 text-center">
    <h1 class="font-dragonwick text-[2.75rem] sm:text-5xl md:text-6xl lg:text-7xl  text-gray-800 mb-2 tracking-tight text-center">
      JP Joyas
    </h1>
    <p class="text-lg text-gray-700 font-dragonwick">
      Joyeria&nbsp;  online&nbsp; de Villarrica.
    </p>
    <div class="border border-gray-500 rounded-lg px-6 py-4 inline-block mt-4">
      <p class=" text-lg text-gray-700 mb-4">
        Accede al catálogo de mis redes sociales
      </p>

      <div class="flex justify-center space-x-6">
        <a href="https://wa.me/message/RCSEZTH4EZGMA1" target="_blank" class="text-black hover:text-gray-700 text-3xl" aria-label="WhatsApp">
          <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://www.instagram.com/jp.joyas/" target="_blank" class="text-black hover:text-gray-700 text-3xl" aria-label="Instagram">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.facebook.com/JuanPabloOsorioJP/" target="_blank" class="text-black hover:text-gray-700 text-3xl" aria-label="Facebook">
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
  {{-- Servicios --}}
  <h2 class="px-6 text-center md:text-left font-dragonwick text-3xl font-semibold text-gray-800 mb-4">Servicios</h2>
  <section id="servicios" class="grid gap-8 md:grid-cols-2 bg-gray-300 rounded-lg shadow p-6 mb-16">
    
    {{-- Servicio: Joyas Personalizadas --}}
    <div class="border border-gray-500 rounded-lg p-4 shadow hover:shadow-md transition">
      <h3 class="text-xl font-bold text-gray-800 mb-2">Joyas personalizadas</h3>
      <p class="text-gray-600">
        Diseña la joya perfecta para esa persona especial. Pulsera, colgante, anillo o aros personalizados con nombre, color o gema que la represente. ¡Crea un diseño único y haz que brille!
      </p>
    </div>

    {{-- Servicio: Atención a Domicilio --}}
    <div class="border border-gray-500 rounded-lg p-4 shadow hover:shadow-md transition">
      <h3 class="text-xl font-bold text-gray-800 mb-2">Atención a domicilio</h3>
      <p class="text-gray-600">
        En Villarrica tienes la ventaja de poder recibir una atención personalizada a domicilio quedando a tu elección si es desde mi auto o dentro de tu casa, donde más te acomode. En el radio urbano y sectores rurales cercanos.
      </p>
    </div>

    {{-- Servicio: Reparaciones --}}
    <div class="border border-gray-500 rounded-lg p-4 shadow hover:shadow-md transition">
      <h3 class="text-xl font-bold text-gray-800 mb-2">Reparaciones</h3>
      <p class="text-gray-600">
        ¿Tienes una joya de plata que ya no usas por un defecto o se dañó? No la deseches. ¡Comunícate conmigo y la reparo! Arreglo de soldaduras y restauración de joyas al precio más conveniente.
      </p>
    </div>

    {{-- Servicio: Entrega de Regalos Sorpresa --}}
    <div class="border border-gray-500 rounded-lg p-4 shadow hover:shadow-md transition">
      <h3 class="text-xl font-bold text-gray-800 mb-2">Entrega de regalos sorpresa</h3>
      <p class="text-gray-600">
        ¿Quieres sorprender a alguien especial desde lejos? Elige tu joya favorita y yo me encargo de entregarla directamente a esa persona especial. Puedes incluir una caja joyero personalizada para hacer el regalo aún más especial. Cumpleaños, aniversarios o cualquier ocasión es perfecta.
      </p>
    </div>

  </section>


  {{-- Descripción --}}
  <h2 class="px-6 text-center md:text-left font-dragonwick text-3xl font-semibold text-gray-800 mb-4">Presentacion</h2>
  <section id="presentacion" class="relative mb-16 bg-gray-300 rounded-lg shadow p-6">
    
    {{-- Botón de edición solo visible si es admin --}}
    <div class="border border-gray-500 rounded-lg p-4 shadow hover:shadow-md transition">
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
    </div>
  </section>
  {{-- Historia --}}
  <h2 class="px-6 text-center md:text-left font-dragonwick text-3xl font-semibold text-gray-800 mb-4">Quien Soy</h2>
  <section id="historia" class="relative mb-16 bg-gray-300 rounded-lg shadow p-6">
    
    {{-- Botón de edición solo visible si es admin --}}
    <div class="border border-gray-500 rounded-lg p-4 shadow hover:shadow-md transition">
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
    </div>

    </section>

  {{-- Datos --}}
  <section id="blog">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
      {{-- Título: centrado en móvil, a la izquierda en PC --}}
      <h2 class="px-6 text-center md:text-left font-dragonwick text-3xl font-semibold text-gray-800 mb-4 md:mb-0">
        Datos
      </h2>
      {{-- Botón: alineado a la derecha en PC, debajo en móvil --}}
      @auth
        <a href="{{ route('blog.create') }}"
          class="inline-block bg-blue-100 text-blue-800 font-semibold px-4 py-2 rounded-lg border border-blue-300 hover:bg-blue-200 transition text-center">
          + Nueva publicación
        </a>
      @endauth
    </div>

    @if($posts->isEmpty())
      <div class="relative bg-gray-300 p-6 rounded-lg shadow hover:shadow-md transition">
        <p class="text-gray-800">No hay publicaciones aún.</p>
      </div>
    @else
      <div class="space-y-8">
        @foreach($posts as $post)
        <article class="bg-gray-300 p-6 rounded-lg shadow hover:shadow-md transition">
          <div class="flex flex-col md:flex-row md:items-start gap-6">

            {{-- Columna de texto y botones --}}
            <div class="flex-1 min-w-0 order-1 md:order-none flex flex-col">
              <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $post->title }}</h3>
              <p class="text-sm text-gray-500 mb-3">
                por {{ $post->user->name }} · {{ $post->created_at->format('d M Y') }}
              </p>

              <div class="prose max-w-none text-gray-700 break-words mb-4">
                {!! $post->preview_text !!}
              </div>

              {{-- Botones debajo del texto --}}
              <div class="flex items-center space-x-2 mt-2">
                <x-view-button :href="route('blog.show', $post)" />
                @auth
                  @if(Auth::id() === $post->user_id)
                    <x-edit-button :href="route('blog.edit', $post)" />
                    <x-delete-button :action="route('blog.destroy', $post)" />
                  @endif
                @endauth
              </div>
            </div>

            {{-- Imagen --}}
            @if($post->preview_image)
              <div class="w-full md:w-1/3 flex-shrink-0 flex justify-center items-start order-2 md:order-none mt-4 md:mt-0">
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
