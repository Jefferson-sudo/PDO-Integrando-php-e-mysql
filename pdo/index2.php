<?php
/* Estudando PDO com tratamento de exeções, metado prepare para sql injection
 * Aula 15 Metado Prepare
 * Dev. Jefferson Mateus S. D.
 */

//Exception handling

try{//What should be performed
    
   $conexao = new PDO("mysql:host=localhost;dbname=estudoPDO", "root", "");//Creating   database connection
   
   $id = $_GET['id']; //Receives the id by url
   
   //Execuntando uma sql usando o prepare e excute().
   
   $sql = "select * from cliente where id_cliente = ?";
   $statement = $conexao->prepare($sql);//Prepare SQL
   $statement->bindValue(1,$id);//Faz com que o '?' na linha 17 seja substituido pela variavel $id --Sql injection handling.
   $statement->execute(); //Run sql
   $linha = $statement->fetchAll();
   
   echo "<pre>";
   print_r($linha);
   echo "</pre>";
   
}  catch(PDOException $erro) {//In case of error
    
    $erro->getCode();//Returns error message
    
}

