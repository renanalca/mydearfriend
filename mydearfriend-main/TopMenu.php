
<style>    
	.fundoindex{
      background-image: url('imagens/DogI.jpg');
      background-position-x:center;
      background-size:cover;
      height:100%;
      width:100%;
    }

    .collapse.in{
    	background-color:white !important;
    }

    .collapse.in li{
      width:100%;
      border:1px solid black;
    }

    @media (max-width: 992px){
      .collapse.in a{
        color:black !important;
      }
    }


    .collapse.in ul{
    	width:100%;
    }

    body{
    	padding-top:90px !important;
    }
</style>

<?php 
  if($_SERVER['SERVER_NAME'] == 'localhost'){
    $varPath = '/mydearfriend/';
  }else{
    $varPath = 'https://www.mydearfriend.mytcc.com.br/';
  } 
?>


<!--- Importação CSS --->
<link rel="stylesheet" type="text/css" href="<?php echo $varPath ?>Content/library/BootstrapFirst.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $varPath ?>Content/library/BootstrapSecond.min.css">
<link rel="stylesheet" href="css/style.css" />


<!--- Importação Javascript --->
<script src="<?php echo $varPath ?>Content/library/jquery.min.js"></script>
<script src="<?php echo $varPath ?>Content/library/bootstrap.min.js"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position:absolute;top:0;margin: auto;background-color: #268fbe!important;margin: auto;background-color: #268fbe!important;width: 100%;border-radius: 0;">
    <a href="timeline.php" class="logo" style="color:white;min-width: fit-content;">
    	My Dear Friend
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPequeno" aria-controls="navbarPequeno" aria-expanded="false" aria-label="Toggle navigation" style="    background-color: white;">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarPequeno">
    <ul class="navbar-nav mr-auto" style="float:right">
      <li class="nav-item active">
      <a class="nav-link" href="timeline.php" style="padding-top: 20px;color:white">Página inicial</a>
      </li>
      <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? 'none' : ''; ?>"><a class="nav-link" 
      href="login.php" style="padding-top: 20px;color:white">Fazer Login</a>
      </li>
      <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? 'none' : ''; ?>"><a class="nav-link"
          href="cadastro.php" style="padding-top: 20px;color:white">Cadastrar-se</a>
      </li>
      <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? '' : 'none'; ?>">
      	<a class="nav-link" href="post.php">
	      <img
	          src="imagens/add.png" alt="Add-Post" height="30" width="30" class="addpost"
	        />
	       </a>
      </li>
      <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? '' : 'none'; ?>">
      	<a class="nav-link" href="interesses.php">
      		<img src="imagens/adotar2.png" height="30" width="30" class="" />
	    </a>
      </li>
      <li class="nav-item dropdown" style="display: <?php echo (!empty($logado)) ? '' : 'none'; ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img
                src="imagens/avatar2.png"
                alt="Perfil"
                height="30"
                width="30"
                class="avatar"
              />
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -75px;">
          <a class="dropdown-item" href="perfil.php">Minha conta</a>
          <a class="dropdown-item sair" href="logout.php">Sair</a>
        </div>
      </li>
  </div>
</nav>