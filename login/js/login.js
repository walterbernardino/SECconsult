$('#loginUser').submit(function(event){
	$.ajax({
		type: 'POST',
		url: 'Usuario/realizar_login',
		data: $('#loginUser').serialize(),
		beforeSend: function(){
			$('#alerta-login').html('Carregando...');
			$('#alerta-login').attr('class', 'alert alert-warning');	
		},
		success: function(r, s){
			var resposta = JSON.parse(r);
			switch(resposta){
				default:
				$('#alerta-login').html('Login realizado com sucesso!');
				$('#alerta-login').attr('class', 'alert alert-success');
				logar(r);
				break;
				case '2':
				$('#alerta-login').html('E-mail e/ou senha incorreta.');
				$('#alerta-login').attr('class', 'alert alert-danger');
				break;
				case '3':
				$('#alerta-login').html('Preencha todos os campos.');
				$('#alerta-login').attr('class', 'alert alert-warning');
				break;
				case '4':
				$('#alerta-login').html('Este usuÃ¡rio nÃ£o existe.');
				$('#alerta-login').attr('class', 'alert alert-warning');
				break;
			}
		},
		error: function(){
			$('#alerta-login').html('Erro ao realizar Login.');
			$('#alerta-login').attr('class', 'alert alert-danger');
		}
	});
});
$('#boxLogin').on('hidden.bs.model', function(){
	$('#alerta-login').attr('class', 'alert alert-success d-none');
});

function logar (id) {
	var id_user = JSON.parse(id);
	window.location.href = 'user/' + id_user;
}