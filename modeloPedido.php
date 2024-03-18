<?php
// incluye la clase Db
require_once('conexion.php');

class Pedido {
    private $id;
    private $nombre_pedido;
    private $detalle;

    function __construct() {}

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombrePedido() {
        return $this->nombre_pedido;
    }

    public function setNombrePedido($nombre_pedido) {
        $this->nombre_pedido = $nombre_pedido;
    }

    public function getDetalle() {
        return $this->detalle;
    }

    public function setDetalle($detalle) {
        $this->detalle = $detalle;
    }

    public function insertar() {
        $db = Db::conectar();
        $insert = $db->prepare('INSERT INTO pedidos VALUES (NULL, :nombre_pedido, :detalle)');
        $insert->bindValue('nombre_pedido', $this->getNombrePedido());
        $insert->bindValue('detalle', $this->getDetalle());
        $insert->execute();
    }

    public function mostrar() {
        $db = Db::conectar();
        $listaPedidos = [];
        $select = $db->query('SELECT * FROM pedidos');

        foreach ($select->fetchAll() as $pedido) {
            $myPedido = new Pedido();
            $myPedido->setId($pedido['id']);
            $myPedido->setNombrePedido($pedido['nombre_pedido']);
            $myPedido->setDetalle($pedido['detalle']);
            $listaPedidos[] = $myPedido;
        }
        return $listaPedidos;
    }

    public function eliminar($id) {
        $db = Db::conectar();
        $eliminar = $db->prepare('DELETE FROM pedidos WHERE ID=:id');
        $eliminar->bindValue('id', $id);
        $eliminar->execute();
    }

    public function obtenerPedido($id) {
        $db = Db::conectar();
        $select = $db->prepare('SELECT * FROM pedidos WHERE ID=:id');
        $select->bindValue('id', $id);
        $select->execute();
        $pedido = $select->fetch();
        $myPedido = new Pedido();
        $myPedido->setId($pedido['id']);
        $myPedido->setNombrePedido($pedido['nombre_pedido']);
        $myPedido->setDetalle($pedido['detalle']);
        return $myPedido;
    }

    public function actualizar() {
        $db = Db::conectar();
        $actualizar = $db->prepare('UPDATE pedidos SET nombre_pedido=:nombre_pedido, detalle=:detalle WHERE ID=:id');
        $actualizar->bindValue('id', $this->getId());
        $actualizar->bindValue('nombre_pedido', $this->getNombrePedido());
        $actualizar->bindValue('detalle', $this->getDetalle());
        $actualizar->execute();
    }
}
?>
