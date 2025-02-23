<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <?php
        /** SE CREA EL OBJETO DE CONEXION */
        @$link = new mysqli('localhost', 'root', '1234', 'marketzone');

        /** comprobar la conexión */
        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error . '<br/>');
        }

        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $tope = isset($_GET['tope']) ? $_GET['tope'] : null;
        
        if (!empty($id)) {
            // Consulta para un solo producto
            $query = "SELECT * FROM productos1 WHERE id = '{$id}'";
        } else {
            // Consulta para todos los productos o filtrados por unidades
            $query = "SELECT * FROM productos1";
            if (!empty($tope)) { 
                $query .= " WHERE unidades <= {$tope}";
            }
        }

        $result = $link->query($query);
        
        if (!$result) {
            die('Error en la consulta: ' . $link->error);
        }
        
        $productos = $result->fetch_all(MYSQLI_ASSOC);
        $link->close();
    ?>

    <div class="container">
        <?php if (!empty($productos)) : ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Unidades</th>
                        <th>Detalles</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <!--La instrucción foreach: enumera los elementos de una colección y 
                ejecuta su cuerpo(body) para cada elemento de la colección, usado para
                que se vean todos los productos y no se necesite tope o id. -->
                <tbody>
                     <?php foreach ($productos as $producto) : ?> 
                        <tr>
                            <th scope="row"><?= $producto['id'] ?></th>
                            <td><?= $producto['nombre'] ?></td>
                            <td><?= $producto['marca'] ?></td>
                            <td><?= $producto['modelo'] ?></td>
                            <td><?= $producto['precio'] ?></td>
                            <td><?= $producto['unidades'] ?></td>
                            <td><?= $producto['detalles'] ?></td>
                            <td><img src="<?= $producto['imagen'] ?> "width = 50 >"</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="alert">No se encontraron productos.</p>
        <?php endif; ?> <!--  Si productos está vacío, entonces se mueatra un alert warning-->
    </div> 
</body>
</html>