<?php

//Permite el intercambio de información entrante de Vue a Xampp
 
$dominioPermitido = "http://localhost:8080";
header("Access-Control-Allow-Origin: $dominioPermitido");
header("Access-Control-Allow-Headers: content-type");
header("Access-Control-Allow-Methods: OPTIONS,GET,PUT,POST,DELETE");