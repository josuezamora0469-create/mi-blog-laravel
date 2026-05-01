@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Editar Post</h3>
    </div>
    <div class="card-body">
        <form action="/admin/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" value="{{ $post->titulo }}" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Slug (URL amigable)</label>
                <input type="text" name="slug" value="{{ $post->slug }}" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Contenido</label>
                <textarea name="contenido" rows="10" class="form-control" required>{{ $post->contenido }}</textarea>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" name="publicado" value="1" class="form-check-input" id="publicado" {{ $post->publicado ? 'checked' : '' }}>
                <label class="form-check-label" for="publicado">Publicado</label>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="/admin/posts" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection