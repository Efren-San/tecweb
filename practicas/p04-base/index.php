<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($), <br>
        el signo de dolar es vital para definir una variable php.</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido,<br>
        los únicos valores permitidos son de A-Z y guiones bajos en un inicio<br>
        y después se pueden poner números también.</li>';
        echo '</ul>';

        unset($_myvar, $_7var, $myvar, $var7, $_element1);
    ?>
        
        <h2>Ejercicio 2</h2>
    <?php
       /* $a = "ManejadorSQL"; */
       /* $b = 'MySQL';*/     
       /* $c = &$a; */

        $a = "PHP server"; 
        $b = &$a;         
        $c = &$a;   
        
        echo "$a<br>"; 
        echo "$b<br>";
        echo "$c<br>";

        echo "<br>Sucede que después de la segunda asignación, tanto 
        <b>b</b> como <b>c</b> son referencias a <b>a</b>(apuntan al mismo valor).";
        echo "<br>Por lo tanto, al cambiar <b>a</b>, todas las
         variables referenciadas también actualizan su valor.";
        
         unset($a, $b, $c);
    ?>

<h2>Ejercicio 3</h2>
    <?php
       $a = "PHP5";
       echo "a: $a <br>";  
       $z[] = &$a;
       echo "z[0]: $z[0] <br>";  
       $b = "5a version de PHP";
       echo "b: $b <br>";  // b: 250
       $c = $b * 10;
       echo "c: $c <br>";  // c: 50
       $a .= $b;
       echo "a.: $a <br>";  
       $b *= $c;
       echo "b: $b <br>";  
       $z[0] = "MySQL";
       echo "z: z[0]: $z[0] <br>"; 
       
       unset($a, $b, $c, $z);
    ?>

<?php
echo 'Versión de PHP: ' . phpversion();
?>
    
</body>
</html>