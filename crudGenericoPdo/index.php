<?php
/* Aula 05 Testando a classe DB
 */

include('DB.php'); //Include é uma função do PHP que permite a inclusão do conteúdo de um outro arquivo no arquivo PHP atual

$conn = DB::getInstance(); //Abre conexão com o BD chamando o metado estatico da classe DB
var_dump($conn);

