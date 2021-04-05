<?php
  $Title = "Integrazione di funzioni razionali fratte";
  $Date = "17/04/2021";
  $Class = "5<sup>a</sup> LSA B";
  echo '<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet">
    <title>
      '.$Title.'
    </title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
      (function($) {
          $(document).ready(function(){
              $(window).scroll(function(){
                  if ($(this).scrollTop() > 250) {
                      $(\'#navbar\').fadeIn(500);
                  } else {
                      $(\'#navbar\').fadeOut(500);
                  }
              });
          });
      })(jQuery);
    </script>
  </head>
  <body>
    <div id="blackBackground">
    </div>
    <div id="titleBackground">
    </div>
    <div id="title">'.$Title.'
      <div style="color:#BDBDBD;font-size:15px;">Della Giustina Lorenzo &emsp;&emsp;&emsp; '.$Class.' &emsp;&emsp; '.$Date.'</div>
    </div>
    <div id="navbar">
			<div id="navTitle">'.$Title.'
			</div>
			<div id="navDate">'.$Date.'
			</div>
			<div id="navName">
				Della Giustina Lorenzo
			</div>
		</div>
    <div id="content">
      <div id="ph1">
        <div id="phTitle"><b>COSA FA?</b></div>
        Crea una tabella con la successione richiesta, nell\'ordine richiesto.
      </div>
      <div id="ph2">
        <div id="phTitle"><b>INPUT</b></div>
        <form method="post" action="index.php">
          N(x): <input type="number" name="n3" ';
          if (isset($_POST['n3'])) {
            echo 'value="'.$_POST['n3'].'"';
          }
          echo '> x<sup>3</sup> + <input type="number" name="n2" ';
          if (isset($_POST['n2'])) {
            echo 'value="'.$_POST['n2'].'"';
          }
          echo '> x<sup>2</sup> + <input type="number" name="n1" ';
          if (isset($_POST['n1'])) {
            echo 'value="'.$_POST['n1'].'"';
          }
          echo '> x + <input type="number" name="n0" ';
          if (isset($_POST['n0'])) {
            echo 'value="'.$_POST['n0'].'"';
          }
          echo '><br>
          D(x): <input type="number" name="d3" ';
          if (isset($_POST['d3'])) {
            echo 'value="'.$_POST['d3'].'"';
          }
          echo '> x<sup>3</sup> + <input type="number" name="d2" ';
          if (isset($_POST['d2'])) {
            echo 'value="'.$_POST['d2'].'"';
          }
          echo '> x<sup>2</sup> + <input type="number" name="d1" ';
          if (isset($_POST['d1'])) {
            echo 'value="'.$_POST['d1'].'"';
          }
          echo '> x + <input type="number" name="d0" ';
          if (isset($_POST['d0'])) {
            echo 'value="'.$_POST['d0'].'"';
          }
          echo '>
          <br><br>
          <input type="submit" value="Calcola">
        </form>
      </div>
      <div id="ph1">';

  if (isset($_POST['n3']) && isset($_POST['n2']) && isset($_POST['n1']) && isset($_POST['n0']) && isset($_POST['d3']) && isset($_POST['d2']) && isset($_POST['d1']) && isset($_POST['d0'])) {
    $n[3] = $_POST['n3'];
    $n[2] = $_POST['n2'];
    $n[1] = $_POST['n1'];
    $n[0] = $_POST['n0'];
    $d[3] = $_POST['d3'];
    $d[2] = $_POST['d2'];
    $d[1] = $_POST['d1'];
    $d[0] = $_POST['d0'];

    foreach ($n as $key => $value) {
      if ($n[$key] == "") {
        $n[$key] = 0;
      }
    }
    foreach ($d as $key => $value) {
      if ($d[$key] == "") {
        $d[$key] = 0;
      }
    }

    /*if ($n[3]=="") {
      $n[3] = 0;
    }
    if ($n[2]=="") {
      $n[2] = 0;
    }
    if ($n[1]=="") {
      $n[1] = 0;
    }
    if ($n[0]=="") {
      $n[0] = 0;
    }
    if ($d[3]=="") {
      $d[3] = 0;
    }
    if ($d[2]=="") {
      $d[2] = 0;
    }
    if ($d[1]=="") {
      $d[1] = 0;
    }
    if ($d[0]=="") {
      $d[0] = 0;
    }*/

    echo '       <div id="phTitle"><b>OUTPUT</b></div>';


    //FUNCTIONS
      //STAMPA POLINOMIO
      function echo_pol($array) {
        ksort($array, 1);
        $array = array_reverse($array, true);
        $k = 0;
        foreach ($array as $key => $value) {
          if ($key == 0) {
            if ($value > 0 && $k == 1) {
              echo ' + '.$value;
            } elseif (($value < 0 && $k == 1) || ($value != 0 && $k == 0)) {
              echo $value;
            }
          } elseif ($key == 1) {
            if ($value > 0 && $k == 1) {
              echo ' + '.$value.'x';
            } elseif (($value < 0 && $k == 1) || ($value != 0 && $k == 0)) {
              echo $value.'x';
            }
          } else {
            if ($value > 0 && $k == 1) {
              echo ' + '.$value.'x<sup>'.$key.'</sup>';
            } elseif (($value < 0 && $k == 1) || ($value != 0 && $k == 0)) {
              echo $value.'x<sup>'.$key.'</sup>';
            }
          }
          $k = 1;
        }
      }

      //GRADO
      function grado($array) {
        $grado = 0;
        foreach (array_reverse(array_reverse($array, true), false) as $key => $value) {
          if ($value != 0 && $grado == 0) {
            $grado = count($array) - $key - 1;
          }
        }
        return $grado;
      }
      //SOMMA TRA POLINOMI
      function sum($array1, $array2) {
        $maxkey_array1 = max(array_keys($array1));
        $maxkey_array2 = max(array_keys($array2));
        for ($key = max($maxkey_array1, $maxkey_array2); $key >= 0; $key--) {
          if (!isset($array1[$key])) {
            $array1[$key] = 0;
          }
          if (!isset($array2[$key])) {
            $array2[$key] = 0;
          }
          $diff[$key] = $array1[$key] + $array2[$key];
        }
        return $diff;
      }
      //DIFFERENZA TRA POLINOMI
      function diff($array1, $array2) {
        $maxkey_array1 = max(array_keys($array1));
        $maxkey_array2 = max(array_keys($array2));
        for ($key = max($maxkey_array1, $maxkey_array2); $key >= 0; $key--) {
          if (!isset($array1[$key])) {
            $array1[$key] = 0;
          }
          if (!isset($array2[$key])) {
            $array2[$key] = 0;
          }
          $diff[$key] = $array1[$key] - $array2[$key];
        }
        return $diff;
      }
      //MOLTIPLICAZIONE TRA MONOMIO E POLINOMIO
      function molt($k, $key_k, $array) {
        foreach ($array as $key => $value) {
          $molt[$key + $key_k] = $value * $k;
        }
        return $molt;
      }
      //DIVISIONE TRA POLINOMI
        //QUOZIONE
        function quoz($num, $den) {
          $temp_prev = $num;
          $grado_temp = grado($num);
          $grado_den = grado($den);
          while ($grado_temp >= $grado_den) {
            $q[$grado_temp - $grado_den] = $temp_prev[$grado_temp] / $den[$grado_den];
            $temp = molt($q[$grado_temp - $grado_den], $grado_temp - $grado_den, $den);
            $temp = diff($temp_prev, $temp);
            $grado_temp = grado($temp);
            $temp_prev = $temp;
            unset($temp);
          }
          return $q;
        }
        //RESTO
        function resto($num, $den) {
          $temp_prev = $num;
          $grado_temp = grado($num);
          $grado_den = grado($den);
          while ($grado_temp >= $grado_den) {
            $q[$grado_temp - $grado_den] = $temp_prev[$grado_temp] / $den[$grado_den];
            $temp = molt($q[$grado_temp - $grado_den], $grado_temp - $grado_den, $den);
            $temp = diff($temp_prev, $temp);
            $grado_temp = grado($temp);
            $temp_prev = $temp;
            unset($temp);
          }
          return $temp_prev;
        }


    //TROVO IL GRADO DI N(x) E DI D(x)
      //N(x)
      $grado_n = grado($n);
      echo 'Il grado di N(x) &egrave; '.$grado_n.'.<br>';
      //D(x)
      $grado_d = grado($d);
      echo 'Il grado di D(x) &egrave; '.$grado_d.'.<br>';
    //grado_n > grado_d
    if($grado_n >= $grado_d){
      echo 'Il grado di N(x) &egrave; maggiore o uguale a quello di D(x).<br><br>';
      //CALCOLO IL QUOZIENTE Q(x) E IL RESTO R(x)
      $q = quoz($n, $d);
      $r = resto($n, $d);
      echo 'Calcoliamo il quoziente e il resto della divisione polinomiale tra N(x) e D(x):<br>Q(x)=';
      echo_pol($q);
      echo '<br>R(x)=';
      echo_pol($r);
      echo '<br><br>Il rapporto N(x)/D(x) pu&ograve; essere scritto nel modo seguente:<br>Q(x) + R(x)/D(x) = ';
      echo_pol($q);
      echo ' + (';
      echo_pol($r);
      echo ') / (';
      echo_pol($d);
      echo ')';
    }

  } else {
    echo '       <div id="phTitle"><b>OUTPUT</b></div>
      Inserire i dati richiesti nella sezione input!';
  }
      echo '
    </div>
  </body>
</html>
';

?>
