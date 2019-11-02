<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <style>

    img{
         max-width: 20%;
         position: right top;
    }
    

.topright {
  position: absolute;
  top: 35px;
  right: 30px;
  
}
         
    </style>
    <title>Relatorio</title>
</head>
<body>
    <img src="<?php echo base_url(); ?>public/images/sc.jpg">
    <div align="right" class="topright">
       Rua coronel luis aires <br>
       Jardim-CE CEP:63290-000<br>
       Telefone(00)00000-0000<br>
       Dr nome sobrenome.
    </div>
    <hr></hr>
    <p>Nome:<?=$paciente['title']?> </p>
    <p>CPF: <?=$paciente['cpf']?></p>
    
<!--<table class="table">

<thead>

    <tr>
        <td>Nome :</td>
        <td>CPF :</td>
    </tr>

</thead>

<tbody>
    <tr>
        <td> <?=$paciente['title']?></td>
        <br>
        <td><?=$paciente['cpf']?></td>
    </tr>
</tbody>
</table>-->


<!-- PROTUARIOS -->
<h1>PRONTUARIOS</h1>

<?php foreach ($prontuario as $key):?>
<p><?=$key['prontuario']?></p>
<p><?=$key['creat_at']?></p>
<hr>
<?php endforeach;?>


<?php if($relatorio) {?>
<a href="<?=site_url('gerar-relatorio/').$paciente['id']?>">gerar Relatorio</a>
<?php }?>

</body>
</html>