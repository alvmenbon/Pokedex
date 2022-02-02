<?php
$url = "https://www.canalti.com.br/api/pokemons.json"; 
$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
$pokemons = json_decode(curl_exec($ch));
?>