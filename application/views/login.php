<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>SECconsult</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>login/images/icons/sec.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>login/css/util.css">
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>login/css/main.css">-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>login/css/per.css">

	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style=" background-image: url('login/images/fundo_login.jpg');" >
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

			<form class="login100-form validate-form" id="loginUser"  method="post" class="form-signin">
				<span class="login100-form-title p-b-37">
					Login
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="informe o email">
					<input class="input100" type="email" name="login" id="inputEmail" placeholder="Email" required autofocus name = "login" id="inputEmail" class="form-control">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "informe a senha">
					<input class="input100" type="password" name="senha" id="inputPassword" placeholder="senha" required name = "senha" id="inputPassword" class="form-control">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit">
						Entrar
					</button>
				</div>

				<br>
				<div class="alert alert-danger alert-dismissible fade show show-login" role="alert">
  				Login ou senha invalido
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
 				 </button>
				</div>	

			</form>

			
		</div>
	</div>
	
	<script>
	
	$(document).ready(function(){
	// $('#errolog').hide(); //Esconde o elemento com id errolog
	$('.show-login').hide();
	$('#loginUser').submit(function(){ 	//Ao submeter formulário
		var login=$('#inputEmail').val();	//Pega valor do campo email
		var senha=$('#inputPassword').val();	//Pega valor do campo senha
		$.ajax({			//Função AJAX
			url:"./Login/RealizarLogin",			//Arquivo php
			type:"post",				//Método de envio
			data: "login="+login+"&senha="+senha,	//Dados
			dataType : "json",
   			success: function (result){	
						   //Sucesso no AJAX
						//    JSON .parse(result);
						   console.log(result);
                		if(result.true){						
                			location.href='admin'	//Redireciona
                		}else {
                			$('.show-login').show();		//Informa o erro
                		}
            		}
		})
		return false;	//Evita que a página seja atualizada
	})
})

	</script>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>login/vendor/select2/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>login/js/main.js"></script>


</body>
</html>