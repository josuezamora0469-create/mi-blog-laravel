@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Dashboard
    </div>
    <div class="card-body">
        <h5 class="card-title">Bienvenido, {{ Auth::user()->name }}</h5>
        <p class="card-text">Has iniciado sesión correctamente.</p>
        <a href="/admin/posts" class="btn btn-primary">Administrar Posts</a>
    </div>
</div>
@endsection