<?php
require_once('modeloEmpleado.php');

$empleado = new Empleado();
$controladorEmpleado = new ControladorEmpleado();

if (isset($_POST['insertar'])) {
    $controladorEmpleado->insertar($_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['correo']);
    header('Location: index.php');
} elseif (isset($_POST['actualizar'])) {
    $controladorEmpleado->actualizar($_POST['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['correo']);
    header('Location: index.php');
} elseif (isset($_GET['accion']) && $_GET['accion'] == 'e') {
    $controladorEmpleado->eliminar($_GET['id']);
    header('Location: index.php');
} elseif (isset($_GET['accion']) && $_GET['accion'] == 'a') {
    header('Location: vistaActualizar.php?id=' . $_GET['id']);
}

class ControladorEmpleado {
    function __construct() {}

    public function insertar($nombre, $direccion, $telefono, $correo) {
        $nuevoEmpleado = new Empleado();
        $nuevoEmpleado->setNombre($nombre);
        $nuevoEmpleado->setDireccion($direccion);
        $nuevoEmpleado->setTelefono($telefono);
        $nuevoEmpleado->setCorreo($correo);
    }

    public function actualizar($id, $nombre, $direccion, $telefono, $correo) {
        $empleadoActualizado = new Empleado();
        $empleadoActualizado->setId($id);
        $empleadoActualizado->setNombre($nombre);
        $empleadoActualizado->setDireccion($direccion);
        $empleadoActualizado->setTelefono($telefono);
        $empleadoActualizado->setCorreo($correo);
    }

}
?>
