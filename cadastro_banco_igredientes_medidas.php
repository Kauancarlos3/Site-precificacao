<!-- cadastro_banco_igredientes_medidas.php -->
<?php 

 // Consulta SQL para inserir os dados no banco de dados
 $sql = "INSERT INTO tb_medida (qtd_comprada_medida, qtd_usada_medida) VALUES ('$opc_qtdComprada', '$opc_qtdUsada')";
    
 // Executa a consulta
 if (mysqli_query($conecta, $sql)) {

     $medidaId = mysqli_insert_id($conecta);

    if(strpos($_POST['custoTotal'], ',') !== false){
       $_POST['custoTotal'] = str_replace(',', '.', $_POST['custoTotal']);
    };

        $nome = $_POST['nome'];
        $custoTotal = $_POST['custoTotal'];
        $qtdComprada = $_POST['qtdComprada'];
        $qtdUsada = $_POST['qtdUsada'];
        
     // Consulta SQL para inserir os dados no banco de dados
     $sql2 = "INSERT INTO tb_ingredientes (nome, custo_total, qtd_comprada, qtd_usada, id_medida) VALUES ('$nome', '$custoTotal', '$qtdComprada', '$qtdUsada','$medidaId')";
     
     //Executa a consulta
     if (mysqli_query($conecta, $sql2)) {
         header('Location: cadastrar_nova_receita.php');
     } else {
         echo "Erro ao inserir dados: " . mysqli_error($conecta);
     };
     
 } else {
     echo "Erro ao inserir dados: " . mysqli_error($conecta);
 };
?>