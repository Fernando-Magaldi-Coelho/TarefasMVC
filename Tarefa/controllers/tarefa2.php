<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "banco.php";
include "helper.php";

$id = $_GET['id'];
$tarefa = busca_tarefa($conexao, $_GET['id']);


if(! is_array($tarefa)){
    http_response_code(404);
    echo "Tarefa n foi encontrada.";
    die();
}

$tem_erros = false;
$erros_validacao = [];

//1024 bytes = 1kb
//1024 kbytes = 1megabtye

if(tem_post()){
    $tarefa_id = $_POST['tarefa_id'];

    if(isset($_FILES['anexo'])){
        $anexo = $_FILES['anexo'];
    
        if($anexo['error'])
            die("falha ao enviar arquivo"); 
    
        if($anexo['size'] > 2097152)
            die("arquivo muito grande maximo 2 megabyte");
        
            $pasta = "anexos/";
    
            $nome_anexo = $anexo['name']; 
            $novo_nome = uniqid(); 
            $extencao = strtolower(pathinfo($nome_anexo, PATHINFO_EXTENSION)); 
    
            if($extencao != "jpg" && $extencao != "zip" && $extencao != "pdf")
                die("tipo de arquivo nao aceito");
    
            $path = $pasta . $novo_nome . "." .$extencao;
            
    
            $resultado = move_uploaded_file($anexo['tmp_name'], $path);
            
           
            if($resultado){ 
    
                $info = [
                    'path' => "$path",
                    'nome' => "$nome_anexo",
                    'id' => "$id"
                ];
    
                if(gravar_anexo($conexao, $info))
    
                echo "<p>arquivo enviado com sucesso</p>";
            
            }else 
                    echo "falha ao enviar arquivo";
        }

}


include "template_tarefa2.php";

?>
<style>

    table{
        border: 2px solid black;
        width: 500px;
        
    }
    
    th, td{
        border: 2px solid black;
    }

    img{
        height: 70px;
    }

</style>
<br>
<table>

<tr>
    <th>
        preview
    </th>   
    <th>
        nome
    </th>
    <th>
        data
    </th>
</tr>

<?php

$query = $conexao->query("SELECT * FROM aqruivos WHERE id_user = $id");

    while($anexo = $query->fetch_assoc()){
    

?>

<tr>
    <td>
        <img src="<?php echo $anexo['path']; ?>">
    </td>
    <td>
        <a href="<?php echo $anexo['path']; ?>"><?php echo $anexo['nome']; ?></a>
    </td>
    <td>
        <?php echo $anexo['data_up']; ?>
    </td>
</tr>

<?php
}?> 

</table>
