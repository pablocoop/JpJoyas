<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoContent;
use Illuminate\Support\Facades\Auth;

class InfoContentController extends Controller
{
    // Mostrar formulario de edición (por sección)
    public function edit($section)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Acceso no autorizado');
        }

        // Crea o busca el contenido correspondiente
        $content = InfoContent::firstOrCreate(['section' => $section]);

        return view('admin.edit-info', [
            'section' => $section,
            'content' => $content,
        ]);
    }

    // Guardar cambios
    public function update(Request $request, $section)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Acceso no autorizado');
        }

        $request->validate([
            'body' => 'required|string',
        ]);

        $content = InfoContent::firstOrCreate(['section' => $section]);
        $content->body = $request->body;
        $content->save();

        return redirect()->route('home')->with('success', 'Contenido actualizado.');
    }
}
