<?php


function displayArray($string, $array)
{
    echo "<pre>";
    echo $string;
    echo "</br>";
    print_r($array);
    echo "</pre>";
}

function displayArrayExit($string, $array)
{
    displayArray($string, $array);
    exit;
}


function displayString($string)
{
    echo $string;
    echo "</br>";
}

function displayStringExit($string)
{
    displayStringExit($string);
    exit;
}
