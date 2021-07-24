<?php

require_once 'funciones/funciones.php';

$artesania = $_POST['artesania'];   //extraemos el dato del usuario
$tamano = $_POST['tamano'];     //extraemos el dato del nombre
$precio = $_POST['precio']; //extraemos el dato del password
$stock = $_POST['stock'];
$descripcion = $_POST['descripcion'];

$id_insertado = $_POST['id'];

if ($_POST['registro'] == 'nuevo') {
    $directorio = "../img/artesanias/"; // Se creara una carpeta en la que se guardaran las imagenes pero en la BD solo se guardara el nombre de la imagen

    if (!is_dir($directorio)) {
        mkdir($directorio, 0755, true); // permisos
    }
                                    //Ubicacion TEMPORAL lo movemos a // Ubicacion que queremos
    if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name']; //Ubicacion FINAL
        $imagen_resultado = "Se subio correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try {
        $stm = $conn->prepare("INSERT INTO productos (artesania, tamano, precio, stock, descripcion, url_imagen) VALUES (?,?,?,?,?,?)");
        $stm->bind_param("ssiiss", $artesania, $tamano, $precio, $stock, $descripcion, $imagen_url);
        $stm->execute();

        $error = $stm->error;   // manda un mensaje de error y una pequeña explicacion
        $id_insertado = $stm->insert_id; // inserta el id automatico

        if ($stm->affected_rows > 0) { // colocamos " > 0 " para que si no se modifica ninguna columna mande error
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado,
                'resultado_imagen' => $imagen_resultado
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
                'error' => $error    // en caso de error manda un mensaje con un texto del error
            );
        }
        $stm->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' =>  $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}

if ($_POST['registro'] == 'actualizar') {
    $id_registro = $_POST['id_registro'];

    $directorio = "../img/artesanias/"; // Se creara una carpeta en la que se guardaran las imagenes pero en la BD solo se guardara el nombre de la imagen

    if (!is_dir($directorio)) {
        mkdir($directorio, 0755, true); // permisos
    }
                                    //Ubicacion TEMPORAL lo movemos a // Ubicacion que queremos
    if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name']; //Ubicacion FINAL
        $imagen_resultado = "Se subio correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try {
        if ($_FILES['archivo_imagen']['size'] > 0) { // Por si solo actualizamos ciertos campos (no todos) haga la actualizacion y deje los datos que no modificamos
            // Con IMAGEN
            $stm = $conn->prepare("UPDATE productos SET artesania = ?,  tamano = ?, precio = ?, stock = ?, descripcion = ?, url_imagen = ?, fecha = NOW() WHERE id = ? ");
            $stm->bind_param("ssiissi", $artesania, $tamano, $precio, $stock, $descripcion, $imagen_url, $id_registro);
        } else {
          // Sin IMAGEN
            $stm = $conn->prepare("UPDATE productos SET artesania = ?,  tamano = ?, precio = ?, stock = ?, descripcion = ?, fecha = NOW() WHERE id = ? ");
            $stm->bind_param("ssiisi", $artesania, $tamano, $precio, $stock, $descripcion, $id_registro);
        }

        $estado = $stm->execute();

        if ($estado == true) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stm->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' =>  $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}


if ($_POST['registro'] == 'eliminar') {
    $id_borrar = $_POST['id'];

    try {
        $stm = $conn->prepare("DELETE FROM productos WHERE id = ?");
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

// echo"<pre>";
// var_dump($_POST);
// echo"</pre>";

// nos salia: 'id_insertado' => 0 porque no habia colocado la casilla de imagen en HTML y aqui se coloco
// $imagen = $_POST['imagen'];
// $stm = $conn->prepare("INSERT INTO productos (imagen) VALUES (?)");
// $stm->bind_param("s", $imagen);
//
// $error = $stm->error; se coloca para que mande error en caso de que no se modifique nada de la BD y para que se vea eso necesitamos colocar el >0 en el if
// if($stm->affected_rows>0)

// posteriormente colocamos el
// 'error' => $error    // en caso de error manda un mensaje con un texto explicando el error
