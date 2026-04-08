<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Dentista Ramírez</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            background: linear-gradient(135deg, #ccfbf1, #f8fafc);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 430px;
            background: white;
            padding: 32px;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.10);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #0f766e;
            text-align: center;
        }

        p {
            text-align: center;
            color: #6b7280;
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #374151;
        }

        input {
            width: 100%;
            padding: 14px;
            margin-bottom: 18px;
            border-radius: 12px;
            border: 1px solid #d1d5db;
            font-size: 15px;
        }

        button {
            width: 100%;
            background: #0f766e;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #115e59;
        }

        .alert {
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: #0f766e;
            text-decoration: none;
            font-weight: bold;
        }

        ul {
            margin: 0;
            padding-left: 18px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Dentista Ramírez</h1>
        <p>Inicia sesión para entrar al panel del sistema</p>

        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" placeholder="admin@ramirez.com" required>

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="********" required>

            <button type="submit">Entrar</button>
        </form>

        <a href="{{ route('inicio') }}" class="back">Volver al inicio</a>
    </div>
</body>
</html>