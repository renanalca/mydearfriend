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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<h1 style="text-align:center">Termo de privacidade</h1>
<br>
 <div class="box2mc">
    <div class="box1" style="text-align: left;padding: 20px;height: fit-content;">   
        <b style="display: contents;width:100%;text-align:center">Termo de privacidade</b><br> 
        A sua privacidade é importante para nós. É política do My Dear Friend respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar no site My Dear Friend. Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço. Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento. Também informamos por que estamos coletando e como será usado. Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis ​​para evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados. Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei. O nosso site possui links para sites externos que não são operados por nós. Esteja ciente de que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar responsabilidade por suas respectivas políticas de privacidade. Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos fornecer alguns dos serviços desejados. O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de privacidade e informações pessoais. Se você tiver alguma dúvida sobre como lidamos com dados do usuário e informações pessoais, entre em contacto connosco.<br><br>

        <b style="display: contents;width:100%;text-align:center">Compromisso do Usuário</b><br>
        O usuário se compromete a fazer uso adequado dos conteúdos e da informação que o My Dear Friend oferece no site e com caráter enunciativo, mas não limitativo:<br>
        A) Não se envolver em atividades que sejam ilegais ou contrárias à boa fé a à ordem pública;<br>
        B) Não difundir propaganda ou conteúdo de natureza racista, xenofóbica,  betano ou azar, qualquer tipo de pornografia ilegal, de apologia ao terrorismo ou contra os direitos humanos;<br>
        C) Não causar danos aos sistemas físicos (hardwares) e lógicos (softwares) do My Dear Friend, de seus fornecedores ou terceiros, para introduzir ou disseminar vírus informáticos ou quaisquer outros sistemas de hardware ou software que sejam capazes de causar danos anteriormente mencionados.<br><br>

        Além disso, ao se cadastrar você concorda que somos apenas um site intermediário, sendo toda ação que vier antes e após o contato entre os usuários será totalmente de responsabilidade dos mesmos.<br><br>

        <b style="display: contents;width:100%;text-align:center">Mais informações</b><br>
        Esperemos que esteja esclarecido e, como mencionado anteriormente, se houver algo que você não tem certeza se precisa ou não, geralmente é mais seguro deixar os cookies ativados, caso interaja com um dos recursos que você usa em nosso site. Esta política é efetiva a partir de 8 de Novembro 2022 13:13
    </div>
  </div>
    <br><br><br><br><br>
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