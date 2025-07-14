<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrixUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('trix-images', 'public');

            return response()->json([
                'url' => asset('storage/' . $path),
            ]);
        }

        return response()->json(['error' => 'No se encontró imagen'], 422);
    }
}
