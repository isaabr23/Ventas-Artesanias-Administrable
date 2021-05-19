<?php 
    
include_once 'funciones/funciones.php';

$nombre = $_POST['nombre'];   //extraemos el dato del usuario
$email = $_POST['email']; //extraemos el dato del password
// $id_registro = $_POST['id_registro'];
$mensaje = $_POST['mensaje'];
$num_telefono = $_POST['telefono'];
$modo = $_POST['modo'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$fechadefault = "0001-01-01";
$horadefault = "00:00";

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

if($_POST['cliente'] == 'nuevo') {

    if ($modo === "2") {
        try {
            $stm = $conn->prepare("INSERT INTO clientes (nombre, email, telefono, mensaje, modo, fecha, hora) VALUES (?,?,?,?,?,?,?)");
            $stm->bind_param("ssisiss", $nombre, $email, $num_telefono, $mensaje, $modo, $fechadefault, $horadefault);
            
            $stm->execute();
    
            $error = $stm->error;   // manda un mensaje de error y una pequeña explicacion
            $id_insertado = $stm->insert_id; // inserta el id automatico
            
            if($stm->affected_rows>0) { // colocamos " > 0 " para que si no se modifica ninguna columna mande error
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_insertado' => $id_insertado
                );
    
            } else {
                $respuesta = array(
                    'respuesta' => 'error',    
                    'error' => $error    // en caso de error manda un mensaje con un texto del error
                );
            }
            $stm->close();
            $conn->close();
            
        } catch(Exception $e) {
            $respuesta = array(
                'respuesta' =>  $e->getMessage()
            );
        }
    } else if ($modo === "1") {
    
    try {
        $stm = $conn->prepare("INSERT INTO clientes (nombre, email, telefono, mensaje, modo, fecha, hora) VALUES (?,?,?,?,?,?,?)");
        $stm->bind_param("ssisiss", $nombre, $email, $num_telefono, $mensaje, $modo, $fecha, $hora);
        
        $stm->execute();

        $error = $stm->error;   // manda un mensaje de error y una pequeña explicacion
        $id_insertado = $stm->insert_id; // inserta el id automatico
        
        if($stm->affected_rows>0) { // colocamos " > 0 " para que si no se modifica ninguna columna mande error
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado
            );

        } else {
            $respuesta = array(
                'respuesta' => 'error',    
                'error' => $error    // en caso de error manda un mensaje con un texto del error
            );
        }
        $stm->close();
        $conn->close();
        
    } catch(Exception $e) {
        $respuesta = array(
            'respuesta' =>  $e->getMessage()
        );
    }
}

    return die(json_encode($respuesta));
}
