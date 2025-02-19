<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
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
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($), el signo de dolar es vital para definir una variable php.</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido, los únicos valores permitidos son de A-Z y guiones bajos en un inicio y después se pueden poner números también.</li>';
        echo '</ul>';
        unset($_myvar, $_7var, $myvar, $var7, $_element1);
    ?>
        
    <h2>Ejercicio 2</h2>
    <?php
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;  
    ?>

    <p><?php echo $a; ?><br /></p>
    <p><?php echo $b; ?><br /></p>
    <p><?php echo $c; ?><br /></p>

    <p>
        Sucede que después de la segunda asignación, tanto <b>b</b> como <b>c</b> son referencias a <b>a</b> (apuntan al mismo valor).<br />
        Por lo tanto, al cambiar <b>a</b>, todas las variables referenciadas también actualizan su valor.
    </p>

<?php unset($a, $b, $c); ?>

<h2>Ejercicio 3</h2>
    <?php
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a version de PHP";
        @$c = $b * 10;
        $a .= $b;
        @$b *= $c;
        $z[0] = "MySQL";
    ?>

    <p><?php echo "a: $a"; ?></p>
    <p><?php echo "z[0]: $z[0]"; ?></p>
    <p><?php echo "b: $b"; ?></p>
    <p><?php echo "c: $c"; ?></p>
    <p><?php echo "a.: $a"; ?></p>
    <p><?php echo "b: $b"; ?></p>
    <p><?php echo "z[0]: $z[0]"; ?></p>

<?php unset($a, $b, $c, $z); ?>


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
        echo "<p>a: $a</p>";  
        echo "<p>z[0]: $z[0]</p>";  
        echo "<p>b: $b</p>";  
        echo "<p>c: $c</p>";  
        echo "<p>a.: $a</p>"; 
        echo "<p>b: $b</p>";  
        echo "<p>z[0]: $z[0]</p>"; 
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
?>

<p><?php echo "a: $a"; ?></p>
<p><?php echo "b: $b"; ?></p>
<p><?php echo "c: $c"; ?></p>

<?php unset($a, $b, $c); ?>

<h2>Ejercicio 6</h2>
<?php
    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);
?>

<p><?php var_dump($a); ?></p>
<p><?php var_dump($b); ?></p>
<p><?php var_dump($c); ?></p>
<p><?php var_dump($d); ?></p>
<p><?php var_dump($e); ?></p>
<p><?php var_dump($f); ?></p>

<?php unset($a, $b, $c, $d, $e, $f); ?>

<h2>Ejercicio 6 echo con var_export</h2>
<?php
    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);
?>

<p><?php echo "a: $a"; ?></p>
<p><?php echo "b: $b"; ?></p>
<p><?php echo "c: " . var_export($c, true); ?></p>
<p><?php echo "d: " . var_export($d, true); ?></p>
<p><?php echo "e: " . var_export($e, true); ?></p>
<p><?php echo "f: " . var_export($f, true); ?></p>

<p>La función <b>var_export</b> en PHP se usa para obtener
una representación en forma de cadena de una variable, similar
a var_dump(), pero con la diferencia de que devuelve una salida
en código PHP que cambia bool a cadena de caracteres en este caso.</p>

<h2>Ejercicio 7</h2>
<?php
    echo "<p><b>Versión de Apache y PHP:</b> " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
    echo "<p><b>Sistema Operativo del Servidor:</b> " . strip_tags($_SERVER['SERVER_SIGNATURE']) . "</p>";
    echo "<p><b>Idioma del Navegador (Cliente):</b> " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "</p>";
?>

<p><?php echo 'Versión de PHP: ' . phpversion(); ?></p>

  <div> <a href="https://validator.w3.org/markup/check?uri=referer"><img
  src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a></div>

</body>
</html>
