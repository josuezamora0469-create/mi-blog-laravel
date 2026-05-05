<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments'])->latest()->get();
        return view('blog.index', compact('posts'));
    }

    public function indexAdmin()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }


    public function show(Post $post)
    {
        $post->load(['user', 'comments.user']);
        return view('blog.show', compact('post'));
    }
    
    
	public function create()
	{
		return view('admin.posts.create');
	}

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|min:3',
            'slug' => 'required|unique:posts,slug',
            'contenido' => 'required|min:10',
            'imagen' => 'nullable|image|max:2048'
        ]);

        $imagenUrl = null;
        if ($request->hasFile('imagen')) {
            // Guardar la imagen en el disco público
            $path = $request->file('imagen')->store('posts', 'public');
            // Crear URL completa
            $imagenUrl = env('APP_URL') . '/storage/' . $path;
        }

        Post::create([
            'user_id' => auth()->id(),
            'titulo' => $request->titulo,
            'slug' => $request->slug,
            'contenido' => $request->contenido,
            'publicado' => $request->has('publicado'),
            'imagen' => $imagenUrl,  // Guardamos la URL completa
        ]);

        return redirect('/admin/posts')->with('success', 'Post creado correctamente');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'titulo' => 'required|min:3',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'contenido' => 'required|min:10',
            'imagen' => 'nullable|image|max:2048'
        ]);

        $data = [
            'titulo' => $request->titulo,
            'slug' => $request->slug,
            'contenido' => $request->contenido,
            'publicado' => $request->has('publicado'),
        ];

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('posts', 'public');
        }

        $post->update($data);

        return redirect('/admin/posts')->with('success', 'Post actualizado');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/admin/posts')->with('success', 'Post eliminado');
    }









}