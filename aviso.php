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
  <title>Main - Home</title>

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

</head>

<body class="bg-color-">
  
<?php
  include_once('menu.php');
?>

  
  <div class="container cont-home" id="container">
    <div class="text-center">
        <p class="h5"><strong class="text-danger">AVISO!</strong></p>
        <p><strong>1 - </strong>Antes de cadastrar o nome da receita, é necessário cadastrar os ingedientes.</p>
        <p><strong>2 - </strong>Cadastre todos ingredientes que irá ser usado na receita.</p>
        <p><strong>3 - </strong>Cadastre o nome da receita e faça o cálculo para visualizar a Precificação adequada.</p>
      <div>
        <a href="cadastrar_nova_receita.php">
            <button class="btn btn-warning">cadastrar</button>
        </a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>