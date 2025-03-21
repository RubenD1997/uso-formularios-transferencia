<?php

//Funcion para generar el html del teatro
function drawScenery($list = array()) {
	$html = '<table border="1">';
		$html .= '<thead>';
			$html .= '<tr>';
				$html .= '<th colspan="6">ESCENARIO</th>';
			$html .= '</tr>';
			$html .= '<tbody>';
				for($i = 0; $i < count($list); $i++) {
					$html .= '<tr>';
						for($j = 0; $j < count($list[$i]); $j++) {
							//Verifico si son las posiciones del escenario para añadirles negrilla con la tabla
							if(is_numeric($list[$i][$j])) {
								$html .= '<th>' . $list[$i][$j] . '</th>';
							} else {
								$html .= '<td>' . $list[$i][$j] . '</td>';
							}
						}
					$html .= '</tr>';
				}
			$html .= '</tbody>';
		$html .= '</thead>';
	$html .= '</table>';
	echo $html;
}


//Funcion para mostrar la alerta en caso de no cumplir las condiciones descriptas en la guía
function showAlert() {
	echo '<script>';
		echo 'alert("La operación no puede ser realizada");';
	echo '</script>';
}