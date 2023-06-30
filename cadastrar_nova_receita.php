<?php 

  session_start();

  if(!isset($_SESSION['autenticado']) || ($_SESSION['autenticado']) != 'SIM' ){
  header('Location: index.php?login=erro2');
  };

  include('conexao.php');

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

  <!--My script-->
  <script src="js/script.js"></script>
</head>

<body class="bg-color-">

  <?php
    include_once('menu.php');
  ?>

  <div class="d-flex m-5">

    <div class="container">
      <!-- Formulario para recuperação dos id dos checkbox e salvar receita -->
      <form action="calculo_receita.php" method="post">
        <div class="row">
          <div class="col-md-5">

            <!--Titulo cadastrar Receita-->
            <div class="text-center mt-2 mb-3">
              <p class="h6">Cadastrar Receita</p>
            </div>
            <!--Fim Titulo cadastrar Receita-->

            <!-- input 'Nome da receita:' -->
            <div class="mb-3">
              <label for="" class="form-label">Nome da receita:</label>
              <input name="nome_receita" type="text" class="form-control" id="inputNomeReceita" aria-describedby="emailHelp"
                placeholder="Nome receita">
            </div>

            <!-- input 'Redendimento:' -->
            <div class="mb-3">
              <label for="" class="form-label">Redendimento:</label>
              <input name="rendimento" type="text" class="form-control" id="inputRendimento" placeholder="Ex: 1">
            </div>

            <!-- input'Lucro desejado'-->
            <div>
              <label for="" class="form-label">Lucro desejado:</label>
            </div>
            <div class="input-group">
              <input name="lucro" type="text" class="form-control" id="inputLucroDesejado" placeholder="Ex: 200">
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">%</span>
              </div>
            </div>

            <?php 
            if(isset($_GET['erro']) && $_GET['erro'] == 'null'){ ?>

              <div class="text-danger text-center mt-3">
                É necessário preencher todos os campos e selecionar os ingredientes. 
              </div>

           <?php }; ?>

            <div class="text-center mt-2 mb-4">
              <button type="submit" class="btn btn-warning">Calcular Receita</button>
            </div>
          </div>

          <div class="col-md-7 text-center">
            <div class="text-center">
              <span class="mr-3 h6">Lista de Ingredientes</span>
              <a href="cadastrar_ingredientes.php">
                <i class="fas fa-plus"></i>
                <span class="ml-2">Adiconar</span>
              </a>

              <?php 
                 if(isset($_GET['erro']) && $_GET['erro'] == 'camponull'){ ?>

                <div class="text-danger text-center">
                  Para editar a receita, é necessario preencher todos os campos!
                </div>

           <?php }; ?>
           <?php 
                 if(isset($_GET['e']) && $_GET['e'] == 'err'){ ?>

                <div class="text-danger text-center">
                  Erro em atualizar ingrediente, valores não compatíveis. Tente novamente!
                </div>

           <?php }; ?>
           <?php 
                 if(isset($_GET['s']) && $_GET['s'] == 'suc'){ ?>

                <div class="text-success text-center">
                  Atualização realizada!
                </div>

           <?php }; ?>
              
            </div>


            <div class="lista_ingredientes p-2 mt-3 mb-3 table-responsive">

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Selecionar</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Custo</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Opções</th>
                  </tr>
                </thead>
                <tbody>
                  <?php                  
                  $sql = "SELECT tb_ingredientes.*, tb_medida.* FROM tb_ingredientes JOIN tb_medida ON tb_ingredientes.id_medida = tb_medida.id_medida";


                  $resultado = mysqli_query($conecta, $sql);

                  if($resultado && mysqli_num_rows($resultado) > 0){                     
                     while($dados = mysqli_fetch_assoc($resultado)){
                        include ('tratamento_tb_receita.php');

                  ?>
                  <tr>
                    <td>
                      <input class="form-check-input" type="checkbox" name="ids[]" value="<?php echo $dados['id_medida'];?>">
                    </td>
                    <td>
                      <?php echo $dados['nome'];?>
                    </td>
                    <td>
                      <?php echo 'R$ ' . $custo_formatado;?>
                      </form>
                    </td>
                    <td>
                      <?php echo $dados['qtd_usada'] . ' ' . $dados['qtd_usada_medida'];?>
                    </td>
                    <td class="d-flex">
                      <!-- Botão para excluir linha  -->
                      <div>
                      <form action="remover_linha.php" method="post">
                        <input type="hidden" name='id_medidas' value="<?php echo $dados['id_medida'];?>">
                        <button class="btn btn-sm btn-warning" type="submit"><i class="fa-solid fa-trash"></i></button>
                      </form>
                      </div>
                      <!-- Botão para editar linha  -->
                      <form class="ml-2" action="editar_ingredientes.php" method="post">
                        <input type="hidden" name='id_medida' value="<?php echo $dados['id_medida'];?>">
                        <button class="btn btn-sm btn-warning" type="submit"><i
                            class="fa-solid fa-pen-to-square"></i></button>
                      </form>
                    </td>
                  </tr>
                  <?php  };                      
                  }else {
                    echo 'Nenhum dado cadastrado';
                  };
                ?>
                </tbody>
              </table>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>