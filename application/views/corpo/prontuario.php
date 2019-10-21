<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Tela de cadastro</title>
  </head>
  <body>


<?php foreach ($eventos as $key): ?>
<div class="modal fade bd-example-modal-xl<?php echo $key['id']; ?>" id="modalCadastrarEscola" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h5" id="mySmallModalLabel">Dados do Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success d-none" id="sucesso" role="alert">
                   Pronruario Cadastrado com sucesso!
                </div>
                <form method="POST" class="formCadastrarEscola">
                    <div class=" form-row">
                        <div class="col-12 col-sm-4 col-md-12">
                            <h5>Nome :</h5>
                            <!--<input type="text" name="esc_descricao" id="esc_descricao" class="form-control"  required >-->
                            <?php echo $key['title']; ?>
                        </div>
                       
                    </div>
                    <input type="hidden" name="id" value="<?=$key['id']?>">
                    <div class="form-row">
                        <div class="col-12 col-sm-3 col-md-3">
                            <!--<label>CPF</label>
                            <input type="text" name="esc_cep" id="esc_cep" class="form-control" required>-->
                            <h5>cpf :</h5>
                            <?php echo $key['cpf']; ?>
                        </div>
                        
                        
                        <div class="col-12 col-sm-6 col-md-9">
                            <!--<label>Endereço</label>
                            <input type="text" name="esc_cidade" id="esc_cidade" class="form-control" required>-->
                            <h5>Endereço :</h5>
                            <?php echo $key['endereco']; ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-sm-5 col-md-6">
                            <!--<label>Telefone</label>
                            <input type="text" name="esc_rua" id="esc_rua" class="form-control" required>-->
                            <h5>Telefone :</h5>
                            <?php echo $key['telefone']; ?>
                        </div>

                        <div class="col-12 col-sm-3 col-md-6">
                            <!--<label>Data</label>
                            <input type="text" name="esc_data" id="esc_data" class="form-control" required>-->
                            <h5>Data da consulta :</h5>
                            <?php echo $key['start']; ?>
                        </div>

                        <div class="col-12 col-sm-3 col-md-6" >
                            <!--<label>Data</label>
                            <input type="text" name="esc_data" id="esc_data" class="form-control" required>-->
                            <h5>Prontuario anteriores: </h5>
                            <a href="<?=base_url('prontuario/').$key['id']?>" target="_blank">Ver prontuarios</a>
                        </div>

                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="input-group-prepend">
                        <h5>Prontuario :</h5>
                        </div>
                        <textarea name="prontuario" id="prontuario" class="form-control" aria-label="With textarea" rows="8" cols="50"></textarea>
                    </div>

                    </div><br>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ">Cadastrar Prontuario</button>
                        <button type="button" class="btn btn-primary " class="close" data-dismiss="modal" aria-label="Fechar" data-toggle="modal" data-target=".bd-example-modal-lg">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>


<div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Endereço</th>
      <th scope="col">Telefone</th>
      <th scope="col">Data da consulta</th>
      <th scope="col"></th>
    </tr>
  </thead>
    <tbody>
    <?php foreach ($eventos as $key): ?>
        <tr>
        
        <th scope="row"><?php echo $key['title']; ?></th>
            <td><?php echo $key['cpf']; ?></td>
            <td><?php echo $key['endereco']; ?></td>
            <td><?php echo $key['telefone']; ?></td>
            <td><?php echo $key['start']; ?></td>
            <td><button type="button" class="btn btn-primary"  data-toggle="modal" data-target=".bd-example-modal-xl<?php echo $key['id']; ?>">visualizar</button></td>
        </tr>
        <?php endforeach;?>
    </tbody>
  </table>
  </div>
 </div>
</div>

  <div class="album py-5 bg-light">

  

  </div>

  <script>
  $('.formCadastrarEscola').each((index, element) => {
    $(element).submit(function(event){
        event.preventDefault();
        $.post('Prontuario/salvar', $(element).serialize(), function (resposta){
            if(resposta === "true"){
                $('#sucesso').html('Dados cadastrados com sucesso!');
                $('#sucesso').attr('class', 'alert alert-success');
            } else {
                $('#sucesso').html('Erro ao salvar os dados 1');
                $('#sucesso').attr('class', 'alert alert-danger');
            }
        }).fail(function (){
            $('#sucesso').html('Erro ao salvar os dados 2');
            $('#sucesso').attr('class', 'alert alert-danger');
        });
    });
    $('#modalCadastrarEscola').on('hidden.bs.model', function(){
       $('#sucesso').attr('class', 'alert alert-success d-none');
    });
  }) 
</script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  
</html>