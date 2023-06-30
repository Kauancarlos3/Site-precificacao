<?php 
  session_start();

  if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM' ){
  header('Location: index.php?login=erro2');
  };
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>

  <link rel="stylesheet" type="text/css" href="css/estilo2.css">

  <!-- Bootstrap início -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <!-- Bootstrap fim -->

  <!--Link Font Awesome-->
  <script src="https://kit.fontawesome.com/c12f87d07b.js" crossorigin="anonymous"></script>

  <script src="js/script.js"></script>

</head>

<body class="bg-color-">
<?php
  include_once('menu.php');
?>

  <div class="d-flex m-5">
    <div class="container">
      <div class="row">

        <div class="col-md-5">
          <div class="text-center">
            <p class="h6">Cadastrar Ingrediente</p>
          </div>

         <form action="valida_campo_medida.php" method="post">
         <div class="mb-2">
            <label for="" class="form-label">Nome do Ingrediente:</label>
            <input name="nome" type="text" class="form-control" id="nomeIngrediente" placeholder="Ingrediente">
          </div>

          <div class="mb-2">
            <label for="" class="form-label">Custo Total:</label>
            <input name="custoTotal" type="text" class="form-control" id="custoTotal" placeholder="Custo">
          </div>

          <div>
            <label for="" class="form-label">Quantidade comprada:</label>
          </div>
          <div class="input-group mb-2">
            <input name="qtdComprada" type="text" class="form-control" id="qtdComprada" placeholder="Quantidade">
            <select name="opc_qtdComprada" class="form-control">
              <option value="Unidade">Unidade</option>
              <option value="Kg">Kg</option>
              <option value="g">g</option>
              <option value="mg">mg</option>
              <option value="L">L</option>
              <option value="mL">mL</option>
            </select>
          </div>

          <div>
            <label for="" class="form-label">Quantidade Usada:</label>
          </div>
          <div class="input-group mb-2">
            <input name="qtdUsada" type="text" class="form-control" id="qtdUsada" placeholder="Quantidade">
            <select name="opc_qtdUsada" class="form-control">
              <option value="Unidade">Unidade</option>
              <option value="Kg">Kg</option>
              <option value="g">g</option>
              <option value="mg">mg</option>
              <option value="L">L</option>
              <option value="mL">mL</option>
            </select>
          </div>

          <?php 
            if(isset($_GET['erro']) && $_GET['erro'] == 'camponull'){ ?>

              <div class="text-danger text-center">
                É necessário preencher todos os campos.
              </div>

           <?php }; ?>

           <?php 
            if(isset($_GET['erro']) && $_GET['erro'] == 'opc'){ ?>

              <div class="text-danger text-center">
                Unidades de medidas não compativeis.
              </div>

           <?php }; ?>
           

          <div class="text-center mt-3">
            <a >
              <button type="submit" class="btn btn-warning mt-2">Salvar Ingrediente</button>
            </a>
          </div>
         </form>

        </div>

        <div class="col-md-7 d-flex justify-content-center">
          <img class="img-fluid d-none d-md-block" src="img/livro_aberto.png" alt="">
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>