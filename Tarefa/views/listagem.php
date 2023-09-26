<table>
        <tr>
            <th>Anexo</th>
            <th>Editar</th>
            <th>Liexeira</th>
            <th>Tarefas</th>
            <th>Descrição</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Concluída</th>
        </tr>

        <?php

    $lista_tarefas = busca_tarefas($conexao);

    $tarefa = [
        'id' => 0,
        'nome' => '',
        'descricao' => '',
        'prazo' => '',
        'prioridade' => 1,
        'concluida' => '',
    ];
    
        foreach($lista_tarefas as $tarefa) : ?>
            <tr>
                <td><a href="tarefa2.php?id=<?php echo $tarefa['id']; ?>">Entra ai</a></td>
                <td><a href="editar.php?id=<?php echo $tarefa['id']; ?>"><img class="lapis" src="pencil.svg" alt="Lapis">
            </a></td>
            <td>
    <a href="excluir.php?id=<?php echo $tarefa['id']; ?>" onclick="teste()">
        <img class="Lixeira" src="lixeira.svg" alt="Lixeira">
    </a>
</td>
            </a>
        
                <td><a href="tarefa2.php?id=<?php echo $tarefa['id'] ?>"></a><?php echo $tarefa['nome']; ?></td>
                <td><?php echo $tarefa['descricao']; ?></td>
                <td><?php echo traduz_data_para_tela($tarefa['prazo']); ?></td>
                <td><?php echo traduz_prioridade($tarefa['prioridade']);?></td>
                <td><?php if($tarefa['concluida'] == 1) echo "concluida"; 
                if($tarefa['concluida'] == 0) echo "nao concluida";?></td>
            </tr>
        <?php endforeach; ?>
    </table>



