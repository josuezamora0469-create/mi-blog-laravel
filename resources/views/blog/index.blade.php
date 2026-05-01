<!DOCTYPE html>
<html>
<head>
    <title>Mi Blog</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; }
        .post { border-bottom: 1px solid #ccc; margin-bottom: 20px; padding-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Mi Blog</h1>

    @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->titulo }}</h2>
            <p>{{ \Illuminate\Support\Str::limit($post->contenido, 200) }}</p>
            <a href="/blog/{{ $post->id }}">Leer más...</a>
            <br>
            <small>Publicado por: {{ $post->user->name ?? 'Admin' }}</small>
        </div>
    @endforeach
</body>
</html>