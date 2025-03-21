<?php

/*
Desarrollador: Ruben Dario Rocha Lizcano 
CC: 1079185602
Programa: Desarrollo Web con PHP
Evidencia: Taller “Uso de formularios para transferencia”
*/


//Se incluyen los archivos necesarios con la funciones necesarias para ejecutar el programa
include_once 'processesArray.php';
include_once 'drawTheater.php';


//se obtiene la lista por defecto
$list = getDefaultList();
if($_POST && $_POST['txtActionForm'] === 'Enviar') {
	$list = json_decode($_POST['txtList'], true);
	if(!empty($_POST['txtRow']) && !empty($_POST['txtPosition']) && isset($_POST['txtAction'])) {
		$row = intval($_POST['txtRow']);
		$position = intval($_POST['txtPosition']);
		//verifica los distinto estados del puesto para verificar si son validos y estan disponibles
		$newStatePosition = checkPositionState(
			$list,
			$row, 
			$position,
			$_POST['txtAction']
		);
		if(!empty($newStatePosition)) {
			$list[$row][$position] = $newStatePosition;
		} else {
			//muestra la alerta de operación no valida
			showAlert();
		}
	}
}
echo '<center>';
//genera la tabla de los puestos del teatro
drawScenery($list);
?>
	<form method="post">
		<!-- textarea que guarda el estado actual de los puestos del teatro -->
		<textarea type="hidden" name="txtList" style="display: none;"><?php echo json_encode($list); ?></textarea>
		<table>
			<tr>
				<td>Fila:</td>
				<td>
					<input type="number" name="txtRow" style="width: 60px;">
				</td>
			</tr>
			<tr>
				<td>Puesto:</td>
				<td>
					<input type="number" name="txtPosition" style="width: 60px;">
				</td>
			</tr>
			<tr>
				<td>Reservar:</td>
				<td>
					<input type="radio" name="txtAction" value="R">
				</td>
			</tr>
			<tr>
				<td>Comprar:</td>
				<td>
					<input type="radio" name="txtAction" value="V">
				</td>
			</tr>
			<tr>
				<td>Liberar:</td>
				<td>
					<input type="radio" name="txtAction" value="L">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Enviar" name="txtActionForm">
				</td>
				<td>
					<input type="submit" value="Borrar" name="txtActionForm">
				</td>
			</tr>
		</table>
	</form>
</center>
