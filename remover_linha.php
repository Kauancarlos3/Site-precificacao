<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM' ){
    header('Location: index.php?login=erro2');
    };

    include('conexao.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifique se o ID da medida está presente no formulário
        if (isset($_POST['id_medidas'])) {
            $id_medida = $_POST['id_medidas'];


                // Excluir os itens da tabela tb_ingredientes
                $sqlDeleteIngredientes = "DELETE FROM tb_ingredientes WHERE id_medida = $id_medida";
                mysqli_query($conecta, $sqlDeleteIngredientes);

                // Excluir os itens da tabela tb_medida
                $sqlDeleteMedida = "DELETE FROM tb_medida WHERE id_medida = $id_medida";
                mysqli_query($conecta, $sqlDeleteMedida);

            
                echo header('Location: cadastrar_nova_receita.php');
        } else {
            echo 'Nenhum ID de medida foi fornecido.';
        }
    } else {
        echo 'Requisição inválida.';
    }

?>
