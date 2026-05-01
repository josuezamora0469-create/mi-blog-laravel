<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/blog">Mi Blog</a>
            <div class="ms-auto">
                @auth
                    <span class="text-white me-3">{{ Auth::user()->name }}</span>
                    <a href="/admin/posts" class="btn btn-sm btn-outline-light">Admin</a>
                    <form action="/logout" method="POST" style="display:inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Salir</button>
                    </form>
                @else
                    <a href="/login" class="btn btn-sm btn-outline-light">Login</a>
                    <a href="/register" class="btn btn-sm btn-primary">Registro</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>