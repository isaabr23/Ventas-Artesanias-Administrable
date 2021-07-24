<?php

include_once 'funciones/funciones.php';

if (isset($_POST['login-admin'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    try {
        // Seleccionar el administrador de la base de datos
        $stm = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?;");
        $stm->bind_param("s", $usuario);
        $stm->execute();
        $stm->bind_result($id_admin, $usuario_admin, $password_admin, $nivel_admin, $fecha_admin);
        if ($stm->affected_rows) {
            $existe = $stm->fetch();

            if ($existe) {
                if (password_verify($password, $password_admin)) {
                    session_start();
                    $_SESSION['usuario'] = $usuario_admin;
                    $_SESSION['nivel'] = $nivel_admin;
                    $_SESSION['id'] = $id_admin;

                    $respuesta = array(
                     'respuesta' => 'exito',
                     'usuario' => $usuario_admin
                    );
                } else {
                    $respuesta = array(
                    'respuesta' => 'error verify_pass'
                    );
                }
            } else {
                $respuesta = array(
                'respuesta' => 'error'
                );
            }
        }

        $stm->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
        die(json_encode($respuesta));
}
