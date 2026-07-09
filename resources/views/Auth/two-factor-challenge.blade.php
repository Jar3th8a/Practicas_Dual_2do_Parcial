<form method="POST" action="/two-factor-challenge">
    @csrf
    <div>
        <label>Código de autenticación:</label>
        <input type="text" name="code" inputmode="numeric" pattern="[0-9]{6}" maxlength="6" autocomplete="one-time-code" required autofocus>
    </div>
    <button type="submit">Verificar</button>

    <br><br>
    <a href="#" onclick="document.getElementById('recovery').style.display='block'; return false;">Usar código de recuperación</a>
    <div id="recovery" style="display:none; margin-top: 10px;">
        <label>Código de Recuperación:</label>
        <input type="text" name="recovery_code">
    </div>
</form> <!--[cite: 1] -->