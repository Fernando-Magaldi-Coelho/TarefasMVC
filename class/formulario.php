<form method="POST">
    <input type="hidden" name="id" value="<?php echo $tarefa->getId();?>">
    
        <fieldset>
            <input type="hidden" name="id"
                value="<?php echo $tarefa->getId(); ?>"> </input>
                <legend><?php echo ($tarefa->getId() != NULL) ? 'Editar Tarefa' : 'Nova Tarefa'; ?></legend>

            <label> <?php if($tem_erros && isset($erros_validacao['nome'])) : ?>
                <span class="erro"><?php echo $erros_validacao['nome']; ?>
            </span>

            <?php endif; ?>
             
            Tarefa: <input type="text" name="nome" 
            value="<?php echo $tarefa->getNome(); ?>"></label>
            
            <label>Descricao: <input type="text" name="descricao" 
            value="<?php echo $tarefa->getDescicao(); ?>" ></label>

            <label>Prazo:
                <input type="text" name="prazo" 
                value="<?php echo traduz_data_para_tela($tarefa->getPrazo()); ?>">
            </label>

            <fieldset>
                <legend>Prioridade:</legend>
                <label>

    <input type="radio" name="prioridade" 
    value="1" <?php echo ($tarefa->getPrioridade() == 1) ? 'checked' : ''; ?>>
    Baixa

</label>

<label>

    <input type="radio" name="prioridade" 
    value="2" <?php echo ($tarefa->getPrioridade() == 2) ? 'checked' : ''; ?>>
    Média

</label>

<label>

    <input type="radio" name="prioridade" 
    value="3" <?php echo ($tarefa->getPrioridade() == 3) ? 'checked' : ''; ?>>
    Alta

</label>
            </fieldset>

            <label>Tarefa Concluída

    <input type="checkbox" name="concluida" 
    value="1" <?php echo ($tarefa->getConcluida() == 0) ? 'checked' : ''; ?>>

</label>



            <input type="submit" value="<?php echo ($tarefa->getId() == NULL) ? 'Cadastrar' : 'Atualizar'; ?>">
            <?php if($tarefa->getId() != NULL) : ?>
            <a class="apagarCon" href="excluir.php?concluido=<?php echo $tarefa->getConcluida(); ?>">Apagar Concluido</a>
            <?php endif; ?>

            <style>
                .apagarCon{
                border: 1px solid #284970;
                padding: 10px;
                border-radius: 10px;
                color: white;
                left: 10rem;
                position: relative;
                bottom: .5rem;
                background-color: #284570;
                transition: background-color .3s linear;
                }

                .apagarCon:hover{
                    color: black;
                    background-color: transparent;
                    border: 1px solid;

                }
                a{
                    text-decoration: none;
                }
            </style>
            
        </fieldset>

    
    </form>
   


    