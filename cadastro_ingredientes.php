<?php
    session_start();

    if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM' ){
    header('Location: index.php?login=erro2');
    };


    include('conexao.php');

    $nome = $_POST['nome'];
    $custoTotal = $_POST['custoTotal'];
    $qtdComprada = $_POST['qtdComprada'];
    $qtdUsada = $_POST['qtdUsada'];
    
    // Consulta SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO tb_ingredientes (nome, custo_total, qtd_comprada, qtd_usada) VALUES ('$nome', '$custoTotal', '$qtdComprada', '$qtdUsada')";
    
    //Executa a consulta
    if (mysqli_query($conecta, $sql)) {
    
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conecta);
    };
    
    ?>