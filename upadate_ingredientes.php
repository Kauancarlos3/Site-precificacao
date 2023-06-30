<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM' ){
    header('Location: index.php?login=erro2');
    };

    include('conexao.php');

    if (isset($_POST['id_medida'])){

        $id = $_POST['id_medida'];

        //Variaves da medidas
        $opc_qtdComprada = $_POST['opc_qtdComprada'];
        $opc_qtdUsada = $_POST['opc_qtdUsada'];

        $sql = "UPDATE tb_medida SET qtd_comprada_medida = '$opc_qtdComprada',
                                     qtd_usada_medida = '$opc_qtdUsada'
                                     WHERE id_medida = $id";

        $resultado = mysqli_query($conecta, $sql);
        if (!$resultado) {
            echo 'Erro na consulta SQL1: ' . mysqli_error($conecta);
            exit;
        }

        
        if($resultado){

            $nome = $_POST['nome'];
            $custoTotal = $_POST['custoTotal'];
            $qtdComprada = $_POST['qtdComprada'];
            $qtdUsada = $_POST['qtdUsada'];

            $sqlIngredientes = "UPDATE tb_ingredientes SET nome = '$nome',
                                                            custo_total = '$custoTotal',
                                                            qtd_comprada = '$qtdComprada',
                                                            qtd_usada = '$qtdUsada'
                                                            WHERE id_ingredientes = $id";
            
            $resultadoingredientes = mysqli_query($conecta, $sqlIngredientes);
            if (!$resultadoingredientes) {
                echo 'Erro na consulta SQL2: ' . mysqli_error($conecta);
                exit;
            }

            if($resultadoingredientes){
                header('Location: cadastrar_nova_receita.php?s=suc');
            }

        }else{
            echo 'resultado medida retornou false';
        };
        
    }else {
        echo 'variavel id não existente';
    };
?>