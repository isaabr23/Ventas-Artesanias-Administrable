<?php

include_once 'funciones/funciones.php';

$usuario = $_POST['usuario'];   //extraemos el dato del usuario
$password = $_POST['password']; //extraemos el dato del password
$id_registro = $_POST['id_registro'];
$nivel = $_POST['nivel'];

if ($_POST['registro'] == 'nuevo') {
     $opciones = array(
        'cost' => 12 // Preferencia que sea 12
     );
     $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones); // para encriptar (variable a encriptar, funcion de encriptacion, costo)


     if (strlen($password) < 4) {
         $respuesta = array(
            'respuesta' => 'pass'
         );
     } else {
         try {
                $stm = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?;");
                $stm->bind_param("s", $usuario);
                $stm->execute();
                $stm->bind_result($id_admin, $usuario_admin);

             if ($stm->affected_rows) {
                 $existe = $stm->fetch();

                 if ($existe) {
                        $respuesta = array(
                        'respuesta' => 'usuario repetido'
                        );
                 } else {
                       $stm = $conn->prepare("INSERT INTO usuarios (usuario, password, nivel) VALUES (?, ?, ?)");
                       $stm->bind_param("ssi", $usuario, $password_hashed, $nivel);
                       $stm->execute();
                       $error = $stm->error;
                       $id_registro = $stm->insert_id;
                     if ($id_registro > 0) {
                         $respuesta = array(
                         'respuesta' => 'exito',
                         'id_admin' => $id_registro
                         );
                     } else {
                         $respuesta = array(
                         'respuesta' => 'error'
                         );
                     }
                 }
             } else {
                 $respuesta = array(
                 'respuesta' => 'error'
                 );
             }

             $stm->close();
             $conn->close();
         } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
         }
     }
     die(json_encode($respuesta));
}

if ($_POST['registro'] == 'actualizar') {
    try {
        if (empty($_POST['password'])) { // Este empty verifica si esta vacio password y si es asi no lo actualiza se queda con el anterior
            $stm = $conn->prepare("UPDATE usuarios SET usuario = ?, nivel = ?, fecha = NOW() WHERE id = ?"); // Solo se cambia USUARIO Y Nivel
            $stm->bind_param("sii", $usuario, $nivel, $id_registro);
        } else {    // Si si se escribio en password lo actualiza
            $opciones = array(
            'cost' => 12
            );

            $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
            $stm = $conn->prepare('UPDATE usuarios SET usuario = ?, nivel = ?, password = ?, fecha = NOW() WHERE id = ?'); // Se cambian los 3 VALORES
            $stm->bind_param("sisi", $usuario, $nivel, $hash_password, $id_registro);
        }

        $stm->execute();
        $error = $stm->error;
        if ($stm->affected_rows > 0) {
            $respuesta = array(
            'respuesta' => 'exito',
            'id_actualizado' => $stm->insert_id
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
                'error' => $error
            );
        }
        $stm->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}

if ($_POST['registro'] == 'eliminar') {
    $id_borrar = $_POST['id'];

    try {
        $stm = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
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
