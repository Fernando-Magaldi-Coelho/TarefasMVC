<?php

session_start();
include "banco.php";
include "helper.php";

$tarefa = $repositorio_tarefas->buscar($_get['id']);

$exibir_listagem = false;
$tem_post = false;
$erros_validacao = [];

if (tem_post()) {

    $tarefa['id'] = $_POST['id'];

    if(isset($_POST['nome']) && strlen($_POST['nome']) > 0){
        $tarefa->setNome($_POST['nome']);
    } else{
        $tem_erros = true;
        $erros_validacao['nome'] = 'O nome da tarefa é obrigatório';
    }

    if(isset($_POST['descricao'])){
        $tarefa->setDescricao($_POST['descricao']);
    } else{
        $tarefa->setDescricao('');
    }

    if(isset($_POST['prazo']) && strlen($_POST['prazo']) > 0){
        $tarefa->setPrazo(traduz_data_para_banco($_POST['prazo']));
    } else{
        $tem_erros = true;
        $erros_validacao['prazo'] = 'Isso ai não é uma data certa não amigo';
    }

    $tarefa->setPrioridade($_POST['prioridade']);

    if(isset($_POST['conluida'])){
        $tarefa->setCocluida(true);
    } else{
        $tarefa->setCocluida(false);
    }

    if(! $tem_erros){
        $repositorio_tarefas->atualizar($tarefa);
        header('Location: index.php?rota=tarefas');
        die();
    }

}

require __DIR__ ."/../views/template.php";
    
$tarefa = busca_tarefa($conexao, $_GET['id']);

$tarefa['nome'] = (array_key_exists('nome', $_POST)) ? $_POST['nome'] : $tarefa['nome'];

$tarefa['descricao'] = (array_key_exists('descricao', $_POST)) ? $_POST['descricao'] : $tarefa['descricao'];

$tarefa['prazo'] = (array_key_exists('prazo', $_POST)) ? $_POST['prazo'] : $tarefa['prazo'];

$tarefa['prioridade'] = (array_key_exists('prioridade', $_POST)) ? $_POST['prioridade'] : $tarefa['prioridade'];

$tarefa['concluida'] = (array_key_exists('concluida', $_POST)) ? $_POST['concluida'] : $tarefa['concluida'];

include "template.php";

?>