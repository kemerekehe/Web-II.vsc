<?php
    $celcius = 37.841;

    //Reamur
    $reamur = rtrim(number_format(($celcius * 4) / 5, 4), '0');;
    //Fahrenheit
    $fahrenheit = rtrim(number_format(($celcius * 9/5) + 32, 4), '0');
    //Kelvin
    $kelvin = rtrim(number_format($celcius + 273.15, 4), '0');

    echo "Fahrenheit (F) = " .  str_replace('.', ',',$fahrenheit) . "<br>";
    echo "Reamur (R) = " .  str_replace('.', ',',$reamur) . "<br>";
    echo "Kelvin (K) = " .  str_replace('.', ',',$kelvin) . "<br>";
?>