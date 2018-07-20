<html>
    <head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Rastreamento</title>
   
  <link href="css/login_style.css" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

  <link rel="shortcut icon" href="img/favicon.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="imagens/favicon.ico" rel="shortcut icon">
      
  <link href="imagens/apple-touch-icon.png" rel="apple-touch-icon">
  <script src="javascript/jquery-2.2.2.min.js"></script>
</head>
<body> <!--/ Login-->
  <div class="logo"></div>
  <div class="login"> <!-- Login -->
    <h1>Acesse sua conta</h1><br>
	<div class="error">    
		<?php
						if(isset($_GET['error'])){
							echo "<script>$('#output').addClass('alert alert-danger animated fadeInUp'); setTimeout(function(){ $('#output').slideUp(); }, 5000);</script>";
							echo "Usuário ou senha incorretos.";
						}
						elseif(isset($_GET['desativado'])){
							echo "<script>$('#output').addClass('alert alert-danger animated fadeInUp'); setTimeout(function(){ $('#output').slideUp(); }, 5000);</script>";
							echo "Acesso não autorizado. A conta está definida como inativa.";
						}
						elseif(isset($_GET['timeout'])){
							echo "<script>$('#output').addClass('alert alert-danger animated fadeInUp'); setTimeout(function(){ $('#output').slideUp(); }, 5000);</script>";
							echo "Sessão expirada. Por favor, faça login novamente para continuar.";
						}
                    ?></div>
      <form class="form" method="post" action="login.php">
      <input name="admin" type="hidden" value="18">
      <input name="grupo" type="hidden" value="2">

      <p class="field">
        <input name="usuario" type="text" value="" placeholder="Usuário"/>

        <i class="fa fa-user"></i>
      </p><br>
	  
      <p class="field">
        <input name="senha" type="password" value="" placeholder="Senha" required />
        <i class="fa fa-lock"></i>
      </p><br>
      <p class="submit"><input type="submit" name="commit" value="Login"></p>
<!--
      <p class="remember">
        <input type="checkbox" id="remember" name="remember" />
        <label for="remember"><span>Remember Me</span></label>
      </p>

      <p class="forgot">
        <a href="#">Forgot Password?</a>
      </p>-->

    </form> </div> 
<div class="copyright">
    <p>Copyright &copy; 2018. <a href="#" target="_blank"></a> </p>
  </div></body>	
    
        <script src="javascript/bootstrap.min.js"></script>
    
</html>