<?php
    
    session_start();

    include('conexao.php');

    if(!empty($_POST['email']) || !empty($_POST['senha'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM tb_cadastro WHERE email = '$email'";

        $resultado = mysqli_query($conecta, $sql);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $dados = mysqli_fetch_assoc($resultado);    

            if($dados['email'] == $email && $dados['senha'] == $senha){
                $_SESSION['autenticado'] = 'SIM';
                header('Location: home.php');
                
            }else {
                $_SESSION['autenticado'] = 'NAO';
                header('Location: index.php?login=erro');
            };
        }else{
            $_SESSION['autenticado'] = 'NAO';
            header('Location: index.php?login=erro');
        }
    }else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }
?> 