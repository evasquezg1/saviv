<?php
	require("saviv.php");
	$saviv = new Saviv();

	$departamentos = $saviv->getDepartamentos();	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Consulta de archivos</title>
	<link href="http://paxzupruebas.com/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	
</head>
<body>

	<div class="container" style="min-height:500px;">
        <div class="container">     
        	<h2>Prueba técnica</h2>  
            <div class="row">                          
	            <div class="col-md-3">
	            	<button class="btn btn-info" data-toggle="modal" data-target="#insertEmpleado">Agregar empleado</button>
	            </div>
	            <div class="col-md-3">
	            	<button class="btn btn-success" data-toggle="modal" data-target="#insertDepartamento">Agregar departamento</button>
	            </div>
	        </div>

	        <div class="modal fade" id="insertEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			    		<form method="post" action="service.php">
					      	<div class="modal-header">
						        <h5 class="modal-title">Agregar empleado</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							        <span aria-hidden="true">&times;</span>
					        	</button>
					      	</div>
					      	<div class="modal-body formatos">
					        	<div class="row">
					        		<div class="col-md-6">
					        			<div class="form-group">
					        				<label>Nombre</label>
					        				<input type="text" name="nombre" class="form-control" required>
					        			</div>
					        		</div>
					        		<div class="col-md-6">
					        			<div class="form-group">
					        				<label>Apellido</label>
					        				<input type="text" name="apellido" class="form-control" required>
					        			</div>
					        		</div>
					        		<div class="col-md-6">
					        			<div class="form-group">
					        				<label>Email</label>
					        				<input type="email" name="email" class="form-control" required>
					        			</div>
					        		</div>
					        		<div class="col-md-6">
					        			<div class="form-group">
					        				<label>Teléfono</label>
					        				<input type="tel" name="telefono" class="form-control" required>
					        			</div>
					        		</div>
					        		<div class="col-md-6">
					        			<div class="form-group">
					        				<label>Fecha contratación</label>
					        				<input type="date" name="fecha_contratacion" class="form-control" required>
					        			</div>
					        		</div>
					        		<div class="col-md-6">
					        			<div class="form-group">
					        				<label>Departamento</label>
					        				<select name="departamento" class="form-control">
					        					<option value="">Seleccione</option>
					        					<?php
					        						foreach($departamentos as $dep){
					        					?>
					        						<option value="<?php echo $dep['ID_DEPARTAMENTO'] ?>"><?php echo $dep['NOMBRE_DEPARTAMENTO'] ?></option>
					        					<?php
					        						}
					        					?>
					        				</select>
					        			</div>
					        		</div>
					        		<div class="col-md-6">
					        			<div class="form-group">
					        				<label>Salario</label>
					        				<input type="text" name="salario" class="form-control" required>
					        			</div>
					        		</div>
					        		<div class="col-md-6">
					        			<div class="form-group">
					        				<label>Porcentaje comisión</label>
					        				<input type="text" name="porcentaje" class="form-control" required>
					        			</div>
					        		</div>
					        	</div>
					      	</div>
					      	<div class="modal-footer">
					      		<input type="hidden" name="task" value="insertEmpleado">
					        	<button type="submit" class="btn btn-info">Guardar</button>
					      	</div>
					      </form>
			    	</div>
			  	</div>
			</div>

			<div class="modal fade" id="insertDepartamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			    		<form method="post" action="service.php">
					      	<div class="modal-header">
						        <h5 class="modal-title">Agregar departamento</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							        <span aria-hidden="true">&times;</span>
					        	</button>
					      	</div>
					      	<div class="modal-body formatos">
					        	<div class="row">
					        		<div class="col-md-6">
					        			<div class="form-group">
					        				<label>Nombre departamento</label>
					        				<input type="text" name="nombre" class="form-control" required>
					        			</div>
					        		</div>
					        	</div>
					      	</div>
					      	<div class="modal-footer">
					      		<input type="hidden" name="task" value="insertDepartamento">
					        	<button type="submit" class="btn btn-success">Guardar</button>
					      	</div>
					      </form>
			    	</div>
			  	</div>
			</div>			

			<br><br>
	        <div class="row">
	        	<div class="col-md-6">
	        		<h4><b>1.</b> query: "SELECT count(e.ID_EMPLEADO) as total, d.NOMBRE_DEPARTAMENTO FROM empleados AS e INNER JOIN departamentos AS d ON d.ID_DEPARTAMENTO=e.ID_DEPARTAMENTO GROUP BY d.ID_DEPARTAMENTO"</h4>
	        		<div class="dataTable_wrapper">                                
                        <table id="dataTable1" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>                
                                    <th>Departamento</th>
                                    <th># Empleados</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
	        	</div>

	        	<div class="col-md-6">
	        		<h4><b>2.</b> query: "SELECT CONCAT(e.NOMBRE,' ',e.APELLIDO) AS NOMBRE_COMPLETO, e.SALARIO, d.NOMBRE_DEPARTAMENTO FROM empleados e, departamentos d WHERE e.SALARIO IN(SELECT MIN(SALARIO) FROM empleados GROUP BY ID_DEPARTAMENTO) GROUP BY e.ID_DEPARTAMENTO"</h4>
	        		<div class="dataTable_wrapper">                                
                        <table id="dataTable3" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>    
                                	<th>NOMBRE</th>            
                                    <th>SALARIO</th>
                                    <th>NOMBRE DEPARTAMENTO</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
	        	</div>
	        </div>

	        <div class="row">
	        	<div class="col-md-6">
	        		<h4><b>3.</b> query: "SELECT CONCAT(e.NOMBRE,' ',e.APELLIDO) AS nombre_completo, d.NOMBRE_DEPARTAMENTO, d.ID_DEPARTAMENTO FROM empleados AS e INNER JOIN departamentos AS d ON d.ID_DEPARTAMENTO=e.ID_DEPARTAMENTO"</h4>
	        		<div class="dataTable_wrapper">                                
                        <table id="dataTable2" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>    
                                	<th>ID departamento</th>            
                                    <th>Departamento</th>
                                    <th>Nombre completo</th>                                	
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
	        	</div>

	        	<div class="col-md-6">
	        		<h4><b>4.</b> 105</h4>
	        	</div>
	        </div>

	        <div class="row">
	        	<div class="col-md-6">
	        		<h4><b>5.</b> Par o Impar</h4>
	        		<div class="parImpar"></div>
	        	</div>

	        	<div class="col-md-6">
	        		<h4><b>6. </b> Método burbuja "$ar = array(50, 62, 55, 32, 87, 39, 98, 30, 25, 50, 66, 16, 51, 93, 19)"</h4>
	        		<?php
	        			$ar = array(50, 62, 55, 32, 87, 39, 98, 30, 25, 50, 66, 16, 51, 93, 19);
	        			$ar = $saviv->burbuja($ar, count($ar));

	        			print_r($ar);
	        		?>
	        	</div>
	        </div>

	        <div class="row">
	        	<div class="col-md-6">
	        		<h4><b>7. </b> Función de PHP</h4>
	        		&#60;?php <br>
	        			function nameFunction($parameters){<br>
	        				//instructions<br>
	        			}<br>
	        		?&#62;
	        	</div>

	        	<div class="col-md-6">
	        		<h4><b>8. </b> Array asociativo</h4>
	        		$sql = $conn->prepare("SELECT vendedor FROM dt_vendedores");<br>
					$sql->execute();<br>
					return $sql->fetchAll(PDO::FETCH_COLUMN);	
	        	</div>
	        </div>

	        <div class="row">
	        	<div class="col-md-6">
	        		<h4><b>9. </b>Lista no ordenada</h4>
	        		<ul>
		        		<?php
		        			$rt = $saviv->getVendedores();
		        			foreach($rt as $value){
		        		?>
		        				<li><?php echo $value; ?></li>
		        		<?php
		        			}
		        		?>
		        	</ul>
	        	</div>

	        	<div class="col-md-6">
	        		<h4><b>10. </b> Leer JSON</h4>
	        		<ul>
		        		<?php
							$data = file_get_contents("datos.php");
							$datos = json_decode($data, true);

			        		foreach($datos as $value){
			        	?>
			        			<li><?php echo $value['nombre']; ?></li>
			        	<?php
			        		}
						?>
					</ul>
	        	</div>
	        </div>

	        

	        

        </div>
    </div>

	<script src="http://paxzupruebas.com/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="http://paxzupruebas.com/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://paxzupruebas.com/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="http://paxzupruebas.com/bower_components/datatables/media/js/jquery.dataTables.js"></script>

    <script src="https://cdn.datatables.net/rowreorder/1.0.0/js/dataTables.rowReorder.js"></script>
    <link href="https://cdn.datatables.net/rowreorder/1.0.0/css/rowReorder.dataTables.css" type="text/css" rel="stylesheet">

    <script src="http://paxzupruebas.com/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="http://paxzupruebas.com/dist/js/sb-admin-2.js"></script>

	<script type="text/javascript">
		$.ajax({
    		url: 'service.php',
    		type: 'post',
    		data: {
    			task: 'getNumEmplDep'
    		}
    	}).done(function(data){
    		var data = JSON.parse(data);

    		for(var i in data){

    			data[i].NOMBRE_DEPARTAMENTO = '<center>'+data[i].NOMBRE_DEPARTAMENTO+'</center>';

	    		var rowIndex = $('#dataTable1').dataTable().fnAddData([
                    data[i].NOMBRE_DEPARTAMENTO,
                    data[i].total
                ]);
        	}
    	});

    	$.ajax({
    		url: 'service.php',
    		type: 'post',
    		data: {
    			task: 'getEmplDep'
    		}
    	}).done(function(data){
    		var data = JSON.parse(data);

    		for(var i in data){

    			data[i].ID_DEPARTAMENTO = '<center>'+data[i].ID_DEPARTAMENTO+'</center>';

	    		var rowIndex = $('#dataTable2').dataTable().fnAddData([
                    data[i].ID_DEPARTAMENTO,
                    data[i].NOMBRE_DEPARTAMENTO,
                    data[i].nombre_completo
                ]);
        	}
    	});

    	$.ajax({
    		url: 'service.php',
    		type: 'post',
    		data: {
    			task: 'getEmplDepSal'
    		}
    	}).done(function(data){
    		var data = JSON.parse(data);

    		for(var i in data){

    			data[i].ID_DEPARTAMENTO = '<center>'+data[i].ID_DEPARTAMENTO+'</center>';

	    		var rowIndex = $('#dataTable3').dataTable().fnAddData([
                    data[i].NOMBRE_COMPLETO,
                    data[i].SALARIO,
                    data[i].NOMBRE_DEPARTAMENTO
                ]);
        	}
    	});

    	//Punto 5
    	for(var i=0;i<=20;i++){

    		var texto = (i%2==0) ? i+' es par' : i+' es impar';

    		$(".parImpar").append(texto+'<br>');
    	}
    </script>
</body>
</html>