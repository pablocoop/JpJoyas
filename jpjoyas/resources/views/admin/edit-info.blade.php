@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
  <h1 class="text-2xl font-bold mb-4">Editar {{ ucfirst($section) }}</h1>

  <form action="{{ route('info.update', $section) }}" method="POST">
    @csrf

    {{-- Campo oculto que Trix usará para guardar el contenido --}}
    <input id="body" type="hidden" name="body" value="{!! old('body', $content->body) !!}">
    <trix-editor input="body" class="trix-content"></trix-editor>
    <button type="submit"
            class="mt-4 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
        Guardar cambios
    </button>
  </form>
</div>
@endsection
