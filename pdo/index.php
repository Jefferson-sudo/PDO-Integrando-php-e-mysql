<?php

/* Proxima aula -> Aula 15 Metado prepare
 * Curso de conexão com banco de dados com PDO - Formação PHP
 * Aluno: Jefferson Mateus da Silva Diass
 * Prof: Manoel Jailton
 */

//Tratamento de exeções com try e catch
//Exception handling with try and  catch

try {//Oque deve ser executado
    
    $conexao = new \PDO("mysql:host=localhost;dbname=estudoPDO", "root", ""); //Creating database connection
    //The connection must receive the bank, host, database name, user and password


    /* Estudando o exec 
     * The EXEC method returns the number of rows that were affected in the database
     */

    //$sql = "insert into cliente (nome, email) values ('Mateus', 'Mateus@mateus.com.br')"
    //$sql = "update cliente set ativo='S' where nome like '%a%'"; //Atige na coluna 'ativo' as linhas que possuem no 'nome' a letra a
    //$sql = "delete from cliente where email='jefferson@jefferson.com.br'"; //Deleta toda linha que possui esse endereco

    //$resultado = $conexao->exec($comando); //O comando sql e passado para a conexão. Exec observa quantas linhas foram afetadas pelo comando
    
    /*Emprimindo dados do BD*/
    
    $sql = "select * from cliente";
    $statement = $conexao ->query($sql);
    $linha = $statement->fetchAll();
    
    //Imprime resultado
    
    //Imprime todos os nomes da tabela
    for ($i = 0; $i < $statement->rowCount(); $i ++){ //rowCount - Returns the number of rows affected by the last SQL statement
        echo ($linha[$i]['nome']."</br>");
     
    }
    
    echo"<pre>";
    print_r($linha); //Print the object
    echo '</pre>';
   
} catch (PDOException $e) {//Oque deve ser executado caso tenha algum erro (Exeção)
    
    echo'Não foi possivel conectar com o banco de dados :(</br>Erro ' . $e->getCode() . "</br>";
    //Mensagem de erro personalisada + a do metado getCode que retorna o codigo do erro
}


echo "Hello, Word!";

