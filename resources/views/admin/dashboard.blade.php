@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Panel de Administración
    </div>
    <div class="card-body">
        <h5 class="card-title">Bienvenido al panel de control</h5>
        <a href="/admin/posts" class="btn btn-primary">Administrar Posts</a>
        <a href="/admin/posts/create" class="btn btn-success">Crear Nuevo Post</a>
    </div>
</div>
@endsection