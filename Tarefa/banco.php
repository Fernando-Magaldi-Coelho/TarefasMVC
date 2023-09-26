<?php

    $bdServidor = 'localhost';
    $bdUsuario = 'root';
    $bdSenha = '';
    $bdBanco = 'back-end';

    $conexao = mysqli_connect(
        $bdServidor, $bdUsuario, $bdSenha, $bdBanco
    );

    if(mysqli_connect_errno()){
        echo "Não foi possivel conectar. Erro:";
        echo mysqli_connect_error();
        die();
    }

    function gravar_anexo($conexao, $info){

        $data = date('d/m/y');
    
        $conexao->query("INSERT INTO aqruivos (path, data_up, nome, id_user) 
        VALUES ('{$info['path']}',
                '$data',
                '{$info['nome']}',
                {$info['id']})");
    
        if($conexao->error){
            return false;
        } else{
            return true;
        }
        die();
    
    }

    function buscar_anexo($conexao, $id){
        $sqlBusca = "SELECT * FROM aqruivos WHERE id = $id";
        $resultado = mysqli_query($conexao, $sqlBusca);
        return mysqli_fetch_assoc($resultado);
    }

    function remover_anexo($conexao, $id){
        $sqlRemover = "DELETE FROM anexos WHERE id_user = {$id}";
        mysqli_query($conexao, $sqlRemover);
    }

    // function buscar_anexo($conexao, $tarefa_id){
    //     $sqlBusca = "SELECT * FROM anexos WHERE tarefa_id = {$tarefa_id}";
    //     $resultado = mysqli_query($conexao, $sqlBusca);
    //     $anexos = array();

    //     while ($anexo = mysqli_fetch_assoc($resultado)){
    //         $anexos[] = $anexo;
    //     }
    //     return $anexos;
    // }

    function busca_tarefas($conexao){
        $sqlBusca = "SELECT * FROM tarefas";
        $resultado = mysqli_query($conexao, $sqlBusca);

        $tarefas = [];

        while ($tarefa = mysqli_fetch_assoc($resultado))
        {
            $tarefas[] = $tarefa;
        }
        return $tarefas;
    }

    function gravar_tarefa($conexao, $tarefa){
        if ($tarefa['prazo'] == '') {
            $prazo = 'NULL';
        } else {
            $prazo = "'{$tarefa['prazo']}'";
        }
        
        $sqlGravar = "
            INSERT INTO tarefas
            (nome, descricao, prazo, prioridade, concluida)
            VALUES
            (   
                '{$tarefa['nome']}',
                '{$tarefa['descricao']}',
                $prazo,
                '{$tarefa['prioridade']}',
                '{$tarefa['concluida']}'
            )";
        

        mysqli_query($conexao, $sqlGravar);

        Header("Location: tarefa.php");
    }

    function busca_tarefa($conexao, $id){
        $sqlBusca = "SELECT * FROM tarefas where id = '$id'";
        $resultado = mysqli_query($conexao, $sqlBusca);

        return mysqli_fetch_assoc($resultado);
    }

    function editar_tarefa($conexao, $tarefa){
        if($tarefa['prazo'] == ''){
            $prazo = 'NULL';
        } else {
            $prazo = "'{$tarefa['prazo']}'";
        }

        $sqlEditar = "
            UPDATE tarefas SET
                nome        = '{$tarefa['nome']}',
                descricao   = '{$tarefa['descricao']}',
                prioridade  = '{$tarefa['prioridade']}',
                prazo       = '{$tarefa['prazo']}',
                concluida   = '{$tarefa['concluida']}'
            WHERE id = {$tarefa['id']}
        ";

     

        mysqli_query($conexao, $sqlEditar);
    }   



?>