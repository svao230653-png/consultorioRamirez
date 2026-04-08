<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dentista Ramírez')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body{
            background:#f4f7fb;
        }
        .navbar-brand{
            font-weight:700;
        }
        .sidebar-card,
        .content-card{
            border:none;
            border-radius:18px;
            box-shadow:0 8px 20px rgba(0,0,0,.06);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('inicio') }}">
            <i class="fa-solid fa-tooth me-2"></i>Dentista Ramírez
        </a>
    </div>
</nav>

<div class="container py-4">
    @include('components.alertas')
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>