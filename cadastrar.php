<?php
    if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['cpf']) && !empty($_POST['senha'])){
        if(strpos($_POST['email'], '@') !== false && strpos($_POST['email'], '.com') !== false){
            if(strlen($_POST['cpf']) === 11 || strlen($_POST['cpf']) === 14){
                if(strlen($_POST['senha']) >= 9){
                    include('conexao.php');
                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $cpf = $_POST['cpf'];
                    $senha = $_POST['senha'];
    
                    // Consulta SQL para verificar se o email já existe no banco de dados
                    $sqlSelect = "SELECT * FROM tb_cadastro WHERE email = '$email' OR cpf_cnpj = '$cpf'";
                    $resultado = mysqli_query($conecta, $sqlSelect);
    
                    if($resultado && mysqli_num_rows($resultado) > 0) {
                        header('Location: cadastro.php?e=e-exis');
                    } else {
                        $sql = "INSERT INTO tb_cadastro (nome, cpf_cnpj, email, senha) VALUES ('$nome', '$cpf', '$email', '$senha')";
                        if (mysqli_query($conecta, $sql)) {
                            header('Location: index.php?login');
                        } else {
                            header('Location: cadastro.php?e=fai') . mysqli_error($conecta);
                        }
                    } 
                }else{
                    header('Location: cadastro.php?e=s-dig');
                }
            } else {
                header('Location: cadastro.php?e=cpfwrong');
            }
        } else {
            header('Location: cadastro.php?e=ewrong');
        }
    } else {
        header('Location: cadastro.php?e=cnull');
    }
?>
