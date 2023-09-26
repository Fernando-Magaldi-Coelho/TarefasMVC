<?php

$mysqli = mysqli_connect(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

if($mysqli->connect_errno){
    echo "N deu não pra conectar foi mal :(";

    echo mysqli_connect_errno();
    die();
}