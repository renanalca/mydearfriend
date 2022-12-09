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


<?php 
    require_once "config.php";

    if(!empty($logado)){
    $id = $_SESSION["id"];
    $sql = "SELECT  Cliente.*,endereco.cidade,endereco.estado,endereco.CEP,endereco.numeroCasa FROM  Cliente left join endereco on endereco.id_Cliente = Cliente.id_Cliente where Cliente.id_Cliente = " .$id;
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);
};
?>

<body style="height:100%">

  <!-- Incluir o Menu da página -->

  <?php include "topmenu.php" ?>

      <h1 class="interessesh1">Minha conta</h1>
    
      <div class="fundo1">
        <div class="perfil">
            <br>

            <h1 class="h1perfil"><?php if(!empty($row["nome"])){echo($row["nome"]);};?></h1>
            <br>
            <div class="fundoimgperfil">
                <div class="imagperfilavat">
                    <img class= "avatarp" src="<?php if(!empty($row["linkImagem"])){echo($row["linkImagem"]);}else{echo "Imagens/placeholderUser.png";};?>" width="100%" height="100%">
                </div>
            </div>
            <br><br>

            <h2>Sobre mim</h2> 
            <span><?php if(!empty($row["descricao"])){echo($row["descricao"]);}else{echo "N/A";};?></span>
            <br>
            <br>

            <h2> Detalhes</h2>
            <span>Data de Nascimento: <?php if(!empty($row["dataNascimento"])){echo(date("d/m/Y", strtotime($row["dataNascimento"])));}else{echo "N/A";};?></span><br>
            <span>Telefone: <?php if(!empty($row["Telefone"])){echo($row["Telefone"]);}else{echo "N/A";};?></span><br><br>

            <h2> Localização</h2>
            <span>Estado: <?php if(!empty($row["estado"])){echo($row["estado"]);}else{echo "N/A";};?></span><br>
            <span>Cidade: <?php if(!empty($row["cidade"])){echo($row["cidade"]);}else{echo "N/A";};?>  </span><br>
            <span>CEP: <?php if(!empty($row["CEP"])){echo($row["CEP"]);}else{echo "N/A";};?></span><br><br><br>

            <a href="interesses.php"><input type="button" class="buttonper" onmouseover="this.style.backgroundColor='#c23297';return true;"
            onmouseout="this.style.backgroundColor='#FF89C9';return true;" value="Ver meus interesses"></a>
            <a href="minhaconta.php"><input type="button" class="buttonper" onmouseover="this.style.backgroundColor='#c23297';return true;"
            onmouseout="this.style.backgroundColor='#FF89C9';return true;" value="Editar perfil"></a><br><br>    
        </div>
    </div>
    <br>
    <br>


  <?php include "footer.php" ?>

</body>
</html>