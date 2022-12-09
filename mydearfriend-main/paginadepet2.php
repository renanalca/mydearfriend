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

      <?php 
        
        include_once('config.php');


        $sql = "SELECT Animal.*,cliente.nome as nomeDono,cliente.telefone FROM Animal left join cliente on cliente.id_Cliente = animal.id_cliente where animal.id_animal = '{$_GET['id']}'";


        $result = mysqli_query($link, $sql);

        $row = mysqli_fetch_array($result);

        
      ?>

    <!-- INICIO DO CORPO DO SITE -->
      <div class="conteinercentropet">

        <div class="fundopara2">
          <div class="textospaginadepet">
            <h1><?php echo $row['nomeAnimal'] ?></h1>
            <span><?php echo $row['nomeDono'] ?></span>
          </div>

          <div class="fundoimagempaginadepet">
            
            <div class="imagempaginadepet">
            <img src="<?php echo $row['imagemAnimal'] ?>" style="height: 500px;width: auto;">
            </div>

          </div>
        </div>
      </div>

      <div class="fundoinfopaginadepet">
        <div class="infopaginadepet">
          <div class="fundolocalizacaopaginadepet">
            <h2>📍 localização: <?php echo $row['estado'] ?></h2>
          </div>


          <div class="fundoparadoispaginadepet">
            <div class="fundoraçapaginadepet">
              <h2>Espécie: <?php if($row['especieAnimal'] = 'Gato'){ echo "🐱 Gato"; }else if($row['especieAnimal'] = 'Cachorro'){echo "🐶 Cachorro";}else{echo "❓ Outros";} ?></h2>
            </div>


            <div class="fundosexopaginadepet">
              <h2>Idade: <?php echo $row['idade'] ?></h2>
            </div>
          </div>


          <div class="fundodescricaopaginadepet">
            <h2>descrição:</h2>
            <h2><?php echo $row['descricao'] ?></h2>
          </div>
          <div class="teste1">
            <a href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $row['telefone']) ?>&text=Oi, eu vi que o <?php echo $row['nomeAnimal'] ?> está para adoção?"> <input type="button" name="" id="btnteste" value="Contato" style="color:black"></a>
            <br>
            <br>
            <a class="link2" href="#"> <img src="imagens/adotar2.png" width="50px" height="50px" onclick="favoritarPet();"></a>
          </div>
        </div>
      </div>
    <br>
    <br>
    <br>
    <br>
    <br>



 <script>


    function favoritarPet(){
      $.ajax({
          type:"POST",
          url:"favoritarPet.php?id=<?php echo $_GET['id'] ?>",
          success: function(retorno){
            if(retorno.sucesso == 1){
              alert('Pet adicionado aos interesses com sucesso!');
            }else if(retorno.sucesso == 2){
              alert('Pet removido dos interesses com sucesso!');
            }else{
              alert('Ocorreu um erro ao adicionar o pet!');
            }
          },
          error:function(){
            alert('Ocorreu um erro ao adicionar o pet!');
          }
      })
    }
</script>


  <?php include "footer.php" ?>




    <!-- FIM DO CORPO DO SITE -->
  </body>
  <script>
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"
  </script>
</html>
