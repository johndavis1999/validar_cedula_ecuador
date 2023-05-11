<?php 
$identificacion = '0923896528';

function validar_identificacion_ecuador($identificacion) {
    // Eliminar cualquier caracter que no sea dígito
    $identificacion = preg_replace('/[^0-9]/', '', $identificacion);

    // Preguntamos si la identificación consta de 10 dígitos
    if(strlen($identificacion) == 10) {
        // Obtenemos el dígito de la región, que son los dos primeros dígitos
        $digito_region = substr($identificacion, 0, 2);

        // Preguntamos si la región existe (Ecuador se divide en 24 regiones)
        if($digito_region >= 1 && $digito_region <= 24) {
            // Extraemos el último dígito
            $ultimo_digito = substr($identificacion, 9, 1);

            // Agrupamos todos los pares y los sumamos
            $pares = intval($identificacion[1]) + intval($identificacion[3]) + intval($identificacion[5]) + intval($identificacion[7]);

            // Agrupamos los impares, los multiplicamos por un factor de 2
            // Si el número resultante es mayor que 9, le restamos 9 al resultado
            $numero1 = intval($identificacion[0]) * 2;
            if ($numero1 > 9) {
                $numero1 -= 9;
            }

            $numero3 = intval($identificacion[2]) * 2;
            if ($numero3 > 9) {
                $numero3 -= 9;
            }

            $numero5 = intval($identificacion[4]) * 2;
            if ($numero5 > 9) {
                $numero5 -= 9;
            }

            $numero7 = intval($identificacion[6]) * 2;
            if ($numero7 > 9) {
                $numero7 -= 9;
            }

            $numero9 = intval($identificacion[8]) * 2;
            if ($numero9 > 9) {
                $numero9 -= 9;
            }

            $impares = $numero1 + $numero3 + $numero5 + $numero7 + $numero9;

            // Suma total
            $suma_total = $pares + $impares;

            // Extraemos el primer dígito de la suma (sumaPares + sumaImpares)
            $primer_digito_suma = intval(substr(strval($suma_total), 0, 1));

            // Obtenemos la decena inmediata
            $decena = ($primer_digito_suma + 1) * 10;

            // Obtenemos la resta de la decena inmediata - suma
            // Si la suma nos da 10, el décimo dígito es cero
            $digito_validador = $decena - $suma_total;
            if ($digito_validador == 10) {
                $digito_validador = 0;
            }

            // Validamos que el dígito validador sea igual al último dígito de la identificación
            if ($digito_validador === intval($ultimo_digito)) {
                return true; // Identificación válida
            } else {
                return false; // Identificación inválida
            }
        } else {
            return false; // Región no válida
        }
    } else {
         false; // Longitud incorrecta de la identificación
    }
}
               


  
$cedulaValida = validar_identificacion_ecuador($identificacion);
if ( $cedulaValida != true ) {
echo "<h1>Cédula válida</h1>";
} else {
    echo "<h1>Cédula inválida</h1>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
