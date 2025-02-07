<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
        <p>Programa para comprobar si un número es un múltiplo de 5 y 7</p>
        <?php
            require_once __DIR__.'/src/funciones.php';
            if(isset($_GET['numero']))
            {
                multiplode7y5($_GET['numero']);
            }
        ?>

    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p06/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
        <?php
            if(isset($_POST["name"]) && isset($_POST["email"]))
            {
                print_nombreyemail($_POST["name"], $_POST["email"]);
            }
        ?>

    
    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios 
       hasta obtener una secuencia compuesta por: <b>impar, par, impar</b></p>
        <?php
            $matriz=[];
            $lim=1;
            secuencia($matriz, $lim);
        ?>



</body>
</html>