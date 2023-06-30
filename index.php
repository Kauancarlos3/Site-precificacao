<?php
  include('conexao.php');

  $_SESSION['autenticado'] = 'NÃO';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main - Price</title>

  <link rel="stylesheet" type="text/css" href="css/estilo.css">

  <!--Link Google Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">

  <!--Link Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <!--Link Font Awesome-->
  <script src="https://kit.fontawesome.com/c12f87d07b.js" crossorigin="anonymous"></script>

  <script src="js/script.js"></script>

</head>

<body class="bg-color-">
  
  <div id="login-page" class="d-flex">
    <!--Início Texto de login-->
    <div class="container align-self-center">
      <div class="row ">
        <div class="col-md-6 m-1 p-4">
          <div>
            <p class="text-white text-center display-1">Eleve seus negócios</p>
            <p class="text-white text-center lead">Ajudamos você a calcular os valores e custos de seu trabalho, de
              maneira simples e fácil.</p>
          </div>
        </div>
        <!--FIM Texto de login-->

        <!--Início Fomulario de login-->
        <div class="col-md-5 m-1 p-4 box">
          <!-- Titulo Entrar-->
          <div>
            <p class="h4 text-center color-text">Entrar</p>
          </div>
          <form action="valida_login.php" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email:</label>
              <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email">
              <div id="emailHelp" class="form-text">exemplo@....com</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Senha:</label>
              <input name="senha" type="password" class="form-control" placeholder="Senha">
            </div>

            <?php 
            if(isset($_GET['login']) && $_GET['login'] == 'erro'){ ?>

              <div class="text-danger text-center">
                Usuario ou senha inválido(s)
              </div>

           <?php }; ?>

           <?php 
            if(isset($_GET['login']) && $_GET['login'] == 'erro2'){ ?>

              <div class="text-danger text-center">
                Necessário fazer login.
              </div>

           <?php }; ?>
           <?php 
            if(isset($_GET['s']) && $_GET['s'] == 'password'){ ?>

              <div class="text-success text-center">
                Senha atualizada com sucesso!
              </div>

           <?php }; ?>
           
            <div class="text-center">
              <button type="submit" class="btn btn-lg btn-warning" >Entrar</button>
            </div>
            <div class="text-center mt-4">
            <span><a href="recuperar-senha.php" class="text-light m-3 text-dark">Esqueceu a senha?</a></span>
            <span><a href="cadastro.php" class="text-light m-3 text-dark">Criar nova conta</a></span>
            </div>
          </form>
        </div>
        <!--Início Fomulario de login-->
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>