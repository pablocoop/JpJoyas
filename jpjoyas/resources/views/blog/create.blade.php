@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow p-6 rounded">
  <h1 class="text-2xl font-bold mb-4">Crear nuevo post</h1>

  @if(session('success'))
    <div class="mb-4 text-green-600">{{ session('success') }}</div>
  @endif

  @if($errors->any())
    <div class="mb-4 text-red-600">
      <ul class="list-disc pl-5">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
      <label class="block font-medium">Título</label>
      <input type="text" name="title" class="w-full border rounded px-3 py-2" value="{{ old('title') }}" required>
    </div>
    <div>
      <label class="block font-medium">Contenido</label>
      <textarea name="body" rows="6" class="w-full border rounded px-3 py-2" required>{{ old('body') }}</textarea>
    </div>
    <div>
      <label class="block font-medium">Imagen (opcional)</label>
      <input type="file" name="image" class="mt-1">
    </div>
    <div>
      <label class="block font-medium">Video (opcional)</label>
      <input type="file" name="video" class="mt-1">
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Publicar</button>
  </form>
</div>
@endsection
