<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Práctica 6</title>
    <style>
        body { font-family: sans-serif; margin: 40px; background: #f4f6f9; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); max-width: 500px; }
        button { background: #3490dc; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; font-weight: bold; }
        button:hover { background: #2779bd; }
        code { background: #e3e8ee; padding: 2px 6px; border-radius: 4px; }
    </style>
</head>
<body>

    <div class="card">
        <h2>Panel de Usuario</h2>
        <p>Bienvenido a tu panel de control, {{ auth()->user()->name }}.</p>
        <hr><br>

        @if(! auth()->user()->two_factor_secret)
            <!-- Botón para empezar la activación -->
            <form method="POST" action="/user/two-factor-authentication">
                @csrf
                <button type="submit">Activar Autenticación 2FA</button>
            </form>
        @else
            <!-- Botón para desactivar por completo -->
            <form method="POST" action="/user/two-factor-authentication" style="margin-bottom: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: #e3342f;">Desactivar 2FA</button>
            </form>

            <!-- Si ya empezó a configurarlo pero aún no lo confirma -->
            @if(! auth()->user()->two_factor_confirmed_at)
                <div style="margin-top: 20px; border: 1px solid #ccc; padding: 15px; border-radius: 5px;">
                    <p><strong>Paso final:</strong> Escanea el QR con tu celular y confirma el código token.</p>
                    
                    <div style="margin-bottom: 15px;">
                        {!! auth()->user()->twoFactorQrCodeSvg() !!}
                    </div>

                    <!-- Clave de texto para configuración manual si falla el QR -->
                    <p style="margin-top: 15px; margin-bottom: 15px; font-size: 14px; line-height: 1.4;">
                        <strong>¿No puedes escanear el QR?</strong><br>
                        Introduce este código manualmente en tu app:<br>
                        <code style="font-size: 15px; letter-spacing: 1px; color: #e3342f; font-weight: bold; display: inline-block; margin-top: 5px;">
                            {{ decrypt(auth()->user()->two_factor_secret) }}
                        </code>
                    </p>
                    
                    <!-- Corregido el action a la ruta oficial de Fortify -->
                    <form method="POST" action="/user/confirmed-two-factor-authentication">
                        @csrf
                        <input type="text" name="code" placeholder="Código de 6 dígitos" required style="padding: 8px; width: 150px;">
                        <button type="submit" style="background: #38c172;">Confirmar Activación</button>
                    </form>
                </div>
            @else
                <p style="color: #38c172; font-weight: bold; margin-top: 15px;">✓ Tu cuenta está protegida con 2FA.</p>
                
                <!-- Mostrar códigos de respaldo por si pierde el cel -->
                <h4>Códigos de Recuperación de Emergencia:</h4>
                <ul style="list-style: none; padding-left: 0;">
                    @foreach(auth()->user()->recoveryCodes() as $code)
                        <li style="margin-bottom: 5px;"><code>{{ $code }}</code></li>
                    @endforeach
                </ul>
            @endif
        @endif
    </div>

</body>
</html>