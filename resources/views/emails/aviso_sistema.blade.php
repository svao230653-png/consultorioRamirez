<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aviso del sistema</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f8; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <div style="background: #198754; color: white; padding: 20px; text-align: center;">
            <h2 style="margin: 0;">Consultorio Dental Ramírez</h2>
        </div>

        <div style="padding: 30px;">
            <h3>Hola, {{ $usuario->nombre }}</h3>

            <p>Se te envía el siguiente aviso relacionado con el sistema:</p>

            <div style="background: #f8f9fa; padding: 15px; border-left: 4px solid #198754; margin: 20px 0;">
                {{ $mensajeCorreo }}
            </div>

            <p>Este mensaje fue enviado por el administrador del sistema.</p>

            <a href="{{ config('app.url') }}"
               style="display:inline-block; margin-top:20px; background:#198754; color:white; text-decoration:none; padding:12px 20px; border-radius:6px;">
               Ir al sistema
            </a>
        </div>

        <div style="background: #f1f1f1; text-align: center; padding: 15px; font-size: 14px; color: #666;">
            Correo automático del sistema. Por favor, no responder.
        </div>
    </div>
</body>
</html>