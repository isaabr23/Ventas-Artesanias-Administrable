
<?php
    // error_reporting(0);
    // header('Content-type: application/json; charset=utf-8');

    $conn = new mysqli('localhost', 'root', 'root', 'olinala');

if ($conn->connect_errno) {
    $mensaje = [
        'error' => true
    ];
}
