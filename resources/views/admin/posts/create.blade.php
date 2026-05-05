@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Crear Nuevo Post</h3>
    </div>
    <div class="card-body">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Slug (URL amigable)</label>
                <input type="text" name="slug" class="form-control" required>
                <small class="text-muted">Ejemplo: mi-primer-post</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Contenido</label>
                <textarea name="contenido" rows="10" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Imagen (opcional)</label>
                <input type="file" name="imagen" class="form-control" accept="image/*">
                <small class="text-muted">Formatos: JPG, PNG, GIF (máx. 2MB)</small>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" name="publicado" value="1" class="form-check-input" id="publicado">
                <label class="form-check-label" for="publicado">Publicar inmediatamente</label>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/admin/posts" class="btn btn-secondary">Cancelar</a>

        </form>
    </div>
</div>
@endsection