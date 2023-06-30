<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM' ){
    header('Location: index.php?login=erro2');
    };

    
    include('conexao.php');


$nome = $_POST['nome'];
$rendimento = $_POST['rendimento'];
$porcentagem = $_POST['porcentagem'];
$custo = $_POST['custo'];
$valor_cobrado = $_POST['valor_cobrado'];


// Consulta SQL para inserir os dados no banco de dados
$sql = "INSERT INTO tb_receita (nome, rendimento, porcentagem, custo_receita, valor_cobrado) VALUES ('$nome', '$rendimento', '$porcentagem', '$custo', '$valor_cobrado')";

// Executa a consulta
if (mysqli_query($conecta, $sql)) {
    echo header('Location: lista_receitas.php');
} else {
    echo "Erro ao inserir dados: " . mysqli_error($conn);
}

?>