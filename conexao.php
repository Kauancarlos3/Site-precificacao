<?php

    $caminho = "localhost";
    $usuario = "root";
    $senha = "usbw";
    $banco_dados = "db_precificacao";

    $conecta = mysqli_connect($caminho,$usuario,$senha,$banco_dados);

    if($conecta) {
        mysqli_query($conecta,"SET lc_time_names = 'pt_BR'");
        mysqli_set_charset($conecta,"utf8");
        
    } else {
        echo "Falha ao tentar se conectar!";
    };

?>