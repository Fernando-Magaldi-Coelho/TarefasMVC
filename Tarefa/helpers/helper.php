<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




/*
function traduz_prioridade($codigo) {
    $prioridade = '';

    switch ($codigo){
        case 1:
            $prioridade = 'Baixa';

            case 2:
                $prioridade = 'Media';

                case 3:
                    $prioridade = 'Alta';
    }
    return $prioridade;
}
*/


function  traduz_data_para_banco($data){
    if($data == ""){
        return "";
    }

    $dados = explode("/", $data);
    $data_banco = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
    return $data_banco;
}

function traduz_data_para_tela($data){
    if($data == "" OR $data == "0000-00-00"){
        return "";
    }


    // $dados = explode("-", $data);
    // $data_tela = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
    // return $data_tela;
    $objeto_data = DateTime::createFromFormat('Y-m-d', $data);
    return $objeto_data->format('d/m/Y');
}


function traduz_prioridade($prioridade){
    $prioridade1 = "";

    if($prioridade == 1){
        $prioridade1 = "Baixa";
    } elseif($prioridade == 2){
        $prioridade1 = "Media";
    }elseif($prioridade == 3){
       $prioridade1 = "Alta";
    }
    return $prioridade1;
}

function traduz_data_br_para_objeto($data){
    if ($data == "") {
        return "";
    }
    $dados = explode("/", $data);
    if(count($dados) != 3){
        return $data;
    }

    return DateTime::createFromFormat('d/m/Y', $data);
}


function tem_post(){
    if (count($_POST) > 0){
        return true;
    }
    return false;
}


function valida_data($data){
    $padrao = '/^[0-9]{1,2}/[0-9]{1,2}/[0-9]{4}$/';
    $resultado = preg_match($padrao, $data);

    if(! $resultado){
        return false;
    }

    $dados = explode('/', $data);
    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];

    $resultado = checkdate($mes, $dia, $ano);

    return $resultado;
}


function traduz_concluida($concluida){
    if($concluida == 1){
        return 'Sim';
    }
    return 'Não';
}

function tratar_anexo($anexo){
    $padrao = '/^.+(\.pdf$\.zip$)$/';
    $resultado = preg_match($padrao, $anexo['nome']??'');

    if(! $resultado){
        return false;
    }
    move_uploaded_file($anexo['tmp_nome'], "anexos/{$anexo['nome']}");
    return true;
}


function preparar_corpo_email($tarefa, $anexo){
    // 
    ob_start();

    include 'template_email.php';

    $corpo = ob_get_contents();

    ob_end_clean();

    return $corpo;
}


// function PHPMailer_1($conexao, $tarefa, $anexo){
//     $mail = new PHPMailer(true);

//     if(isset($_POST['enviar'])){

//     try{
//         $mail->SMTPDebug = SMTP::DEBUG_SERVER;
//         $mail->isSMTP(); //chama a função 
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true; //requer authenticação
//         $mail->Username = 'magaldicoelhofernando@gmail.com'; //esse q vai verificar
//         $mail->Password = 'fff333123.F.F';
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//         $mail->Port = 587;
        
//         $mail->setFrom('magaldicoelhofernando@gmail.com');
//         $mail->addAddress('magaldicoelhofernando@gmail.com');

//         $mail->isHTML(true);
//         $mail->Subject = 'Teeessteeee';


//         // $body = "Mensagem enviada de:<br>
//         // Nome: $_POST['nome']<br>
//         // Email: $_POST['email']<br>
//         // Menssagem: <br>$_POST['msg']
//         // ";


//         $mail->Body = '<strong>Teesssteeee</strong>';
//         $mail->AltBody = 'Teesssteeee';
//         $mail->send();

//         if($mail->send()){
//             echo 'Email foi enviado';
//         } else {
//             echo 'Vish faio: {$mail->ErrorInfo}';
//         }

//     } 
// }
// }

// Outra maneira dessa função tem_post

// function tem_post(){
//     return count($_POST) > 0;
// }

?>