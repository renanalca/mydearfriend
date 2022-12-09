

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  if(trim($_POST["hdnSalvar"]) == '1'){
        
        include_once('config.php');


        $nome = $_POST['nomecompleto'];
        $email = $_POST['email'];
        $data1 = $_POST['data1'];
        $data2 = $_POST['data2'];
        $data3 = $_POST['data3'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];


        $sql = "SELECT * FROM  Cliente where Email = '{$_POST['email']}'" ;

        $result = mysqli_query($link, $sql);

        $row = mysqli_fetch_array($result);

        $idInserido = isset($row['id_Cliente']) ? $row['id_Cliente'] : '';

        if($idInserido == ''){
        
            if(mysqli_query($link, "INSERT INTO Cliente(nome,CPF,dataNascimento,Telefone,Email,Senha,statusCliente) 
            VALUES ('{$nome}','{$cpf}','{$data3}-{$data2}-{$data1}','{$telefone}','{$email}','{$senha}',1)")){
                header('Location: login.php?success=1');
            }else{
                $erro = 'Ocorreu um erro ao cadastrar seu usuário, tente novamente!';
            }

        }else{
            $erro = 'Já existe um usuário criado para este email!';
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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

    <div id="areacad">
        <form method="POST" id="formulariocad" name="formulariocad" autocomplete="off">
            <input type="hidden" id="hdnSalvar" name="hdnSalvar" value="0">

                <br><br>    
                <div class="logocad">
                <a href="timeline.php"><h1 class="logotxtcad">MY DEAR FRIEND</h1></a>
                </div>

                <div class="titulocad">
                <h1 class="txtcad">Cadastro</h1>
                </div>

                <ul class="ras">
                <form action="PHP_insc.php" method="post"></form>
                <br>
            <div class="infocampos">
                <input class="camposcad" type="text" placeholder="Nome Completo" name="nomecompleto" id="nomecompleto">
                <br><br>

                <input class="camposcad" type="text" placeholder="E-mail" name="email" id="email">
                <br><br>
               
                <span class="spannascimento">Data de nascimento</span><br>
                 <div class="allnascimento">
                    
                    <div class="diaselect"><select aria-label="Dia" name="data1" id="day" title="Dia" class="1">
                        <option value="" selected>Selecione o dia</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select></div>

                    <div class="messelect"><select aria-label="Mês" name="data2" id="month" title="Mês" class="2">
                        <option value="" selected>Selecione o mês</option>
                        <option value="1">Jan</option>
                        <option value="2">Fev</option>
                        <option value="3">Mar</option>
                        <option value="4">Abr</option>
                        <option value="5">Mai</option>
                        <option value="6">Jun</option>
                        <option value="7">Jul</option>
                        <option value="8">Ago</option>
                        <option value="9">Set</option>
                        <option value="10">Out</option>
                        <option value="11">Nov</option>
                        <option value="12">Dez</option>
                    </select></div>

                    <div class="anoselect"><select aria-label="Ano" name="data3" id="year" title="Ano" class="3">
                        <option value="" selected>Selecione o ano</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                        <option value="1979">1979</option>
                        <option value="1978">1978</option>
                        <option value="1977">1977</option>
                        <option value="1976">1976</option>
                        <option value="1975">1975</option>
                        <option value="1974">1974</option>
                        <option value="1973">1973</option>
                        <option value="1972">1972</option>
                        <option value="1971">1971</option>
                        <option value="1970">1970</option>
                        <option value="1969">1969</option>
                        <option value="1968">1968</option>
                        <option value="1967">1967</option>
                        <option value="1966">1966</option>
                        <option value="1965">1965</option>
                        <option value="1964">1964</option>
                        <option value="1963">1963</option>
                        <option value="1962">1962</option>
                        <option value="1961">1961</option>
                        <option value="1960">1960</option>
                        <option value="1959">1959</option>
                        <option value="1958">1958</option>
                        <option value="1957">1957</option>
                        <option value="1956">1956</option>
                        <option value="1955">1955</option>
                        <option value="1954">1954</option>
                        <option value="1953">1953</option>
                        <option value="1952">1952</option>
                        <option value="1951">1951</option>
                        <option value="1950">1950</option>
                        <option value="1949">1949</option>
                        <option value="1948">1948</option>
                        <option value="1947">1947</option>
                        <option value="1946">1946</option>
                        <option value="1945">1945</option>
                        <option value="1944">1944</option>
                        <option value="1943">1943</option>
                        <option value="1942">1942</option>
                        <option value="1941">1941</option>
                        <option value="1940">1940</option>
                        <option value="1939">1939</option>
                        <option value="1938">1938</option>
                        <option value="1937">1937</option>
                        <option value="1936">1936</option>
                        <option value="1935">1935</option>
                        <option value="1934">1934</option>
                        <option value="1933">1933</option>
                        <option value="1932">1932</option>
                        <option value="1931">1931</option>
                        <option value="1930">1930</option>
                        <option value="1929">1929</option>
                        <option value="1928">1928</option>
                        <option value="1927">1927</option>
                        <option value="1926">1926</option>
                        <option value="1925">1925</option>
                        <option value="1924">1924</option>
                        <option value="1923">1923</option>
                        <option value="1922">1922</option>
                        <option value="1921">1921</option>
                        <option value="1920">1920</option>
                        <option value="1919">1919</option>
                        <option value="1918">1918</option>
                        <option value="1917">1917</option>
                        <option value="1916">1916</option>
                        <option value="1915">1915</option>
                        <option value="1914">1914</option>
                        <option value="1913">1913</option>
                        <option value="1912">1912</option>
                        <option value="1911">1911</option>
                        <option value="1910">1910</option>
                        <option value="1909">1909</option>
                        <option value="1908">1908</option>
                        <option value="1907">1907</option>
                        <option value="1906">1906</option>
                        <option value="1905">1905</option>
                    </select></div>
                 </div>
                    <br>
                
                <input class="camposcad" type="text"  placeholder="CPF" maxlength="14" name="cpf" id="cpf">
                

                <br><br>
                <input class="camposcad" type="text"  placeholder="Telefone" name="telefone" id="telefone"><br><br>
                <input class="camposcad" type="password"  placeholder="Senha" name="senha" id="senha"><br><br>
                <label for="confirmarPrivacidade" style="width: 95%;font-size: 12px;font-style: italic;color:white">
                    <input type="checkbox" id="confirmarPrivacidade" name="confirmarPrivacidade" value="1"> A proteção da privacidade e dos dados pessoais constitui um compromisso fundamental da My Dear Friend. Por favor consulte a nossa política de privacidade <a style="color:red" target="_blank" href="termoPrivacidade.php">aqui</a> e confirme a sua leitura antes de enviar o formulário.</label>
            </div>
                
                <br>
                <br>
                <div class="buttoncad">
                    <input type="button" class="buttonr" onmouseover="this.style.backgroundColor='#c23297';return true;"
                    onmouseout="this.style.backgroundColor='#FF89C9';return true;" onclick="cadastrar()" value="Cadastrar-se">
                
                </div> 
                <br>
                <div class="jatemcad">
                <span class="all">Ja tem uma conta? </span>
                    <a href="login.php" class="conta">
                <span>&nbsp;&nbsp;Login</span>
                    </a><div>

                    <br><br><br>
                </li></ul>
        </form>
    </div>

  <?php include "footer.php" ?>

  <script>
    $('#cpf').mask('000.000.000-00');
    $('#telefone').mask('(00) 00000-0000');

    function cadastrar(){
        var mensagem = '';

        if(document.getElementById('nomecompleto').value == ''){
          mensagem = mensagem + '\n- Nome completo'
        }

        if(document.getElementById('email').value == ''){
          mensagem = mensagem + '\n- E-mail'
        }else if((document.getElementById('email').value.indexOf("@") == -1)||(document.getElementById('email').value.indexOf(".") == -1)){
          mensagem = mensagem + '\n- E-mail inválido'
        }
        if(document.getElementById('day').value == ''){
          mensagem = mensagem + '\n- Dia de nascimento'
        }

        if(document.getElementById('month').value == ''){
          mensagem = mensagem + '\n- Mês de nascimento'
        }

        if(document.getElementById('year').value == ''){
          mensagem = mensagem + '\n- Ano de nascimento'
        }

        if(document.getElementById('cpf').value == ''){
          mensagem = mensagem + '\n- CPF'
        }

        if(document.getElementById('telefone').value == ''){
          mensagem = mensagem + '\n- Telefone'
        }

        if(document.getElementById('senha').value == ''){
          mensagem = mensagem + '\n- Senha'
        }else if(document.getElementById('senha').value.length < 6){
          mensagem = mensagem + '\n- Senha mínima de 6 caracteres'
        }

        if(document.querySelectorAll("input[name=confirmarPrivacidade]:checked").length == 0){
          mensagem = mensagem + '\n- Política de privacidade'
        }

        if(mensagem != ''){
          alert('Para prosseguir, preencha os seguintes campos:\n' + mensagem);
        }else{
          document.getElementById('hdnSalvar').value = '1';
          document.getElementById('formulariocad').submit();
        }
    }
  </script>
</body>
</html>      