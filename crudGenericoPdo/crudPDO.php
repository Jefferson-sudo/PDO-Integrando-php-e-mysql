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

        
/*
        function alterar ($tabela, $dados, $condicao){

            foreach($dados as $chave=>$valor){
                $parametro .="$chave=:$chave, ";
            }
            
            $parametro = rtrim($parametro, ",");
            return $parametro;

            $sql = " update " .$tabela. " set " .$parametro. " where " .$condicao;
            return $sql;
        }*/