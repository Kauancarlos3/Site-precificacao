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


    <div class="text-center mt-4">
        <p class="h5"><strong>Receitas cadastradas</strong></p>
    </div>

    
    <div class="container mt-5">
        <div class="text-center">
            <span class="mr-3 h6">Lista de Receitas</span>
              <button type="button" class="btn btn-warning">
                <i class="fas fa-plus"></i><span class="ml-2"><a class="links" href="cadastrar_nova_receita.php">Adiconar</a></span>
              </button>
          </div>
        <div class="lista_ingredientes p-2 mt-3">
          <div class="text-center table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Rendimento</th>
                  <th scope="col">Lucro Desejado</th>
                  <th scope="col">Custo/Receita</th>
                  <th scope="col">Valor a ser cobrado</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
              include('conexao.php');

              $slq = "SELECT * FROM tb_receita";

              $resultado = mysqli_query($conecta, $slq);

              if($resultado && mysqli_num_rows($resultado) > 0){
                  while($dados = mysqli_fetch_assoc($resultado)){ ?>
                <tr>
                  <td> <?php echo $dados['nome']; ?> </td>
                  <td> <?php echo $dados['rendimento']; ?> </td>
                  <td> <?php echo '% ' . $dados['porcentagem']; ?> </td>
                  <td> <?php echo 'R$ ' . $dados['custo_receita']; ?> </td>
                  <td> <?php echo 'R$ ' . $dados['valor_cobrado']; ?> </td>
                  <td> 
                    <form action="remover_receita.php" method="post">
                      <input type="hidden" name='id_receita' value="<?php echo $dados['id_receita'];?>">
                      <button class="btn btn-sm btn-warning" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>   
                  </td>
              </tr>
              <?php 
               }
            }else {
              echo 'Nenhuma receita cadastrada';
            }
            ?>
              </tbody>
            </table>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>