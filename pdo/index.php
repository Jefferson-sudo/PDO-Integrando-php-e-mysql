<?php

/* Proxima aula -> Aula 10 Estudando query
 * Curso de conexão com banco de dados com PDO - Formação PHP
 * Aluno: Jefferson Mateus da Silva Diass
 * Prof: Manoel Jailton
 */

//Tratamento de exeções com try e catch

try {//Oque deve ser executado
    
    $conexao = new \PDO("mysql:host=localhost;dbname=estudoPDO", "root", ""); //Criando conexao com o banco
    //A conexao deve receber o banco, host,    nome do banco,    usuario, e senha


    /* Estudando o exec 
     *  O metado exec retorna a quantidade de linhas que foram afetadas no banco de dados  
     */

    //$sql = "insert into cliente (nome, email) values ('Mateus', 'Mateus@mateus.com.br')"
    //$sql = "update cliente set ativo='S' where nome like '%a%'"; //Atige na coluna 'ativo' as linhas que possuem no 'nome' a letra a
    //$sql = "delete from cliente where email='jefferson@jefferson.com.br'"; //Deleta toda linha que possui esse endereco

    //$resultado = $conexao->exec($comando); //O comando sql e passado para a conexão. Exec observa quantas linhas foram afetadas pelo comando
    
    /*Emprimindo dados do BD*/
    
    $sql = 'select * from cliente';
    $stmt = $conexao ->query($sql);
    $resultado = $stmt->fetchAll();
    
    //Imprime resultado
    
    echo"<pre>";
    print_r($resultado);
    echo '</pre>';
   
} catch (PDOException $e) {//Oque deve ser executado caso tenha algum erro (Exeção)
    
    echo'Não foi possivel conectar com o banco de dados :(</br>Erro ' . $e->getCode() . "</br>";
    //Mensagem de erro personalisada + a do metado getCode que retorna o codigo do erro
}


echo "Hello, Word!";

