<?php

    include('conexao.php');


    if (isset($_POST['cpf'])){

        $cpf = $_POST['cpf'];
        $senha1 = $_POST['senha1'];
        $senha2 = $_POST['senha2'];

        if(!empty($senha1) && !empty($senha2)){
            if($senha1 === $senha2 ){
                $sql = "UPDATE tb_cadastro SET senha = '$senha1' WHERE cpf_cnpj = $cpf";

                $resultado = mysqli_query($conecta, $sql);
                if ($resultado) {

                    header('Location: index.php?s=password');
                    
                }else{
                    header('Location: recuperar-senha.php?e=o');
                }
            }else{
                header('Location: recuperar-senha.php?e=nigu');
            }
            
        }else{
            header('Location: recuperar-senha.php?e=o');
        }

    }else {
        header('Location: recuperar-senha.php?e=o');
    };
?>