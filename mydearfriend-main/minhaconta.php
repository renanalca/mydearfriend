<?php include "sessionStart.php"?>


<?php 
  if($_SERVER['SERVER_NAME'] == 'localhost'){
    $varPath = 'http://localhost/mydearfriend/';
  }else{
    $varPath = 'https://www.mydearfriend.mytcc.com.br/';
  } 
?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  if(trim($_POST["hdnSalvar"]) == '1'){
        
        include_once('config.php');


        $id = $_SESSION["id"];
        $descricao = $_POST['descricao'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $dataNasc = $_POST['dataNasc'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $CEP = $_POST['CEP'];
        $senha = $_POST['senha'];
        $uploadOk = 1;
        $caminhoImagem = "";


          if(isset($_FILES["pictureinput"])) {
            $target_dir = "imagensUsuarios/";
            $target_file = $target_dir . basename($_FILES["pictureinput"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES["pictureinput"]["tmp_name"]);
              if($check !== false) {
                $uploadOk = 1;
              } else {
                $erro =  "Arquivo não é uma imagem.\n";
                $uploadOk = 0;
              }
            }

            if ($_FILES["pictureinput"]["size"] > 500000) {
              $erro = "O arquivo é muito grade.\n";
              $uploadOk = 0;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
              $erro = "Aceitamos somente JPG, JPEG e PNG.\n";
              $uploadOk = 0;
            }

            if ($uploadOk == 0) {
              $erro = "\nArquivo não realizado o upload.";
                $caminhoImagem = "";
            } else {
              $target_file = $target_dir . md5(date('Y-m-d H:i:s:u')).".".$imageFileType;
              if (move_uploaded_file($_FILES["pictureinput"]["tmp_name"], $target_file)) {
              $caminhoImagem = "{$varPath}imagensUsuarios/" . md5(date('Y-m-d H:i:s:u')).".".$imageFileType;
              } else {
                $erro = "\nMe desculpe, teve um erro ao realizar o upload.";
                $caminhoImagem = "";
              }
            }
          }



          if(mysqli_query($link, "update Cliente set nome = '{$nome}', dataNascimento = '{$dataNasc}', Telefone = '{$telefone}', descricao = '{$descricao}', linkImagem = '{$caminhoImagem}' where id_Cliente = ".$id)){

               $sql = "DELETE FROM Endereco where id_Cliente = " .$id;
      
               $result = mysqli_query($link, $sql);


            if(mysqli_query($link, "INSERT INTO Endereco(id_Cliente,cidade,Estado,CEP) 
                VALUES ('{$id}','{$cidade}','{$estado}','{$CEP}')")){

              if(!empty($senha)){
                if(mysqli_query($link, "update Cliente set senha = '{$senha}' where id_Cliente = ".$id)){
                  $erro = 'Dados atualizados com sucesso!';
                }else{
                  $erro = 'Ocorreu um erro ao atualizar os dados, tente novamente!';
                }
              }else{
                $erro = 'Dados atualizados com sucesso!';
              }
            }else{
              $erro = 'Ocorreu um erro ao atualizar os dados, tente novamente!';
            }
          }else{
              $erro = 'Ocorreu um erro ao atualizar os dados, tente novamente!';
          }


    }
}
    
?>

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

    <?php 
        if(isset($erro)){
            echo "<script>alert('{$erro}');</script>";
        }
    ?>

  <!-- Incluir o Menu da página -->

  <?php include "topmenu.php" ?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<h1 style="text-align:center">Minha conta</h1>
<br>
 <div class="box2mc">
    <div class="box1">    
        <form method="POST" id="formularioatualiza" name="formularioatualiza" autocomplete="off" style="display:contents" action="" enctype="multipart/form-data">
            <input type="hidden" id="hdnSalvar" name="hdnSalvar" value="0">    
                <div class="boxlope">         
                    <span>Perfil:</span><br>
                    <div style="display: inline-block;width: 100px;text-align:left">Sobre mim::</div> <input type="text" name="descricao" id="descricao" class="camposmc" value="<?php if(!empty($row["descricao"])){echo($row["descricao"]);};?>"><br><br>

                    <div style="display: inline-block;width: 100px;text-align:left">Nome: <span style="color:red;font-size:12px">*</span></div> <input type="text" name="nome" id="nome" class="camposmc" value="<?php if(!empty($row["nome"])){echo($row["nome"]);};?>"><br><br>

                    <div style="display: inline-block;width: 100px;text-align:left">Telefone:</div> <input type="text" name="telefone" id="telefone" class="camposmc" value="<?php if(!empty($row["Telefone"])){echo($row["Telefone"]);};?>"><br><br>

                    <div style="display: inline-block;width: 100px;text-align:left">Data nasc. <span style="color:red;font-size:12px">*</span></div> <input type="date" name="dataNasc" id="dataNasc" class="camposmc"  min="1900-01-01" max="2022-12-31" value="<?php if(!empty($row["dataNascimento"])){echo($row["dataNascimento"]);};?>"><br><br>

                    <span>Localização: </span><br>

                    <div style="display: inline-block;width: 100px;text-align:left">Estado:</div> <input type="text" name="estado" id="estado" class="camposmc" value="<?php if(!empty($row["estado"])){echo($row["estado"]);};?>"><br><br>
                    <div style="display: inline-block;width: 100px;text-align:left">Cidade:</div> <input type="text" name="cidade" id="cidade" class="camposmc" value="<?php if(!empty($row["cidade"])){echo($row["cidade"]);};?>"><br><br>
                    <div style="display: inline-block;width: 100px;text-align:left">CEP:</div> <input type="text" name="CEP" id="CEP" class="camposmc" value="<?php if(!empty($row["CEP"])){echo($row["CEP"]);};?>"><br><br><br><br>
                </div>

                <div class="boxbutt">
                    <input type="button" class="buttonsalva" onmouseover="this.style.backgroundColor='#c23297';return true;"
                        onmouseout="this.style.backgroundColor='#FF89C9';return true;" value="Salvar" onclick="atualizaDados()">
                    <br>
                </div>

                <div class="boxloim">
                  <span>Nova senha:</span><br>
                    <input type="password" name="senha" id="senha" class="camposmc" placeholder="Senha"><br><br>
                    <input type="password" name="confirmarsenha" id="confirmarsenha" class="camposmc" placeholder="Confirme a nova senha"><br><br>

                    <img class="avatar" src="<?php if(!empty($row["linkImagem"])){echo($row["linkImagem"]);}else{echo "imagens/avatar.jpg";};?>" width="100px" height="100px"><br><br>

                    <div class="conteinercentro">

                    <label class="picture" for="pictureinput" tabIndex="0">
                      <span class="picture__image"></span>
                    </label>
                    
                    <input type="file" accept="image/*" name="pictureinput" id="pictureinput">
                   </div>
                </div>
          </form>
    </div>
  </div>
    <br><br><br><br><br>


  <?php include "footer.php" ?>

<script>
const inputFile = document.querySelector("#pictureinput");
const pictureImage = document.querySelector(".picture__image");
const pictureImageTxt = "Escolha uma imagem";
pictureImage.innerHTML = pictureImageTxt;

inputFile.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;

      const img = document.createElement("img");
      img.src = readerTarget.result;
      img.classList.add("picture__img");

      pictureImage.innerHTML = "";
      pictureImage.appendChild(img);
    });

    reader.readAsDataURL(file);
  } else {
    pictureImage.innerHTML = pictureImageTxt;
  }
});

</script>

  
<script>
  $('#telefone').mask('(00) 00000-0000');
  $('#CEP').mask('00000-000');

  function atualizaDados(){
      var mensagem = '';

      if(document.getElementById('nome').value == ''){
        mensagem = mensagem + '\n- Nome completo'
      }

      if(document.getElementById('dataNasc').value == ''){
        mensagem = mensagem + '\n- Data de nascimento'
      }

      if(document.getElementById('senha').value != ''){
        if(document.getElementById('confirmarsenha').value == ''){
          mensagem = mensagem + '\n- Confirmar a senha'
        }else if(document.getElementById('senha').value != document.getElementById('confirmarsenha').value){
          mensagem = mensagem + '\n- As senhas não estão iguais'
        }
      }

      if(mensagem != ''){
        alert('Para prosseguir, preencha os seguintes campos:\n' + mensagem);
      }else{
        document.getElementById('hdnSalvar').value = '1';
        document.getElementById('formularioatualiza').submit();
      }
  }
</script>
</body>

</html>