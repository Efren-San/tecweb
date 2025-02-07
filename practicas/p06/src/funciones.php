<?php
  function multiplo7dey5($num) {
    $num = $_GET['numero'];
    if ($num%5==0 && $num%7==0)
        {
        echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
        }
    else
        {
        echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
        }
  }

  function print_nombreyemail($name, $email) {
    $name=$_POST["name"];
    $email=$_POST["email"];
    echo $name;
    echo '<br>';
    echo $email;
  }

  function secuencia($matriz, $lim) {
    for ($i=0; $i<$lim; $i++) {
      for ($j=0; $j<3; $j++) {
          $Numval=mt_rand(100, 999);
          $matriz[$i][$j] = $Numval;
      }

      if($matriz[$i][0]%2!=0 && $matriz[$i][1]%2==0 && $matriz[$i][2]%2!=0) {
          break;
      }
      else {
          $lim++;
      }
    }

    for ($i=0; $i<$lim; $i++) {
      for ($j=0; $j<3; $j++) {
          echo $matriz[$i][$j].' ';
      }
      echo '<br>';
    }
  
    echo '<br> <em>La cajita mágica</em> necesitó '. $i*3 .' números y ' . $i . 
    ' iteración/es para encontrar el <b>impar, par e impar</b>';
  }


  function whileNum($num, $encontrado) {
    $num=$_GET['num1'];
      while($encontrado==false) {
          $Numval=mt_rand(100, 999);
          if($Numval%$num==0) {
              echo $Numval .' es un número aleatorio que es múltiplo de '. $num;
              $encontrado=true;
          }
      }
  }
  
  function doWhileNum($num, $encontrado) {
    $num=$_GET['num2'];
      do{
          $Numval=mt_rand(100, 999);
          if($Numval%$num==0) {
              echo $Numval .' es un número aleatorio que es múltiplo de '. $num;
              $encontrado=true;
          }
      }while($encontrado==false);
  }

