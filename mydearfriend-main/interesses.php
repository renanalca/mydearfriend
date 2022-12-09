<<?php include "sessionStart.php"?>

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


  <?php 
    
    include_once('config.php');


    $sql = "SELECT Animal.*,cliente.nome as nomeDono,cliente.telefone FROM Animal left join cliente on cliente.id_Cliente = animal.id_cliente left join adocao on animal.id_Animal = adocao.id_Animal
          where adocao.id_Cliente = '{$_SESSION["id"]}'
          order by id_Animal asc";


    $result = mysqli_query($link, $sql);

    
  ?>

  <h1 class="interessesh1">Interesses</h1>
  <div class="conteinercentro1">
    <div class="fundointere">
      <table>
        <tr>
          <th>Foto</th>
          <th>Nome</th>
          <th>Idade</th>
          <th>Espécie</th>
          <th>Doador</th>
          <th>Localização</th>
          <th>Contato</th>
        </tr>

        <?php if(mysqli_num_rows ($result) == 0){echo '
          <tr>
            <td colspan="7" style="text-align:center;height:50px">Nenhum registro encontrado</td>
          </tr>
        ';} ?>

      <?php
            
      while($row = mysqli_fetch_array($result)){
        echo'

        <tr>
          <td><img src="' .$row["imagemAnimal"] .'" width="100px" height="100px" class="imgtable"></td>
          <td>' .$row["nomeAnimal"] .'</td>
          <td>' .$row["idade"] .'</td>
          <td>' .$row["especieAnimal"] .'</td>
          <td>' .$row["nomeDono"] .'</td>
          <td>' .$row["estado"] .'</td>
          <td><a href="https://api.whatsapp.com/send?phone=' .preg_replace("/[^0-9]/", "", $row['telefone'])  .'&text=Oi, eu vi que o ' .$row['nomeAnimal'] .' está para adoção?"><input type="button" class="buttoni" value="Entrar em Contato"></a></td>
        </tr>
        '; 
        }
        ?>
        
      </table>

    </div>
  </div>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>


  <?php include "footer.php" ?>

</body>
</html>