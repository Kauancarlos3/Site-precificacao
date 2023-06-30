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

</head>

<body class="bg-color-">
  
  <div id="login-page" class="d-flex">
    <!--Início Texto de login-->
    <div class="container align-self-center">
      <div class="row ">
        <div class="col-lg-6 m-1 p-4 d-none d-lg-block">
            <img class="img-fluid" src="img/img-cadastro.png" alt="">
        </div>
        <!--FIM Texto de login-->

        <!--Início Fomulario de login-->
        <div class="col-lg-5 m-1 p-4 box">
            <div>
                <h1 class="h2 mb-5 text-center color-text">Cadastre-se</h1>
              </div>
              <form action="cadastrar.php" method="post">
                <div class="form-group">
                  <label for=""  class="p-1">Nome:</label>
                  <input name ="nome" type="text" class="form-control" id="" placeholder="Nome">
                </div>
                <div class="form-group mt-2">
                  <label for=""  class="p-1">Email:</label>
                  <input name="email" type="text" class="form-control" id="" placeholder="Email">
                </div>
                <div class="form-group mt-2">
                  <label for=""  class="p-1">CPF/CNPJ:</label>
                  <input name="cpf" type="text" class="form-control" id="" placeholder="CPF">
                </div>
                <div class="form-group mt-2">
                  <label for=""  class="p-1">Senha:</label>
                  <input name="senha" type="password" class="form-control" id="" placeholder="Senha">
                </div>

                <?php 
                if(isset($_GET['e']) && $_GET['e'] == 'cnull'){ ?>

                  <div class="text-danger text-center mt-2">
                    Preencha todos os campos.
                  </div>

              <?php }; ?>
              <?php 
                if(isset($_GET['e']) && $_GET['e'] == 'ewrong'){ ?>

                  <div class="text-danger text-center mt-2">
                    Email invalido.
                  </div>

              <?php }; ?>
              <?php 
                if(isset($_GET['e']) && $_GET['e'] == 'cpfwrong'){ ?>

                  <div class="text-danger text-center mt-2">
                    Cpf/Cnpj invalido.
                  </div>

              <?php }; ?>
              <?php 
                if(isset($_GET['e']) && $_GET['e'] == 'e-exis'){ ?>

                  <div class="text-danger text-center mt-2">
                    Email ou CPF/CNPJ já cadastrado!
                  </div>

              <?php }; ?>
              <?php 
                if(isset($_GET['e']) && $_GET['e'] == 'fai'){ ?>

                  <div class="text-danger text-center mt-2">
                    Tente novamente!
                  </div>

              <?php }; ?>
              <?php 
                if(isset($_GET['e']) && $_GET['e'] == 's-dig'){ ?>

                  <div class="text-danger text-center mt-2">
                    Sua senha deve conter no mínimo 9 digitos!
                  </div>

              <?php }; ?>

                <div class="mt-2 text-center">
                  <button type="submit" class="btn btn-warning">Cadastrar</button>
                </div>
              </form>
            </div>
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