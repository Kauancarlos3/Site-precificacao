<?php
        session_start();

        if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM' ){
        header('Location: index.php?login=erro2');
        };

include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se o ID da receita está presente no formulário
    if (isset($_POST['id_receita'])) {
        $id_receita = $_POST['id_receita'];

        // Excluir os itens da tabela tb_receita
        $sqlDeletereceita = "DELETE FROM tb_receita WHERE id_receita = $id_receita";
       
        $resultado =  mysqli_query($conecta, $sqlDeletereceita);

        if($resultado){
            header('Location: lista_receitas.php');
        }else {
            echo 'não foi possivel excluir os dados';
        }
       
    } else {
        echo 'Nenhum ID de receita foi fornecido.';
    }
} else {
    echo 'Requisição inválida.';
}

?>
