<!-- USARIOS -->

<table>

<thead>

    <tr>
        <td>Nome</td>
        <td>Endereco</td>
        <td>CPF</td>
        <td>TELEFONE</td>
        
    </tr>

</thead>

<tbody>
    <tr>
        <td> <?=$paciente['title']?></td>
        <td><?=$paciente['endereco']?></td>
        <td><?=$paciente['cpf']?></td>
        <td><?=$paciente['telefone']?></td>
   
    </tr>
</tbody>
</table>


<!-- PROTUARIOS -->
<h1>PRONTUARIOS</h1>

<?php foreach ($prontuario as $key):?>
<p><?=$key['prontuario']?></p>
<?php endforeach;?>
