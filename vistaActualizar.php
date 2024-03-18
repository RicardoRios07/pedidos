<?php
require_once('controladorPedido.php');
require_once('modeloPedido.php');

$controladorPedido = new ControladorPedido();
$pedido = new Pedido();

$pedido = $controladorPedido->obtenerPedido($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Pedido</title>
</head>
<body>
    <form action='controladorPedido.php' method='post'>
    <table>
        <tr>
            <input type='hidden' name='id' value='<?php echo $pedido->getId()?>'>
            <td>Nombre del Pedido:</td>
            <td> <input type='text' name='nombre_pedido' value='<?php echo $pedido->getNombrePedido()?>'></td>
        </tr>
        <tr>
            <td>Detalle:</td>
            <td><input type='text' name='detalle' value='<?php echo $pedido->getDetalle()?>'></td>
        </tr>
        <input type='hidden' name='actualizar' value='actualizar'>
    </table>
    <input type='submit' value='Guardar'>
    <a href="index.php">Volver</a>
    </form>
</body>
</html>
