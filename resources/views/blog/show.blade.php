<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->titulo }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; }

        .comment {
            background: #f5f5f5;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        form {
            margin-top: 20px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        






    </style>
</head>
<body>
    <a href="/blog">← Volver al blog</a>
    
    <h1>{{ $post->titulo }}</h1>
    <p>{{ $post->contenido }}</p>
    

    <hr>
    <h3>Comentarios ({{ $post->comments->count() }})</h3>
    @foreach($post->comments as $comment)
        <div class="comment">
            <strong>{{ $comment->user->name ?? 'Usuario' }}</strong>
            <p>{{ $comment->contenido }}</p>
            <small>{{ $comment->created_at->diffForHumans() }}</small>
        </div>
    @endforeach

    <!-- Formulario para comentar -->
    <form action="/comentarios" method="POST">
     @csrf
     <input type="hidden" name="post_id" value="{{ $post->id }}">
    <textarea name="contenido" rows="3" placeholder="Escribe un comentario..." required></textarea>
    <br><br>
    <button type="submit">Enviar comentario</button>
    </form>






    


    
</body>
</html>