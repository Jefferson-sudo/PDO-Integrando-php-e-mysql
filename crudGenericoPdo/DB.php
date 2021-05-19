<?php

/* Description of DB -> Class responsible for creating, reading, updating and deleting data in the database. 
 * Descrição do BD -> Classe responsavel por criar, ler, atualizar e deletar dados no bando de dados. 
 * @author Jefferson Mateus S. D. 
 */

//Chama o arquivo exigido config.php 
//Calls the required config.php file
require_once 'config.php';



//Criando a classe DB 
//Creating the DB class
class DB {

    private static $db = null; //Pega instancia da classe
    private static $pdo;       //Pega instancia do PDO
    
    //METADOS

    //Construtor
    final private function __construct() {
        //Tratando exeções
        try {
            self::getDb(); //Chama o metado getDb -> linha 44
        } catch (Exception $exc) {
            $exc->getMessage();//Exeção
        }
    }

    // Padrão Singleton
    /* Este padrão garante a existência de apenas uma instância de uma classe*/
    public static function getInstance() {
        if (self::$db == null) {
            self::$db = new self();//Chama construtor da classe
        }
        return self::$db;
    }

    
    //Cria uma nova instancia do pdo
    public function getDb() {
        if (self::$pdo == null) { //Self por que esta pegando um atributo estático. Testa se não existir PDO
            //Cria conexao com banco de dados -> Creating   database connection
            self::$pdo = new PDO("mysql:host=" . SERVIDOR. ";dbname=" . BANCO, USUARIO, SENHA, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAME utf8")); //Atributo pdo recebe objeto com os respectivos valores na linha 19
        }
        return self::$pdo;
    }

}
