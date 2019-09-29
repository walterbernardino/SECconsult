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
<form action="<?php echo base_url('Admin/cadastro'); ?>" method="post">
  <div class="form-row" >
    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="texte" class="form-control" id="inputEmail4" name="nome" placeholder="Nome ">
    </div>
    <div class="form-group col-md-6">
      <label for="endereço">Endereço</label>
      <input type="text" class="form-control" id="inputPassword4" name="endereco" placeholder="endereço">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6" >
    <label for="inputAddress">Descrição</label>
    <input type="tel" class="form-control" id="inputAddress" name="descricao" placeholder="Descriçao">
  </div>
  <div class="form-group col-md-6">
    <label for="telefone">Telefone</label>
    <input type="text" class="form-control" id="inputPassword4" name="telefone" placeholder="endereço">
  </div>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Data da consulta</label>
    <input type="date" class="form-control" id="inputAddress2" name="data" placeholder="">
  </div>
  <div class="form-row">
  </div>
  <div class="form-group">
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
<style>
    table {
    width: 100%;
    border: solid 1px;
    }
    tr {
        border: solid 1px;
    }
    </style>

    <br><br>
<table>
    <tr>
        <td>Nome</td>
        <td>Descrição</td>
        <td>Telefone</td>
        <td>Endereco</td>
        <td>Data</td>
        <td>Deletar</td>
    </tr>
    
        <?php foreach ($agenda as $key): ?>
        <tr>
            <td><?php echo $key['nome']; ?></td>
            <td><?php echo $key['descricao']; ?></td>
            <td><?php echo $key['telefone']; ?></td>
            <td><?php echo $key['endereco']; ?></td>
            <td><?php echo $key['dateAgenda']; ?></td>
            <td><a href="<?php echo base_url("Admin/deletar/").$key['id'];?>">Deletar</a></td>
            </tr>
        <?php endforeach;?>
  
</table>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>