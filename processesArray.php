<?php

function checkPositionState($list = array(), $row = 0, $position = 0, $action = '') {
	//Verifico si existe el puesto con los parametros ingresados
	if(!isset($list[$row][$position])) {
		return '';
	}
	$state = $list[$row][$position];
	if(in_array($action, array('R','L')) && $state === $action) {
		return $state;
	}
	//Verifico los distintos items descriptos en la guía 
	if($state === 'L' && in_array($action, array('V','R'))) {
		return $action;
	} else if ($state === 'R' && in_array($action, array('L','V'))) {
		return $action;
	} else if($state === 'V' && !in_array($action, array('L','R','V'))) {
		return $action;
	}
	return '';
}

//funcion para generar la lista inicial
function getDefaultList() {
	return array(
		array('', 1, 2, 3, 4, 5),
		array(1, 'L', 'L', 'L', 'L', 'L'),
		array(2, 'L', 'L', 'L', 'L', 'L'),
		array(3, 'L', 'L', 'L', 'L', 'L'),
		array(4, 'L', 'L', 'L', 'L', 'L'),
		array(5, 'L', 'L', 'L', 'L', 'L'),
	);
}