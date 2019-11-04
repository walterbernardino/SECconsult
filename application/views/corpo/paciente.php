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
h1{
  color: #479b9b;
}
hr.teste{
  width: 500px;
  color: black;
  height: 2px;
}
b{
  color: green;
  text-align: center;

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
    <hr>
    <p>Nome:<?=$paciente['title']?> </p>
    <p>CPF: <?=$paciente['cpf']?></p>


<!-- PROTUARIOS -->
<h1>PRONTUÁRIOS</h1>

<?php foreach ($prontuario as $key):?>
<p><?=$key['prontuario']?></p>
<p><?=$key['creat_at']?></p>
<hr>
<?php endforeach;?>

<br><br><br><br><br>

<hr class="teste"><p align="center">Assinatura</p>


<?php if($relatorio) {?>
<a href="<?=site_url('gerar-relatorio/').$paciente['id']?>">gerar Relatorio</a>
<?php }?>

</body>
</html>