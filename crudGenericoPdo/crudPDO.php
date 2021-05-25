<?php
//CRIANDO A FUNCAO CONSULTAR

function consultar($sql, $parametro=array(), $todos=TRUE, $modo=PDO::FETCH_ASSOC){
    $conn = DB::getInstance()->getDb();    //Cria conexao

    $stmt = $conn->prepare($sql);          //Preapara o sql
    foreach ($parametro as $chave=>$valor){//Varre o array dados
        $tipo = (is_int($valor))? PDO::PARAM_INT : PDO::PARAM_STR;
        $stmt->bindValue(":$chave", $valor, $tipo);
    } 
    
    $stmt->execute(); //Executa o comando   
    
    if($todos){
        return $stmt->fetchAll($modo);//Retorna todas as linhas
    }else{
        return $stmt->fetch($modo);   //Retorna somente uma linhas
    }
}

//FUNCAO PARA INSERCAO DE DADOS NA TABELA

    function inserir($tabela, array $dados){
    
        $conn    = DB::getInstance()->getDb(); //Abre a conexão
        
        //Implodir campos e valores
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

    //FUNCAO PARA ALTERAR DADOS NA TABELA

    function alterar ($tabela, array $dados, $condicao){
        $conn    = DB::getInstance()->getDb(); //Abre a conexão
        
        $parametro = null;
        
        //Varrer $dados
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
    
    //FUNCAO PARA EXLCUIR DADOS NA TABELA
    
    function excluir($tabela, $condicao=NULL){
        $conn    = DB::getInstance()->getDb(); //Abre a conexão      
        
        if($condicao!=NULL){
        $condicao = "WHERE ".$condicao;
        
        
        }
        
        $sql = "DELETE FROM {$tabela} {$condicao}";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
        
    }
    

    