<?php

include_once "conexao.php";
$result_events = "SELECT id, title,cpf ,endereco, telefone, color, start, end FROM paciente";
$resultado_events = mysqli_query($conn, $result_events);

$eventos = array();

while ($row_events = mysqli_fetch_assoc($resultado_events)) {
    $id = $row_events['id'];
    $title = $row_events['title'];
    $cpf = $row_events['cpf'];
    $endereco = $row_events['endereco'];
    $telefone = $row_events['telefone'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $end = $row_events['end'];

    $eventos[] = array('id' => $id, 'title' => $title, 'cpf' => $cpf ,'endereco' => $endereco,
    	'telefone' => $telefone, 'color' => $color, 'start' => $start, 'end' => $end);
}

echo json_encode($eventos);
//print_r($datas);

