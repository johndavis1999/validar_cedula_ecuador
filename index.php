<?php 
$identificacion = '0931811087';
function validar_identificacion_ecuador($identificacion) {
    $cedula = trim($identificacion);
    if (strlen($cedula) == 10 && is_numeric($cedula)) {
        $cedula = $cedula;
        $digito_region = substr($cedula, 0, 2);
        if ($digito_region >= 1 && $digito_region <= 24) {
            $ultimo_digito = substr($cedula, -1, 1);
            $num_pares = 0;
            $suma_impares = 0;
            for ($i = 0; $i < 9; $i += 2) {
                $num_pares += substr($cedula, $i, 1);
            }
            for ($i = 1; $i < 9; $i += 2) {
                $suma_impares += substr($cedula, $i, 1);
            }
            $suma_total = ($num_pares * 2) + $suma_impares;
            $primer_digito_suma = substr($suma_total, 0, 1);
            $decena = ($primer_digito_suma + 1) * 10;
            $digito_verificador = $decena - $suma_total;
            if ($digito_verificador == 10) {
                $digito_verificador = 0;
            }
            if ($digito_verificador == $ultimo_digito) {
                return true;
            }
        }
    }
    return false;
}

$cedulaValida = validar_identificacion_ecuador($identificacion);
if ( $cedulaValida == false ) {
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
