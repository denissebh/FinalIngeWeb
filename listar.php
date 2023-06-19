<?php

try {

    $conexion = new PDO("mysql:host=localhost;port=3306;dbname=prueba1", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $res = $conexion->query('SELECT * FROM register') or die(print($conexion->errorInfo()));

    $data = [];

    while($item = $res->fetch(PDO::FETCH_OBJ)) {

        $data[] = [
            'id' => $item->id,
            'name' => $item->name,
            'ApellidoP' => $item->ApellidoP,
            'ApellidoM' => $item->ApellidoM,
            'curp' => $item->curp,
            'password' => $item->password,
            'email' => $item->email,
            'phone' => $item->phone,
            'habilitado' => $item->habilitado
        ];

    }

    echo json_encode($data);

} catch(PDOException $error) {

    echo $error->getMessage();
    die();

}