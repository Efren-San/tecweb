<hr/>
<?php
echo "<div><h1 style=\"border-width:3px; border-style:groove; background-color:
#ffcc99;\"> Final de la página PHP Vínculos útiles : 
<a href=\"https://www.php.net\">php.net</a> &nbsp; 
<a href=\"https://www.mysql.com\">mysql.org</a></h1></div>";

echo "<div>Nombre del archivo ejecutado: " . basename($_SERVER['PHP_SELF']) . "&nbsp;&nbsp;&nbsp; " .
     "Nombre del archivo incluido: " . basename(__FILE__) . "</div>";
?>
</body>
</html>
