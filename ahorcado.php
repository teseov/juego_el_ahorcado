<?php

function clear(){
    if(PHP_OS === "WINNT"){
        system("cls");
    } else {
        system("clear");
    }
}

$posibles_palabras = ["zaragoza", "bilbao", "soria", "huelva","huesca", "granada", "merida", "guadalajara", "oviedo", "palencia"];


define("MAX_ATTEMPS", 6);

echo "Bienvenido al juego del ahorcado \n";

//inicializar juego
$elige_palabra = $posibles_palabras[rand(0,9) ];
$elige_palabra = strtolower($elige_palabra);
$longitud_palabra = strlen($elige_palabra);
$descubre_letra = str_pad("", $longitud_palabra, "_");
$intentos = 0;

echo $descubre_letra;
echo"\n";

do {
echo " palabra de $longitud_palabra letras \n\n";
echo $descubre_letra . "\n \n";

//pedimo letra al jugador
$letraJugador = readline("Escribe una letra:  ");
$letraJugador = strtolower($letraJugador);


if(str_contains($elige_palabra, $letraJugador)){

    //verificar las ocurrencias de esta letra para reemplazarla
    $offset = 0;
    while( 
        ($posicion_letra = strpos($elige_palabra, $letraJugador, $offset )
        ) !== false ){
        $descubre_letra[$posicion_letra] = $letraJugador;
        $offset = $posicion_letra + 1;
    }

} else {

    clear();
    $intentos++;
    echo "letra incorrecta. " . (MAX_ATTEMPS - $intentos) . " intentos";
    sleep(2);

}

    clear();

} while($intentos < MAX_ATTEMPS && $descubre_letra != $elige_palabra);


clear();

if ($intentos < MAX_ATTEMPS)
    echo "¡¡Felicidades!! Has acertado la palabra.  \n \n";

else
    echo "Se terminaron los intentos. Vuelve a probar \n \n";

 echo "La palabra era $elige_palabra \n";   
 echo "Pero acertastes $descubre_letra \n";

echo "\n";












