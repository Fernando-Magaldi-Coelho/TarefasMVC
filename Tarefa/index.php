<?php 

// criar um objeto da classe repositoriostarefa 
// verificar qual rota deve ser usada para tratar requisicoes 
//incluir arquiv

require "config.php";
require "helpers/helper.php";
require "controllers/tarefa.php";
require "controllers/tarefa2.php";
require "./anexos";


$repositorio_tarefas = new RepositorioTarefas($pdo);

$rota = "tarefas";

if(array_key_exists($rota, $_GET)){
    $rota = (string) $_GET["rota"];
}

if(is_file("controllers/{$rota}.php")){
    require "controllers/{$rota}.php";
} else{
    require "controllers/404.php";
}


?>