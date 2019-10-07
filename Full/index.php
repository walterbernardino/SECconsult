<?php
session_start();
include_once("conexao.php");
$result_events = "SELECT id, title, cpf, endereco, telefone, color, start, end FROM eventos";
$resultado_events = mysqli_query($conn, $result_events);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset='utf-8' />
		<title>Agenda</title>
		<link href='css/bootstrap.min.css' rel='stylesheet'>
		<link href='css/fullcalendar.min.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='css/personalizado.css' rel='stylesheet' />
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='locale/pt-br.js'></script>
		<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: Date(),
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					eventClick: function(event) {

						$("#apagar_evento").attr("href", "proc_apagar_evento.php?id=" + event.id);
						
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
					events: [
						<?php
							while($row_events = mysqli_fetch_array($resultado_events)){
								?>
								{
								id: '<?php echo $row_events['id']; ?>',
								title: '<?php echo $row_events['title']; ?>',
								cpf: '<?php echo $row_events['cpf']; ?>',
								endereco: '<?php echo $row_events['endereco']; ?>',
								telefone: '<?php echo $row_events['telefone']; ?>',
								start: '<?php echo $row_events['start']; ?>',
								end: '<?php echo $row_events['end']; ?>',
								color: '<?php echo $row_events['color']; ?>',
								},<?php
							}
						?>
					]
				});
			});
			
			//Mascara para o campo data e hora
			function DataHora(evento, objeto){
				var keypress=(window.event)?event.keyCode:evento.which;
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

			
			
		
		</script>
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				<h1>Agenda</h1>
			</div>
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
						<h4 class="modal-title text-center">Dados do Paciente</h4>
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
							<button class="btn btn-canc-vis btn-warning">Editar</button>
						</div>
						
						<div class="form">
							<form class="form-horizontal" method="POST" action="proc_edit_evento.php">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-4 control-label">Nome do Paciente</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="title" id="title" placeholder="Nome do paciente">
									</div>
								</div>

								<div class="form-group">
    							<label for="nome" class="col-sm-4 control-label">Cpf do Paciente</label>
    							<div class="col-sm-8">
      							<input type="text" class="form-control" name="cpf" id="cpf" placeholder="Cpf do Paciente">
    							</div>
  								</div>

								<div class="form-group">
    							<label for="nome" class="col-sm-4 control-label">Endereço do Paciente</label>
    							<div class="col-sm-8">
      							<input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço do Paciente">
    							</div>
  								</div>

  								<div class="form-group">
    							<label for="nome" class="col-sm-4 control-label">Telefone do Paciente</label>
    							<div class="col-sm-8">
      							<input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone do Paciente">
    							</div>
  								</div>

								<div class="form-group">
    							<label for="nome" class="col-sm-4 control-label">Situação da consulta</label>
    							<div class="col-sm-8">
      							<select name="color" class="form-control" id="color">
										<option value="">Selecione</option>			
										<option style="color:#FFD700;" value="#FFD700">A confirma</option>
										<option style="color:#0071c5;" value="#0071c5">Reagendado</option>	
										<option style="color:#228B22;" value="#228B22">Confirmado</option>
										<option style="color:#8B0000;" value="#8B0000">Cancelado</option>
									</select>
    							</div>
  								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-4 control-label">Data da consulta</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-4 control-label">Fim da consulta</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
									</div>
								</div>

								<input type="hidden" class="form-control" name="id" id="id">
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="button" class="btn btn-canc-edit btn-primary">Cancelar</button>
										<button type="submit" class="btn btn-warning">Salvar Alterações</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center">Cadastrar Paciente</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="POST" action="proc_cad_evento.php">
						<div class="form-group">
    							<label for="nome" class="col-sm-4 control-label">Nome do Paciente</label>
    							<div class="col-sm-8">
      							<input type="text" class="form-control" name="title" placeholder="Nome do Paciente">
    							</div>
  					</div>

					  <div class="form-group">
    							<label for="nome" class="col-sm-4 control-label">Cpf do Paciente</label>
    							<div class="col-sm-8">
      							<input type="text" class="form-control" name="cpf" placeholder="cpf do Paciente">
    							</div>
  					</div>

  					<div class="form-group">
    							<label for="nome" class="col-sm-4 control-label">Endereço do Paciente</label>
    							<div class="col-sm-8">
      							<input type="text" class="form-control" name="endereco" placeholder="Endereço do Paciente">
    							</div>
  					</div>

  					<div class="form-group">
    							<label for="nome" class="col-sm-4 control-label">Telefone do Paciente</label>
    							<div class="col-sm-8">
      							<input type="text" class="form-control" name="telefone" placeholder="Telefone do Paciente">
    							</div>
  					</div>

  					<div class="form-group">
    							<label for="nome" class="col-sm-4 control-label">Situação da consulta</label>
    							<div class="col-sm-8">
      							<select name="color" class="form-control" id="color">
										<option value="">Selecione</option>			
										<option style="color:#FFD700;" value="#FFD700">A confirma</option>
										<option style="color:#0071c5;" value="#0071c5">Reagendado</option>	
										<option style="color:#228B22;" value="#228B22">Confirmado</option>
										<option style="color:#8B0000;" value="#8B0000">Cancelado</option>
									</select>
    							</div>
  					</div>

  					<div class="form-group">
    							<label for="nome" class="col-sm-4 control-label">Inicio da consulta</label>
    							<div class="col-sm-8">
      							<input type="text" class="form-control" name="start" id="start" onkeypress="DataHora(event,this)">
    							</div>
  					</div>
  					<div class="form-group">
    							<label for="nome" class="col-sm-4 control-label">Fim da consulta</label>
    							<div class="col-sm-8">
      							<input type="text" class="form-control" name="end" id="end" onkeypress="DataHora(event,this)">
    							</div>
  					</div>
  					

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-success">Cadastrar</button>
					    </div>
					  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<script>
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
