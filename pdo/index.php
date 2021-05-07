<?php
    //Aula atual   -> Aula 06 Tratamento de exeções  
    //Próxima aula -> Aula 07

    /* Curso de conexão com banco de dados com PDO - Formação PHP
     * Aluno: Jefferson Mateus
     * Prof: Manoel Jailton
     */

    //Tratamento de exeções com try e catch

    try {//Oque deve ser executado
        
    $conexao = new \PDO("mysql:host=localhost;dbname=estudoPDO","root",     "");//Criando conexao com o banco
    //A conexao deve receber o banco, host,    nome do banco,    usuario, e senha
      
    } catch (PDOException $e) {//Oque deve ser executado caso tenha algum erro (Exeção)
        
        echo'Não foi possivel conectar com o banco de dados :(</br>Erro '.$e->getCode()."</br>";
        //Mensagem de erro personalisada + a do metado getCode que retorna o codigo do erro
    }

    
    echo "Hello, Word!";

