
<script>
$(document).ready(function(evento){
	$('#cont').click(function(evento){
		flotante(2);
	});

	$('td').click(function(evento){
		var x = $(this).parent("tr");
		var id = document.getElementsByName('idAula')[x.index()].value;
		var aula = document.getElementsByName('nombreAula')[x.index()].value;

		document.getElementById("idAula").readOnly = true;
		document.getElementById("updAula").disabled = false;
		document.getElementById("addAula").disabled = true;
		

		$('#idAula').val(id);
		$('#nombreAula').val(aula);
	
	});

	

});
	

</script>

		<div class="row">
			
			<div class="col-sm-1 col-md-1 col-lg-1">
				&nbsp;
			</div> 
			<div class="col-sm-10 col-md-10 col-lg-10">
				<img src="imagenes/logo.jpg">
				<h3>Sistema para el Control de Notas<br>CDA "Por Mi Barrio" Las Viñas</h3>
				<div class="panel panel-info">
					<div class="panel-heading">
						Administrar Aulas
					</div>
					<div class="panel-body" style="text-align: justify;">

					<form method="POST">
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-key"></i></span>
                            <div class="col-md-7">
                                <input id="idAula" name="idAula" type="text" placeholder="Código Aula" class="form-control" maxlength="15" required="">
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-7">
                                <input id="nombreAula" name="nombreAula" type="text" placeholder="Nombre Aula" class="form-control" required="">
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            	<br>
                                <input type="submit" id="addAula" name="agregarAula" class="btn btn-info btn-lg" value="Agregar">
                                <input type="submit" id="updAula" name="actualizarAula" class="btn btn-info btn-lg" value="Actualizar" disabled=true>
                                <input type="reset" id="limpiar" name="reset" class="btn btn-info btn-lg" value="Cancelar" >
                            </div>
                        </div>
                    </form>
                       
					</div>
					
				</div>

					<div class="panel panel-info">
					<div class="panel-heading">
						Aulas
					</div>
					<div class="panel-body" style="text-align: justify;">
					<form method="POST">

						<table class="table">
                            <tr>
                            	<th>
                            	</th>
                                <th>
                                    Código Aula
                                </th>
                                <th>
                                   Nombre Aula
                                </th>
                            </tr>

                            <?php
                            $sql = "select * from aula";
                            $result=$conn->query($sql); 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                    	<th class='no'>
										    <input type=checkbox name=eliminar[] value=".$row["idAula"].">
										    <input type='hidden' name='idAula' value='".$row["idAula"]."'>
										    <input type='hidden' name='nombreAula' value='".$row["nombreAula"]."'>
										</th>
                                    	<td>".$row["idAula"]."</td>
                                        <td> ".$row["nombreAula"]."</td>
                                        </tr>";
                                }
                            }
                            ?>
	                        <tr class='no'>
	                        	<td colspan="3" align='center'>
	                        		<br>
							      <input type="submit" name="eliminarAula" id="eliminarAula" value='Eliminar Registro' class="btn btn-info btn-lg">                              
							    </td>                
							</tr> 
                        </table>
                       </form>	
					</div>		
				</div>
			</div>
			<div class="col-sm-1 col-md-1 col-lg-1">
				&nbsp;
			</div>
		</div>
<?php 
if (isset($_POST["agregarAula"])) {
    $idAula=$_POST["idAula"];
    $nombreAula=$_POST["nombreAula"];

        $tabla="aula";
        $campos="idAula,nombreAula";
        $values="'$idAula','$nombreAula'";

        $sql="INSERT INTO $tabla ($campos) VALUES ($values) ";

        if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro agregado satisfactoriamente.');
            document.location='?nh=administrarAulas.php';
            </script>";
        }else {
            echo "Error: $sql <br> $conn->error ";
        }
 }elseif (isset($_POST["eliminar"])) {
 	$aula = $_POST["eliminar"];
 	foreach($aula as $idAula){
        $sql="delete from aula where idAula='$idAula'";
        $conn->query($sql);    
    }
    if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro eliminado satisfactoriamente.');
            document.location='?nh=administrarAulas.php';
            </script>";
        }else {
            echo "<script>alert('Primero debe eliminar el curso en el que se ha asignado el aula que quiere eliminar.');
            document.location='?nh=administrarAulas.php';
            </script>";
        }
 }elseif (isset($_POST["actualizarAula"])) {
 	$idAula = $_POST["idAula"];
 	$nombreAula = $_POST["nombreAula"];
 	
    $sql="update aula set nombreAula='".$nombreAula."' where idAula='$idAula';";

   
    $res=$conn->query($sql);

    if ($res == TRUE) {
            echo "<script>alert('Registro Actualizado satisfactoriamente.');
            document.location='?nh=administrarAulas.php';
            </script>";
        }else {
            echo "<script>alert('Primero debe eliminar el curso en el que se ha asignado el aula que quiere eliminar.');
            document.location='?nh=administrarAulas.php';
            </script>";
        }
 }
?>