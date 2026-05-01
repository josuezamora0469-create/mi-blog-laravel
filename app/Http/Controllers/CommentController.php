<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'contenido' => 'required|min:3'
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::id() ?? 1, // temporal: usa usuario 1 si no hay login
            'contenido' => $request->contenido
        ]);

        return back()->with('success', 'Comentario agregado');
    }
}