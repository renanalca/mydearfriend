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
        $especiePet = $_POST['especiePet'];
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $estado = $_POST['estado'];
        $descricao = $_POST['descricao'];
        $uploadOk = 1;


        if(isset($_FILES["pictureinput"])) {
          $target_dir = "imagensPets/";
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
            $caminhoImagem = "{$varPath}imagensPets/" . md5(date('Y-m-d H:i:s:u')).".".$imageFileType;
            } else {
              $erro = "\nMe desculpe, teve um erro ao realizar o upload.";
              $caminhoImagem = "";
            }
          }
        }
          
        if(mysqli_query($link, "INSERT INTO Animal(id_Cliente,nomeAnimal,imagemAnimal,especieAnimal,descricao, idade, estado) 
            VALUES ('{$id}','{$nome}','{$caminhoImagem}','{$especiePet}','{$descricao}','{$idade}','{$estado}')")){
            $erro = 'Post feito com sucesso!';
          }else{
              $erro = 'Ocorreu um erro ao criar o seu post, tente novamente!';
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


<body style="height:100%">

    <?php 
        if(isset($erro)){
            echo "<script>alert('{$erro}');</script>";
        }
    ?>

  <!-- Incluir o Menu da página -->

  <?php include "topmenu.php" ?>


<h1 style="text-align:center">Novo post</h1>
<br>
 <div class="box2mc">
    <div class="box1">    
        <form method="POST" id="formularioatualiza" name="formularioatualiza" autocomplete="off" style="display:contents" action="" enctype="multipart/form-data">
            <input type="hidden" id="hdnSalvar" name="hdnSalvar" value="0">    
                <div class="boxlope">         
                    <span>Sobre:</span><br>
                    <div style="display: inline-block;width: 100px;text-align:left">Espécie::</div>
                    <select class="camposmc" id="especiePet" name="especiePet">
                        <option value="">Selecione*</option>
                        <option value="Gato">Gato</option>
                        <option value="Cachorro">Cachorro</option>
                        <option value="Outros">Outros</option>
                    </select>
                    <br><br>

                    <div style="display: inline-block;width: 100px;text-align:left">Nome:</div> <input type="text" name="nome" id="nome" class="camposmc"><br><br>

                    <div style="display: inline-block;width: 100px;text-align:left">Idade:</div> <input type="number" name="idade" id="idade" class="camposmc"><br><br>

                    <div style="display: inline-block;width: 100px;text-align:left">Estado:</div> 
                        <select class="camposmc" id="estado" name="estado">
                            <option value="">Selecione*</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    <br><br>
                    <div style="display: inline-block;width: 100px;text-align:left">Descrição:</div> <textarea class="camposmc" id="descricao" name="descricao" rows="5" style="height:200px;resize:none"></textarea>
                    <br><br><br><br>
                </div>

                <div class="boxbutt">
                    <input type="button" class="buttonsalva" onmouseover="this.style.backgroundColor='#c23297';return true;"
                        onmouseout="this.style.backgroundColor='#FF89C9';return true;" value="Enviar" onclick="atualizaDados()">
                    <br>
                </div>

                <div class="boxloim">
                    <span>Comprovante de vacina:</span><br><br>

                    <div class="conteinercentro">

                        <label class="picture" for="pictureinputVacina" tabIndex="0">
                          <span class="picture__imageVacina"></span>
                        </label>
                        
                        <input type="file" accept="image/*" name="pictureinputVacina" id="pictureinputVacina">
                   </div>

                    <span>Foto do pet:</span><br><br>

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
const inputFile2 = document.querySelector("#pictureinputVacina");
const pictureImage2 = document.querySelector(".picture__imageVacina");
const pictureImageTxt2 = "Escolha uma imagem";
pictureImage2.innerHTML = pictureImageTxt2;

inputFile2.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;

      const img = document.createElement("img");
      img.src = readerTarget.result;
      img.classList.add("picture__imgVacina");

      pictureImage2.innerHTML = "";
      pictureImage2.appendChild(img);
    });

    reader.readAsDataURL(file);
  } else {
    pictureImage2.innerHTML = pictureImageTxt2;
  }
});

</script>

  
<script>
  $('#telefone').mask('(00) 00000-0000');
  $('#CEP').mask('00000-000');

  function atualizaDados(){
      var mensagem = '';

      if(document.getElementById('especiePet').value == ''){
        mensagem = mensagem + '\n- Espécie'
      }

      if(document.getElementById('nome').value == ''){
        mensagem = mensagem + '\n- Nome'
      }

      if(document.getElementById('idade').value == ''){
        mensagem = mensagem + '\n- Idade'
      }

      if(document.getElementById('estado').value == ''){
        mensagem = mensagem + '\n- Estado'
      }

      if(document.getElementById('pictureinput').value == ''){
        mensagem = mensagem + '\n- Foto do pet'
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