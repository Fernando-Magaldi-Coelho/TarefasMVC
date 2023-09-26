<!DOCTYPE html>
<html lang="pt-BR">
<head>
    
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>   <?php echo ($tarefa['id'] > 0) ? 'Editar Tarefa' : 'Nova Tarefa'; ?>

</h1>

<?php require 'formulario.php' ?>

<?php if($exibir_listagem) : ?>
    <?php require 'listagem.php' ?>
<?php endif; ?>

</body>
</html>