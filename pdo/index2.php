<?php
/* Estudando PDO com tratamento de exeções, metado prepare para sql injection
 * Aula 15 Metado Prepare
 * Dev. Jefferson Mateus S. D.
 */

//Exception handling

try{//What should be performed
    
   $conexao = new PDO("mysql:host=localhost;dbname=estudoPDO", "root", "");//Creating   database connection
   
   $produto = $_GET['produto']; //Receives the id by url
   $preco = $_GET['preco'];
   
   //Execuntando uma sql usando o prepare e excute().
   
   $sql = "INSERT INTO produto (produto, preco)values (?, ?)";
   $statement = $conexao->prepare($sql);//Prepare SQL
   $statement->bindValue(1,$produto);//Faz com que o '?' na linha 18 seja substituido pela variavel $produto --Sql injection handling.
   $statement->bindValue(2, $preco);
   
   //Imprime tudo da tabela
   $stm=$conexao->query("select * from produto"); //Run sql
   $linha = $stm->fetchAll();
   
   echo "<pre>";
   print_r($linha);
   echo "</pre>";
   
}  catch(PDOException $erro) {//In case of error
    
    $erro->getCode();//Returns error message
    
}