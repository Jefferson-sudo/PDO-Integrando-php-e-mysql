<?php

//Ultima aula - Criando a funcao consultar
//OBS. Esta tenho um erro com a função pois quando passo o array nao funciona como deveria e quando passo o PDO::FETCH_OBJ, não retorna nehum valor sequer
include('DB.php'); 
include('crudPDO.php');
//Include é uma função do PHP que permite a inclusão do conteúdo de um outro arquivo no arquivo PHP atual

//$conn = DB::getInstance(); //Abre conexão com o BD chamando o metado estatico da classe DB
echo "<pre>";

$dados = array ("nome"=> "Pedro Homem Rodrigues", "email"=> "pedrohomem@pedrohomem.com", "fone"=> "31331311");
//print_r(inserir("cliente", $dados));

//print_r(alterar("cliente", $dados, " id_cliente=1")); 

var_dump(consultar("SELECT * FROM cliente", array("email"=>"monica@monica.com"), false));
echo"</pre>";
?>