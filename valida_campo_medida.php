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
                    include ('cadastro_banco_igredientes_medidas.php');
                }else{
                    header('Location: cadastrar_ingredientes.php?erro=opc');
                }
                break;
    
            case 'Kg':
                if($opc_qtdUsada == 'Kg' || $opc_qtdUsada == 'g'|| $opc_qtdUsada == 'mg'){
                    include ('cadastro_banco_igredientes_medidas.php');
                }else{
                    header('Location: cadastrar_ingredientes.php?erro=opc');
                }
                break;
            case 'g':
                if($opc_qtdUsada == 'g' || $opc_qtdUsada == 'mg'){
                    include ('cadastro_banco_igredientes_medidas.php');
                }else{
                    header('Location: cadastrar_ingredientes.php?erro=opc');
                }
                break;
            case 'mg':
                if($opc_qtdUsada == 'mg'){
                    include ('cadastro_banco_igredientes_medidas.php');
                }else{
                    header('Location: cadastrar_ingredientes.php?erro=opc');
                }
                break;
            case 'L':
                if($opc_qtdUsada == 'L' || $opc_qtdUsada == 'mL'){
                    include ('cadastro_banco_igredientes_medidas.php');
                }else{
                    header('Location: cadastrar_ingredientes.php?erro=opc');
                }
                break;
            case 'mL':
                if($opc_qtdUsada == 'mL'){
                    include ('cadastro_banco_igredientes_medidas.php');
                }else {
                    header('Location: cadastrar_ingredientes.php?erro=opc');
                }
                break;
        }; 
    }else {
        header('Location: cadastrar_ingredientes.php?erro=camponull');
    }
    
 ?>