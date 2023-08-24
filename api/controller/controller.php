<?php
require_once "C:/wamp64/www/flag/model/model.php";

function getJson($dados)
{
	$randomPaises = array_rand($dados, 4);
	$paisesSorteado = $randomPaises[0];

	shuffle($randomPaises);

	$data = array(
		'status' => 'success',
		'countryData' => $dados[$paisesSorteado],
		'countries' => [
			$dados[$randomPaises[0]]['flag_name'],
			$dados[$randomPaises[1]]['flag_name'],
			$dados[$randomPaises[2]]['flag_name'],
			$dados[$randomPaises[3]]['flag_name'],
		]
	);

	return json_encode($data);
}


function getData($continente = null)
{
	$dados = getCountries($continente);
	return getJson($dados);
}
