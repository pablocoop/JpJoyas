<form method="POST" {{ $attributes->merge(['onsubmit' => "return confirm('¿Eliminar publicación?')"]) }}>
    @csrf
    @method('DELETE')
    <button type="submit" class="flex items-center justify-center w-10 h-10 bg-red-100 text-red-800 rounded-md hover:bg-red-200 transition">
        <x-lucide-trash class="w-5 h-5" />
    </button>
</form>
