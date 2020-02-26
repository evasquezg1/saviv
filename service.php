<?php
	require("saviv.php");
	$saviv = new Saviv();

	$task = $_REQUEST['task'];

	switch($task){
		case 'insertDepartamento':
			$saviv->insertDepartamento($_POST);
			echo '<script>window.location.href="index.php";</script>';
		break;

		case 'insertEmpleado':
			$saviv->insertEmpleado($_POST);
			echo '<script>window.location.href="index.php";</script>';
		break;

		case 'getNumEmplDep':
			echo json_encode($saviv->getNumEmplDep());
		break;

		case 'getEmplDep':
			echo json_encode($saviv->getEmplDep());
		break;

		case 'getEmplDepSal':
			echo json_encode($saviv->getEmplDepSal());
		break;
	}
?>