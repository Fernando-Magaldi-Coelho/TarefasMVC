<form method="POST">
        <fieldset>
            <input type="hidden" name="id"
                value="<?php echo $tarefa['id']; ?>"> </input>
                <legend><?php echo ($tarefa['id'] > 0) ? 'Editar Tarefa' : 'Nova Tarefa'; ?></legend>

            <label>Tarefa: <input type="text" name="nome" value="<?php echo $tarefa['nome']; ?>"></label>
            
            <label>Descricao: <input type="text" name="descricao" value="<?php echo $tarefa['descricao']; ?>" ></label>

            <label>Prazo:
                <input type="text" name="prazo" value="<?php echo traduz_data_para_tela($tarefa['prazo']); ?>">
            </label>

            <fieldset>
                <legend>Prioridade:</legend>
                <label>
    <input type="radio" name="prioridade" value="1" <?php echo ($tarefa['prioridade'] == 1) ? 'checked' : ''; ?>>
    Baixa
</label>
<label>
    <input type="radio" name="prioridade" value="2" <?php echo ($tarefa['prioridade'] == 2) ? 'checked' : ''; ?>>
    Média
</label>
<label>
    <input type="radio" name="prioridade" value="3" <?php echo ($tarefa['prioridade'] == 3) ? 'checked' : ''; ?>>
    Alta
</label>
            </fieldset>
            <label>Tarefa Concluída
    <input type="checkbox" name="concluida" value="1" <?php echo ($tarefa['concluida'] == 0) ? 'checked' : ''; ?>>
</label>


            <input type="submit" value="<?php echo ($tarefa['id']>0) ? 'Atualizar' : 'Cadastrar'; ?>">
            <?php if($tarefa['id'] == 0) : ?>
            <a class="apagarCon" href="excluir.php?concluido=<?php echo $tarefa['concluido']; ?>">Apagar Concluido</a>
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
   


    