<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
</head>
<body>
    <h2>Registro de Usuarios</h2>
    <form action="registro.php" method="POST">
        <label for="txtusuario">Nombre de Usuario:</label>
        <input type="text" id="txtusuario" name="txtusuario" required><br><br>
        
        <label for="txtpassword">Contraseña:</label>
        <input type="password" id="txtpassword" name="txtpassword" required><br><br>
        
        <label for="txtpassword_confirm">Confirmar Contraseña:</label>
        <input type="password" id="txtpassword_confirm" name="txtpassword_confirm" required><br><br>
        
        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
            <option value="admin">Admin</option>
            <option value="user">User </option>
            <option value="tecnico">Técnico</option>
        </select><br><br>
        
        <input type="submit" name="btnregistro" value="Registrar">
    </form>
</body>
</html>