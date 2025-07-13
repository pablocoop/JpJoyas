<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->get(); // Fetch all blog posts, ordered by the most recent first
        return view('home', compact('posts'));
    }
}
