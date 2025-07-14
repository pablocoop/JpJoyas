<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->get()->map(function ($post) {
            // Extraer primera imagen embebida y agregarle clases Tailwind
            preg_match('/<img[^>]+src="([^">]+)"/i', $post->body, $imgMatch);
            $firstImageSrc = $imgMatch[1] ?? null;

            $firstImageTag = $firstImageSrc
                ? '<img src="' . $firstImageSrc . '" class="rounded-md shadow-sm max-h-48 object-cover w-full h-auto">'
                : null;

            // Quitar HTML y limitar texto
            $textOnly = strip_tags($post->body);
            $previewText = Str::limit($textOnly, 300);

            // Agregar al objeto post
            $post->preview_image = $firstImageTag;
            $post->preview_text  = $previewText;

            return $post;
        });

        return view('home', compact('posts'));
    }
    
}


