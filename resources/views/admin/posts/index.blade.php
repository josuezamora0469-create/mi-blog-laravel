@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Administrar Posts</h3>
        <a href="/admin/posts/create" class="btn btn-primary float-end">Crear nuevo post</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->titulo }}</td>
                    <td>{{ $post->publicado ? '✅ Publicado' : '📝 Borrador' }}</td>
                    <td>
                        <a href="/blog/{{ $post->id }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                        <form action="/admin/posts/{{ $post->id }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este post?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection