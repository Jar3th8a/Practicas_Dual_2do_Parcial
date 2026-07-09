<div>
    <h3>Autenticación de Dos Factores (2FA)</h3>
    <p>Escanea este código QR con Google Authenticator o Authy:</p>

    <div>
        {!! $qrCode !!}
    </div>

    <p>Clave secreta manual: <code>{{ $secretKey }}</code></p>

    <form method="POST" action="/user/two-factor-confirmed">
        @csrf
        <div>
            <label>Ingresa el código de tu App para confirmar:</label>
            <input type="text" name="code" required maxlength="6">
        </div>
        <button type="submit">Confirmar e Instalar 2FA</button>
    </form>
</div>