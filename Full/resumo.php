<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset='utf-8' />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
        <!-- NECESSARIO UTILIZAR O JQUERY COMPLETO, PODENDO USAR O DO GOOGLE-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

		<title>Agenda</title>


		<link href='css/bootstrap.min.css' rel='stylesheet'>
		<link href='css/fullcalendar.min.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='css/pers.css' rel='stylesheet' />
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='js/jquery.mask.js'></script>
		<script src='locale/pt-br.js'></script>

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
		
		<script>

			$(document).ready(function() {
				$('#calendar').fullCalendar({

					plugins: [ 'list' ],

					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'listDay,listWeek,dayGridMonth'
					},

					views: {
        			listDay: { buttonText: 'lista de hoje' },
      				 listWeek: { buttonText: 'lista da semana' }
      				},

					defaultDate: Date(),
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					eventClick: function(event) {

						
						$('#visualizar #id').text(event.id);
						$('#visualizar #id').val(event.id);
						$('#visualizar #title').text(event.title);
						$('#visualizar #title').val(event.title);
						$('#visualizar #cpf').text(event.cpf);
						$('#visualizar #cpf').val(event.cpf);
						$('#visualizar #endereco').text(event.endereco);
						$('#visualizar #endereco').val(event.endereco);
						$('#visualizar #telefone').text(event.telefone);
						$('#visualizar #telefone').val(event.telefone);
						$('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #start').val(event.start.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #end').val(event.end.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #color').val(event.color);
						$('#visualizar').modal('show');
						return false;

					},
					
					selectable: true,
					selectHelper: true,
					select: function(start, end){
						$('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar').modal('show');						
					},

					 //https://fullcalendar.io/docs/events-json-feed
					 events: {
                        url: 'list_data.php',
                        cache: true
                    }

				});
			});
			
		</script>
	</head>
	<body>
		<div class="container">
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
		
			<div id='calendar'></div>
		</div>

		<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<!--h4 class="modal-title text-center">Dados do Paciente</h4>-->
					</div>
					<div class="modal-body">
						<div class="visualizar">
						<dl class="dl-horizontal">
							<dt>ID do Paciente</dt>
							<dd id="id"></dd>
							<dt>Nome do Paciente</dt>
							<dd id="title"></dd>
							<dt>Cpf do Paciente</dt>
							<dd id="cpf"></dd>
							<dt>Endereço do Paciente</dt>
							<dd id="endereco"></dd>
							<dt>Telefone do Paciente</dt>
							<dd id="telefone"></dd>
							<dt>Inicio da Consulta</dt>
							<dd id="start"></dd>
							<dt>Fim da Consulta</dt>
							<dd id="end"></dd>
						</dl>
						</div>
					</div>
				</div>
			</div>
		</div>		
		<script>


		//Mascara para o campo data e hora
		function DataHora(evento, objeto){
				var keypress=(window.event) ? event.keyCode : evento.which;
				campo = eval (objeto);
				if (campo.value == '00/00/0000 00:00:00'){
					campo.value=""
				}
			 
				caracteres = '0123456789';
				separacao1 = '/';
				separacao2 = ' ';
				separacao3 = ':';
				conjunto1 = 2;
				conjunto2 = 5;
				conjunto3 = 10;
				conjunto4 = 13;
				conjunto5 = 16;
				if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
					if (campo.value.length == conjunto1 )
					campo.value = campo.value + separacao1;
					else if (campo.value.length == conjunto2)
					campo.value = campo.value + separacao1;
					else if (campo.value.length == conjunto3)
					campo.value = campo.value + separacao2;
					else if (campo.value.length == conjunto4)
					campo.value = campo.value + separacao3;
					else if (campo.value.length == conjunto5)
					campo.value = campo.value + separacao3;
				}else{
					event.returnValue = false;
				}
			}


			$('.btn-canc-vis').on("click", function() {
				$('.form').slideToggle();
				$('.visualizar').slideToggle();
			});
			$('.btn-canc-edit').on("click", function() {
				$('.visualizar').slideToggle();
				$('.form').slideToggle();
			});
		</script>
	</body>
</html>
