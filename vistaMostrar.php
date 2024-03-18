<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Pedidos</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre del Pedido</th>
                <th>Detalle</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('controladorPedido.php');

            $controladorPedido = new ControladorPedido();
            $listaPedidos = $controladorPedido->mostrar();

            if (!empty($listaPedidos)) {
                foreach ($listaPedidos as $pedido) {
            ?>
                <tr>
                    <td><?= htmlspecialchars($pedido->getNombrePedido()); ?></td>
                    <td><?= htmlspecialchars($pedido->getDetalle()); ?></td>
                    <td><a href="vistaActualizarPedido.php?id=<?= $pedido->getId()?>&accion=a">Actualizar</a></td>
                    <td><a href="controladorPedido.php?id=<?= $pedido->getId()?>&accion=e">Eliminar</a></td>
                </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="4">No hay pedidos para mostrar.</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <a href="index.php">Volver</a>
</body>
</html>
