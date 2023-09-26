<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div="bloco_principal">
    <h1>Tarefa: <?php echo $tarefa['nome']; ?></h1>
    <p>
        <a href="tarefa.php">Voltar para a lista de tarefa</a>
    </p>
    <p>
        <strong>Concluida: </strong>
        <?php echo traduz_concluida($tarefa['concluida']);?>
    </p>

    <p>
        <strong>Descrição: </strong>
        <?php echo ($tarefa['descricao']);?>
    </p>

    <p>
        <strong>Prazo: </strong>
        <?php echo traduz_data_para_tela($tarefa['prazo']);?>
    </p>

    <p>
        <strong>Prioridade: </strong>
        <?php echo traduz_prioridade($tarefa['prioridade']);?>
    </p>

    <h2>Anexos</h2>

    <?php   
    if(isset($anexos)) : ?>
    
    <table>
        <tr>
            <th>Arquivos</th>
            <th>Opções</th>
        </tr>
        <?php foreach ($anexos as $anexo) : ?>
            <tr>
                <td><?php echo $anexo['nome'] ;?></td>
                <td>
                    <a href="anexos/<?php echo $anexo['arquivo'];?>">Download</a>
                    <a href="remover_anexo.php?id=<?php echo $anexo['id'];?>">Remover</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>
    
    <?php else : ?>
        <p>Tarefa sem anexos.</p>
        <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Novo anexo</legend>
            <input type="hidden" name="tarefa_id" value="<?php echo $tarefa['id']; ?> /">

            <label>
                <?php if($tem_erros && isset($erros_validacao['anexo'])) : ?>
                    <span class="erro"><?php echo $erros_validacao['anexo'];?></span>
                    <?php endif; ?>
                <input type="file" name="anexo">
            </label>
            <input type="submit" name="gravar" >
        </fieldset>
    </form>

</div>


    
</body>
</html>