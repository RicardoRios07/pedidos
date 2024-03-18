<!DOCTYPE html>
<html>
<head>
    <title>Ingresar Pedido</title>
</head>
<body>
<header>
    Ingresa los datos del Pedido
</header>
<form action='controladorPedido.php' method='post'>
    <table>
        <tr>
            <td>Nombre del Pedido:</td>
            <td> <input type='text' name='nombre_pedido'></td>
        </tr>
        <tr>
            <td>Detalle:</td>
            <td><input type='text' name='detalle' ></td>
        </tr>
        <input type='hidden' name='insertar' value='insertar'>
    </table>
    <input type='submit' value='Guardar'>
    <a href="index.php">Volver</a>
</form>
</body>
</html>
