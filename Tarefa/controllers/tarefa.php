<?php        


$exibir_listagem = true;
$tem_erros = false;
$erros_validacao = [];

require '../models/Tarefa.php';

$tarefa = new Tarefa();
$tarefa->setPrioridade(1);

if (tem_post()) {

   if(array_key_exists('nome', $_POST) && $_POST['nome'] != ''){
    $tarefa->setNome($_POST['nome']);
   } else{
    $tem_erros = true;
    $erros_validacao['nome'] = 'Nome ta errado em';
   }

    if(array_key_exists('descricao', $_POST)){
            $tarefa->setDescricao($_POST['descricao']);
        }else{
            $tarefa->setDescricao('');
        }

        if(array_key_exists('prazo', $_POST) && strlen($_POST['prazo'])>0){
            if(valida_data($_POST['prazo'])){
            $tarefa->setPrazo(traduz_data_para_banco($_POST['prazo']));
            }
        }
        else{
            $tem_erros = true;
            $erros_validacao['prazo'] = 'O prazo ta errado besta';
        }

        $tarefa->setPrioridade($_POST['prioridade']);

        if(array_key_exists('concluida', $_POST)){
        $tarefa->setConcluida(true);
        } else {
            $tarefa->setConcluida(false);
        }

        if(! $tem_erros()){
            $RepositorioTarefas->salvar($tarefa);
            header("Location: index.php?rota=tarefas");

        }
      
  }

$tarefas = $Repositorio_Tarefas->buscar();

?>