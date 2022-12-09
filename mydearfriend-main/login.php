

<?php

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: FrontOffice/MainPage.php");
  exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  if(trim($_POST["hdnSalvar"]) == '1'){
        
        include_once('config.php');


        $email = $_POST['email'];
        $senha = $_POST['senha'];


        $sql = "SELECT * FROM  Cliente where Email = '{$email}' and senha = '{$senha}'" ;

        $result = mysqli_query($link, $sql);

        $row = mysqli_fetch_array($result);

        $idInserido = isset($row['id_Cliente']) ? $row['id_Cliente'] : '';

        if($idInserido == ''){
            $erro = 'Nome de usuário ou senha inválido!';
        }else{
          session_start();
          
          $_SESSION["loggedin"] = true;
          $_SESSION["id"] = $row['id_Cliente'];
          $_SESSION["username"] = $row['Email'];

          header("location: timeline.php");
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

    <style type="text/css">
        body {
            background-image: url(imagens/wallpaperdog.jpg);
            background-size: cover; 
        }

    </style>

  <!-- Incluir o Menu da página -->

  <?php include "topmenu.php" ?>


    <div id="area">
        <form method="POST" id="formulariocad" name="formulariocad" autocomplete="off">
            <input type="hidden" id="hdnSalvar" name="hdnSalvar" value="0">

                <br><br>    
                <div class="logocad">
                <a href="timeline.php"><h1 class="logotxtcad">MY DEAR FRIEND</h1></a>
                </div>

                <div class="titulocad">
                <h1 class="logintitleaaa">Fazer Login</h1>
                </div>

                <ul class="ras">
                <form action="PHP_insc.php" method="post"></form>
                <br>
                <div class="infocampos">
                <input class="campos" type="text" id="email" name="email" placeholder="E-mail"><br><br>
                <input class="campos" type="password" id="senha" name="senha" placeholder="Senha"></div>
                <br><br>
                <div class="buttoncad">
                    <input type="button" class="buttonr" onmouseover="this.style.backgroundColor='#c23297';return true;"
                    onmouseout="this.style.backgroundColor='#FF89C9';return true;" onclick="logar()" value="Entrar">
                </div><br>
                <div class="jatemcad">
                    <span class="all">Não tem uma conta?</span>
                    <a href="cadastro.php" class="conta">
                        <span>&nbsp;&nbsp;Cadastre-se</span>
                    </a>
                </div>
                <br>           
        </form>
    </div>

  <?php include "footer.php" ?>

  <script>
    function logar(){
        var mensagem = '';

        if(document.getElementById('email').value == ''){
          mensagem = mensagem + '\n- E-mail'
        }
        if(document.getElementById('senha').value == ''){
          mensagem = mensagem + '\n- Senha'
        }

        if(mensagem != ''){
          alert('Para realizar login, preencha os seguintes campos:\n' + mensagem);
        }else{
          document.getElementById('hdnSalvar').value = '1';
          document.getElementById('formulariocad').submit();
        }
    }
  </script>

    <script>
      <?php 
        if(isset($_GET['success']) && $_GET['success'] == '1'){
          echo "alert(`Usuário cadastrado com sucesso!\n\nRealize o login com as informações cadastradas`);";
        }
      ?>
    </script>

</body>
</html>