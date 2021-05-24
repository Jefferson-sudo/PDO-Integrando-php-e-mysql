<?php

   //Funcao para inserção de dados no banco de dados
    function inserir($tabela, array $dados){
    
        $conn    = DB::getInstance()->getDb(); //Abre a conexão

        $campos  = implode(", ",array_keys($dados));
        $valores = ":" . implode(", :" , array_keys($dados));

        $sql     = "INSERT INTO {$tabela} ({$campos}) VALUES ({$valores})";
        $stmt    = $conn->prepare($sql);
        foreach ($dados as $chave=>$valor){
            $tipo = (is_int($valor))? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue(":$chave", $valor, $tipo);
        } 
        if($stmt->execute()){
            return $conn->lastInsertId();
        }
        
    return $conn->false();
}

//Funcao alterar


    function alterar ($tabela, $dados, $condicao){
        $conn    = DB::getInstance()->getDb(); //Abre a conexão
        
        $parametro = null;
        
        foreach($dados as $chave=>$valor){
            $parametro .="$chave=:$chave,";
        }
        $parametro = rtrim($parametro, ","); //rtrim -> Exclui o ultimo caracter da direita para a esquierda.
        $sql = "UPDATE {$tabela} SET {$parametro} WHERE {$condicao}";//Montando sql
        $stmt = $conn->prepare($sql);//Preparando sql
        
        //Varrendo os dados
        foreach ($dados as $chave=>$valor){
            $tipo = (is_int($valor))? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue(":$chave", $valor, $tipo);
        } 
        
        return $stmt->execute();//Retorna e excuta o sql
    }