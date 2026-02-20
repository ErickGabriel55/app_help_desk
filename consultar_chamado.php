<?php
  require_once "validador_acesso.php";
?>

<?php 
  /* 
  fgets: Lê uma linha por vez
  feof: verifica se o ponteiro chegou até o fim do arquivo  
  */
  $arquivo = 'arquivo.hd';
  $arquivo_leitura = fopen($arquivo, 'r');
  while (($linha = fgets($arquivo_leitura)) !== false) {
    $valor = trim($linha);
    $dados = explode('#', $valor);

    $registros[] = [
        'titulo' => $dados[0],
        'categoria' => $dados[1],
        'descricao' => $dados[2]
    ];
    
  }
  /*echo '<pre>';
  print_r($registros);
  fclose($arquivo_leitura);*/
  
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              
                <?php for ($indice = 0; $indice < count($registros); $indice++) { ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $registros[$indice]['titulo']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $registros[$indice]['categoria']; ?></h6>
                    <p class="card-text"><?php echo $registros[$indice]['descricao']; ?></p>
                  </div>
                </div>
                <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>