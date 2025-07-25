<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = BlogPost::latest()->with('user')->get();
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());  // Esto detiene la ejecución y muestra todos los datos enviados
        $data = $request->validate([  // Validate the incoming request data
            'title' => 'required|string|max:255', // obligatorio, cadena, máximo 255 caracteres
            'body' => 'required|string', // obligatorio, cadena
            'image' => 'nullable|image', // opcional, imagen, máximo 5120 kilobytes (5MB)
            'video' => 'nullable|file|mimetypes:video/mp4,video/webm', // opcional, archivo de video, máximo 51200 kilobytes (51MB)
        ]);

        $data['user_id'] = Auth::id(); // Set the user_id to the currently authenticated user's ID

        if ($request->hasFile('image')) { // Check if an image file is uploaded
            $data['image_path'] = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('video')) { // Check if a video file is uploaded
            $data['video_path'] = $request->file('video')->store('videos', 'public');
        }

        BlogPost::create($data); // Create a new blog post with the validated data

        return redirect()->route('home')->with('success', 'Publicación creada exitosamente.');
    }

    /**
     * Display the specified resource. 
     */
    public function show(string $id)
    {
        $post = BlogPost::with('user')->findOrFail($id);
        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = BlogPost::findOrFail($id);

        // Opcional: asegurarse de que el usuario solo edite su propio post
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        return view('blog.edit', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = BlogPost::findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image',
            'video' => 'nullable|file|mimetypes:video/mp4,video/webm',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('video')) {
            $data['video_path'] = $request->file('video')->store('videos', 'public');
        }

        $post->update($data);

        return redirect()->route('blog.show', $post)->with('success', 'Post actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = BlogPost::findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('home')->with('success', 'Post eliminado exitosamente.');
    }
}
