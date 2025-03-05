<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        $nombre = $jsonOBJ->nombre;
        $marca = $jsonOBJ->marca;
        $modelo = $jsonOBJ->modelo;
        $precio = $jsonOBJ->precio;
        $detalles = $jsonOBJ->detalles;
        $unidades = $jsonOBJ->unidades;
        $imagen = $jsonOBJ->imagen;

        $sql1 = "SELECT eliminado FROM productos1 WHERE nombre='{$nombre}' AND marca='{$marca}'";
        $resultado = mysqli_query($conexion, $sql1);
        $eliminado = mysqli_fetch_column($resultado); 

        // Si $eliminado llega a ser NULO, no 0 ni 1, puede generar error. 
        if ($eliminado === false || $eliminado == 1) {
            $sql = "INSERT INTO productos1 (nombre, marca, modelo, precio, detalles, unidades, imagen)
                VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
            if (mysqli_query($conexion, $sql)) {
                echo '[SERVIDOR] Producto insertado con éxito: '. $nombre;
            }
            else {
                echo '[SERVIDOR] Error al insertar producto: '. mysqli_error($conexion);
            }
        }
        else {
            echo '[SERVIDOR] Producto ya existente: '. $nombre;
        }
    }
?>
