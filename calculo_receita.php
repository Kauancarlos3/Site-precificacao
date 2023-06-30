<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM' ){
    header('Location: index.php?login=erro2');
    };

    if(!empty($_POST['nome_receita']) && !empty($_POST['rendimento']) && !empty($_POST['lucro']) && !empty($_POST['ids'])){
      include('conexao.php');

    
    //echo $_POST['ids'][0]; acessar o indice

    $totais = array();

    foreach ($_POST['ids'] as $id) {

      
      $sql = "SELECT tb_ingredientes.*, tb_medida.* FROM tb_ingredientes JOIN tb_medida ON tb_ingredientes.id_medida = tb_medida.id_medida WHERE tb_ingredientes.id_ingredientes = $id";

        $resultado = mysqli_query($conecta, $sql);

        if($resultado && mysqli_num_rows($resultado) > 0){
        
            $somaTotal = 0;

            while ($dados = mysqli_fetch_assoc($resultado)) {

              include ('tratamento_tb_receita.php');

                // $custoTotal = ($dados['custo_total'] / $dados['qtd_comprada']) * $dados['qtd_usada'];
                $somaTotal = $calculo_qtd_usada + $somaTotal;
                
            }

            $totais[] = $somaTotal;

        }else{
            herder('Location: cadastrar_nova_receita.php');
        }
    };

    $resultado_soma = array_sum($totais);

    $somaPorcentagem = ($_POST['lucro'] / 100) * $resultado_soma + $resultado_soma;

    $somaRendimento = $somaPorcentagem / $_POST['rendimento'];

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
        <p class="h5 text-success"><strong>Visualizar receita</strong></p>
    </div>

    
     <div class="container mt-5">
        <form action="salvar_receita_pronta.php" method="post">
          <div class="text-center">
              <span class="mr-3 h6">Gerar outro Cálculo</span>
                <button type="button" class="btn btn-warning">
                  <i class="fas fa-plus"></i><span class="ml-2"><a class="links" href="cadastrar_nova_receita.php">Gerar</a></span>
                </button>
                <p class="text-danger">*OBS: se o rendimento for maior que 1 unidade, considere que o valor a ser cobrado será por cada unidade*</p>
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
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td> <input type="hidden" name="nome" value="<?php echo $_POST['nome_receita']; ?>"> <?php echo $_POST['nome_receita']; ?></td>
                  <td> <input type="hidden" name="rendimento" value="<?php echo $_POST['rendimento']; ?>"> <?php echo $_POST['rendimento']; ?></td>
                  <td> <input type="hidden" name="porcentagem" value="<?php echo $_POST['lucro'];?>"> <?php echo $_POST['lucro'] . ' % '; ?></td>
                  <td> <input type="hidden" name="custo" value="<?php echo $resultado_soma; ?>"> <?php echo ' R$ ' . number_format($resultado_soma, 2); ?></td>
                  <td> <input type="hidden" name="valor_cobrado" value="<?php echo $somaRendimento; ?>"> <?php echo ' R$ ' . number_format($somaRendimento, 2); ?></td>
              </tr>
              </tbody>
            </table>
          </div>
        
     </div>
     <div class="text-center mt-5">
       <button class="btn btn-warning">Salvar Receita</button>
     </div>
     </form>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>
<?php }else{
  header('Location: cadastrar_nova_receita.php?erro=null');
}; ?>