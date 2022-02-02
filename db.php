<?php

//Implementación base de datos

class MiBD extends SQLite3{
    function __construct()
    {
        $this->open('pokemon.db');
    }
}

$db = new MiBD();

//Comprueba funcionamiento base de datos
//if(isset($db)){
  //echo "La base de datos funciona";
//}
?>

