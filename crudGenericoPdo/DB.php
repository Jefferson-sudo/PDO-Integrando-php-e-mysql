<?php /** * Description of DB -> Class responsible for creating, reading, updating and deleting data in the database. * Descrição do BD -> Classe responsavel por criar, ler, 
 atualizar e deletar dados no bando de dados. * * @author Jefferson Mateus S. D. */
//Chama o arquivo exigido config.php Calls the required config.php file
require_once 'config.php';
//Criando a classe DB Creating the DB class
class DB { private static $db = null; private static $pdo;
}
