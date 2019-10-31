<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
    <title>Relatorio</title>
</head>
<body>
    
<table class="table">

<thead>

    <tr>
        <td>Nome</td>
        <td>CPF</td>
    </tr>

</thead>

<tbody>
    <tr>
        <td> <?=$paciente['title']?></td>
        <br>
        <td><?=$paciente['cpf']?></td>
    </tr>
</tbody>
</table>


<!-- PROTUARIOS -->
<h1>PRONTUARIOS</h1>

<?php foreach ($prontuario as $key):?>
<p><?=$key['prontuario']?></p>
<p><?=$key['creat_at']?></p>
<?php endforeach;?>


<?php if($relatorio) {?>
<a href="<?=site_url('gerar-relatorio/').$paciente['id']?>">gerar Relatorio</a>
<?php }?>

</body>
</html>