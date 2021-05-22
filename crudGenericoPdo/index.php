<?php

// Aula 05 Testando a classe DB
include('DB.php'); 
include('crudPDO.php');
//Include é uma função do PHP que permite a inclusão do conteúdo de um outro arquivo no arquivo PHP atual

//$conn = DB::getInstance(); //Abre conexão com o BD chamando o metado estatico da classe DB


$dados = array ("nome"=> "Pedro Homem", "email"=> "pedrohomem@pedrohomem.com", "fone"=> "31331311");
print_r(inserir("cliente", $dados));
//print_r(alterar("cliente", $dados, "id_cliente = 2"));

?>