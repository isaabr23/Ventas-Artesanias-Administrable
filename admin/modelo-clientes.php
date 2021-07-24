<?php

require_once 'funciones/funciones.php';

if ($_POST['registro'] == 'eliminar') {
    $id_borrar = $_POST['id'];

    try {
        $stm = $conn->prepare("DELETE FROM clientes WHERE id = ?");
        $stm->bind_param("i", $id_borrar);
        $stm->execute(); // Corre el SQL
        if ($stm->affected_rows) {
            $respuesta = array(
                     'respuesta' => 'exito',
                     'id_eliminado' => $id_borrar
                );
        } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
        }
    } catch (Exception $e) {
        $respuesta = array(
         'respuesta' => $e->getMessage()
        );
    }
        die(json_encode($respuesta));
}
