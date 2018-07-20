
<!DOCTYPE html>
<html lang="pt-br">
<head>
<body>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Server Horus GPS</title>
	<link rel="shortcut icon" href="imagens/icone.png">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/login.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">	
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script>
	<script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="plugins/nprogress/nprogress.js"></script>
	<script type="text/javascript" src="assets/js/login.js"></script>

	
	<style>
	* {
		 margin: 0;
		 padding: 0;
		 box-sizing: border-box;
	 }
	 body, html {
		 width: 100%;
		 height: 100%;
		 font-family: sans-serif;
		 font-size:22px;
		 line-height: 1.3;
		 text-align: center;
	 }
	 .bg_fundo {
		 position: fixed; 
		 right: 0; 
		 bottom: 0;
		 min-width: 100%; 
		 min-height: 100%;
		 width: auto; 
		 height: auto; 
		 z-index: -1000;
		 background: url(imagens/bg.jpg) no-repeat;
		 background-size: cover; 
	 }
	 .body {
 	 	border-radius: 14px;
		background: rgba(255,255,255,0.7);
		margin: 3% auto 20px auto;
		max-width: 310px;
		padding: 4px 25px 15px 25px;
		box-shadow: 10px 10px 5px #000000;
	 }
	 .form-actions {
	 	background: rgba(255,255,255,0.4);
	 	margin-top: 20px;
	 	padding-top: 10px;
	 	padding-bottom: 42px;
	 	height: 14px;
	 }
	 h4 {
	 	margin-top: -24px;
	 	font-family: sans-serif;
		font-size: 16px;
	 }
	 
	 .borda_texto{
	-webkit-text-stroke-width: 1px;
	-webkit-text-stroke-color: #000000;
	font-size: 3em; color: #fffdd9;
	}
	
	<style>
    -webkit-text-stroke-width: 1px; /* largura da borda */
    -webkit-text-stroke-color: #ffffff; /* cor da borda */
   </style>
	</style>
	</body>

</head>
<body    class="login">

	<div class="bg_fundo">
 	</div> 
 	<div class="body">
		<div class="content">
			<div class="logo">
				<img src="imagens/logo.png" alt="logo" style="width:220px;" />		
			</div>		
			<form class="form-vertical login-form" action="login.php" method="post">
				<input name="admin" type="hidden" value="18">
				<input name="grupo" type="hidden" value="2"><br>
  				<div id="output" class="col-xs-12"> 
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
  				</div>								
				<div class="alert fade in alert-danger" style="display: none;">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Por favor entre com usuário e senha.
				</div>
				
				<div class="form-group">
				
    				<div class="input-icon"> <i class="icon-user"></i> 
     					<input type="text" name="usuario" class="form-control" placeholder="Usuário" autofocus="autofocus"  data-rule-required="true" data-msg-required="Por favor, insira seu nome de usuário." />
					</div>
				</div>
				<div class="form-group">
				
    				<div class="input-icon"> <i class="icon-lock"></i> 
      					<input type="password" name="senha" class="form-control" placeholder="Senha" required data-rule-required="true" data-msg-required="Por favor, insira sua senha." />
					</div>
				</div>
				<div class="form-actions">
					<label class="checkbox pull-left"><input type="checkbox" class="uniform" name="remember"> Lembrar-me</label>
					<button name="commit" value="Login" type="submit" class="submit btn btn-primary pull-right">
						ACESSAR <i class="icon-angle-right"></i>
					</button>
				</div>
			</form>			
		</div>
		
		 
			<!--Editado por: Jorge Martins - Server Horus GPS.
			Função de reenvio de senha. Desativada.

		<div class="inner-box">
			<div class="content">
				<i class="icon-remove close hide-default"></i>
				<a href="usuario/account_change.php" class="forgot-password-link">Esqueceu a senha?</a>
				<form class="form-vertical forgot-password-form hide-default" action="#" method="post">
					<div class="form-group">
	          			<div class="input-icon"> <i class="icon-envelope"></i> 
	           				<input type="text" id="txtEmail" name="auth_email" class="form-control" placeholder="Insira o endereço de e-mail" data-rule-required="true" data-rule-email="true" data-msg-required="Por favor digite o seu e-mail." />
						</div>
					</div>
					<button id="btnChangeLogin" type="submit" class="submit btn btn-default btn-block">
						Redefinir sua senha
					</button>
				</form>
				<div class="forgot-password-done hide-default">
					<i class="icon-ok success-icon"></i>
					<span>Recuperação de senha concluída, veja sua caixa de e-mail.</span>
				</div>
			</div> 
		</div>
		
	</div>
	<div class="footer" class="col-md-2">
	 
	</div>-->
	<center><div align="center" id="footer"  class="borda_texto">
    <h6><font size="4" color="#ffffff"><b>Contatos:<br>
    <font color="#ffffff">96 99133-6464<br></font>
	</center></font></h6></div>
</body>
<script src="javascript/bootstrap.min.js"></script>
<script src="javascript/jquery-1.10.2.js"></script>
<script src="javascript/bootstrap.js"></script>
<script src="javascript/jquery.validate.min.js"></script>
<script src="javascript/bootstrap-waitingfor.js"></script>
</html>