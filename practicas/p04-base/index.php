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

<!-- <h2>Ejercicio 3 PRUEBA</h2> -->
      <!--  $a = "PHP5";
       echo "a: $a <br>"; 

       $z[] = &$a;
       echo "z[0]: $z[0] <br>";  

       $b = "5a version de PHP";
       echo "b: $b <br>";  

       $c = $b * 10;
       echo "c: $c <br>"; 

       $a .= $b;
       echo "a.: $a <br>";  

       $b *= $c;
       echo "b: $b <br>";  

       $z[0] = "MySQL";
       echo "z[0]: $z[0] <br>"; 

       unset($a, $b, $c, $z); -->

<h2>Ejercicio 3 </h2>
    <?php
        
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a version de PHP";
        @$c = $b * 10;
        $a .= $b;
        @$b *= $c;
        $z[0] = "MySQL";

        echo "a: $a <br>";  
        echo "z[0]: $z[0] <br>";  
        echo "b: $b <br>";  
        echo "c: $c <br>";  
        echo "a.: $a <br>"; 
        echo "b: $b <br>";  
        echo "z[0]: $z[0] <br>"; 

        unset($a, $b, $c, $z);
    ?>


<h2>Ejercicio 4 con global</h2>

    <?php
        
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a version de PHP";
        @$c = 10 * $b;
        $a .= $b;
        @$b *= $c;
        $z[0] = "MySQL";

        function mostrarValoresGlobal() {
            global $a, $b, $c, $z;
            echo "a: $a <br>";  
            echo "z[0]: $z[0] <br>";  
            echo "b: $b <br>";  
            echo "c: $c <br>";  
            echo "a.: $a <br>"; 
            echo "b: $b <br>";  
            echo "z[0]: $z[0] <br>"; 

        }

        mostrarValoresGlobal();

        unset($a, $b, $c, $z);
    ?>

<h2>Ejercicio 5</h2>

    <?php
        $a = "7 personas";
        $b = (integer) $a;
        $a = "9E3";
        $c = (double) $a;

        echo "a: $a <br>";  
        echo "b: $b <br>";  
        echo "c: $c <br>";   

        unset($a, $b, $c);
    ?>

<h2>Ejercicio 6</h2>

    <?php
        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);

        var_dump($a);
        echo "<br>";
        var_dump($b);
        echo "<br>";
        var_dump($c);
        echo "<br>";
        var_dump($d);
        echo "<br>";
        var_dump($e);
        echo "<br>";
        var_dump($f);
        echo "<br>";

        unset($a, $b, $c, $d, $e, $f);
    ?>

<h2>Ejercicio 6 echo con var_export</h2>

    <?php
        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);
        
        echo "a: $a <br>";  
        echo "b: $b <br>";  
        echo "c: " . var_export($c, true) . "<br>";  
        echo "d: " . var_export($d, true) . "<br>";  
        echo "e: " . var_export($e, true) . "<br>";  
        echo "f: " . var_export($f, true) . "<br>";  

        echo "<br>La función <b>var_export</b> en PHP se usa para obtener <br> 
        una representación en forma de cadena de una variable, similar <br> 
        a var_dump(), pero con la diferencia de que devuelve una salida <br> 
        en código PHP que cambia bool a cadena de caracteres en este caso <br><br>";
    ?>

<h2>Ejercicio 7</h2>
    <?php

        echo "<b>Versión de Apache y PHP:</b> " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
        echo "<b>Sistema Operativo del Servidor:</b> " . $_SERVER['SERVER_SIGNATURE'] . "<br>";
        echo "<b>Idioma del Navegador (Cliente):</b> " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br>";
    ?>

<?php
echo 'Versión de PHP: ' . phpversion();
?>

</body>
</html>