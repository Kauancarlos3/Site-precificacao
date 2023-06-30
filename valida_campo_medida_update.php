<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM' ){
    header('Location: index.php?login=erro2');
    };


    if(!empty($_POST['nome']) && !empty($_POST['custoTotal']) && !empty($_POST['qtdComprada']) && !empty($_POST['qtdUsada'])){
        include('conexao.php');
    //tb_medida 
    $opc_qtdComprada = $_POST['opc_qtdComprada'];
    $opc_qtdUsada = $_POST['opc_qtdUsada'];
    //tb_ingredientes 
    
    

    switch($opc_qtdComprada){
        case 'Unidade':
            if($opc_qtdComprada ==  $opc_qtdUsada){
                include ('upadate_ingredientes.php');
            }else{
                header('Location: editar_ingredientes.php');
            }
            break;

        case 'Kg':
            if($opc_qtdUsada == 'Kg' || $opc_qtdUsada == 'g'|| $opc_qtdUsada == 'mg'){
                include ('upadate_ingredientes.php');
            }else{
                header('Location: editar_ingredientes.php');
            }
            break;
        case 'g':
            if($opc_qtdUsada == 'g' || $opc_qtdUsada == 'mg'){
                include ('upadate_ingredientes.php');
            }else{
                header('Location: editar_ingredientes.php');
            }
            break;
        case 'mg':
            if($opc_qtdUsada == 'mg'){
                include ('upadate_ingredientes.php');
            }else{
                header('Location: editar_ingredientes.php');
            }
            break;
        case 'L':
            if($opc_qtdUsada == 'L' || $opc_qtdUsada == 'mL'){
                include ('upadate_ingredientes.php');
            }else{
                header('Location: editar_ingredientes.php');
            }
            break;
        case 'mL':
            if($opc_qtdUsada == 'mL'){
                include ('upadate_ingredientes.php');
            }else {
                header('Location: editar_ingredientes.php');
            }
            break;
    };
    }else {
        header('Location: cadastrar_nova_receita.php?erro=camponull');
        exit;
    }
    
 ?>