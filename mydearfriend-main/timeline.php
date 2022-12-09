<?php include "sessionStart.php"?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Dear Friend</title>

  <?php 
    if($_SERVER['SERVER_NAME'] == 'localhost'){
      $varPath = '/mydearfriend/';
    }else{
      $varPath = 'https://www.mydearfriend.mytcc.com.br/';
    } 
  ?>

  <link rel="icon" href="<?php echo $varPath ?>imagens/cor.png">
</head>
<body style="height:100%">

  <!-- Incluir o Menu da página -->

  <?php include "topmenu.php" ?>

    
    <style>
      body{
        background-color: #b7501030;
      }
    </style>

    <!-- INICIO DO CORPO DO SITE -->

    
    <div class="container">
      <div class="banner">
        <video
          class="video-banner"
          autoplay=""
          muted=""
          loop=""
          src="imagens/banner.mp4"
          width="100%"
        ></video>
      </div>


      <?php 
        
        include_once('config.php');


        $sql = "SELECT Animal.*,cliente.nome as nomeDono FROM Animal left join cliente on cliente.id_Cliente = animal.id_cliente order by id_Animal asc";


        $result = mysqli_query($link, $sql);

        
      ?>

    <?php
            
      while($row = mysqli_fetch_array($result)){
        echo'
      <div class="card">
        <img src="' .$row["imagemAnimal"] .'" class="card-img-top" width="100%" />
        <div class="card-body">
          <h1 class="card-title">' .$row["nomeAnimal"] .'/' .$row["estado"] .'</h1>
          <p class="card-text">' .$row["nomeDono"] .'</p>
          <br />
          <a href="paginadepet2.php?id=' .$row["id_Animal"] .'" class="btnprimario"> Informações</a>
        </div>
      </div>';
    }
    ?>

    </div>

    <br>
    <br>
    <br>
    <br>

  <?php include "footer.php" ?>

    <!--CELULAR-->

    <div class="banner-cel">
      <video
        class="video-banner-cel"
        autoplay=""
        muted=""
        loop=""
        src="imagens/banner.mp4"
        width="100%"
      ></video>
    </div>
  </body>
</html>
