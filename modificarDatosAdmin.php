
<script>
$(document).ready(function(evento){
   
    $('#mostrarPass').click(function (evento) {
    	if ($("#mostrarPass").prop("checked") == true) {
    		$('#contrasena').attr("type","text");
    	}else{
    		$('#contrasena').attr("type","password");
    	}
    });
    
    $('td').click(function(evento){
        var x = $(this).parent("tr");
        var id = document.getElementsByName('idDocente')[x.index()].value;
        var nombre = document.getElementsByName('nombre')[x.index()].value;
        var apellido = document.getElementsByName('apellido')[x.index()].value;
        var contrasena = document.getElementsByName('contrasena')[x.index()].value;
        var direccion = document.getElementsByName('direccion')[x.index()].value;
        var correo = document.getElementsByName('correo')[x.index()].value;
        var fechaNacimiento = document.getElementsByName('fechaNacimiento')[x.index()].value;
        var permiso = document.getElementsByName('permiso')[x.index()].value;
        var fotografia = document.getElementsByName('fotografia')[x.index()].value;

        document.getElementById("idDocente").readOnly = true;
        document.getElementById("updDocente").disabled = false;
       
        $('#idDocente').val(id);
        $('#nombre').val(nombre);
        $('#apellido').val(apellido);
        $('#contrasena').val(contrasena);
        $('#direccion').val(direccion);
        $('#correo').val(correo);
        $('#fechaNacimiento').val(fechaNacimiento);
        $('#permiso').val(permiso);
        $('#fotografia').val(fotografia);

        
    });

    

});
    

</script>

		<?php
		
					$sql = "select * from profesor where idProfesor='".$_SESSION["carnet"]."'";
					$res = $conn->query($sql);
					if($res->num_rows > 0){
						while($row = $res->fetch_assoc()){



			?>
		<div class="row">
			
			<div class="col-sm-1 col-md-1 col-lg-1">
				&nbsp;
			</div> 
			<div class="col-sm-10 col-md-10 col-lg-10">
				<img src="imagenes/logo.jpg">
				<h3>Sistema para el Control de Notas<br>CDA "Por Mi Barrio" Las Viñas</h3>
				<div class="panel panel-info">
					<div class="panel-heading">
						Administrar Docentes
					</div>
					<div class="panel-body" style="text-align: justify;">
					 <form method="POST">
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-id-card"></i></span>
                            <div class="col-md-7">
                                <input id="idDocente" name="idDocente" type="text" placeholder="Carnet" class="form-control" maxlength="15" readonly="true" value="<?php echo $row['idProfesor']; ?>">
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>	
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-7">
                                <input id="nombre" name="nombre" type="text" placeholder="Nombres" class="form-control" required="" value="<?php echo $row['nombreProfesor']; ?>">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user-o bigicon"></i></span>
                            <div class="col-md-7">
                                <input id="apellido" name="apellido" type="text" placeholder="Apellidos" class="form-control" required="" value="<?php echo $row['apellidoProfesor']; ?>">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-bookmark-o bigicon"></i></span>
                            <div class="col-md-7">
                                <input id="contrasena" name="contrasena" type="password" placeholder="Contraseña" class="form-control" required="" value="<?php echo $row['contrasenaProfesor']; ?>">
                                
                                <label style="font-weight: normal;"> <input type="checkbox" id="mostrarPass">Mostrar Contraseña</label>
                                
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-7">
                                <textarea class="form-control" id="direccion" name="direccion" placeholder="Dirección" rows="1" maxlength="250"><?php echo $row['direccionProfesor']; ?></textarea>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-7">
                                <input id="correo" name="correo" type="email" placeholder="Correo electrónico" class="form-control" value="<?php echo $row['correoProfesor']; ?>">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-birthday-cake bigicon"></i></span>
                            <div class="col-md-7">
                                <input id="fechaNacimiento" name="fechaNacimiento" type="date" class="form-control" value="<?php echo $row['fechaNacimientoProfesor']; ?>">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-check-square-o bigicon"></i></span>
                            <div class="col-md-7">                            	
                    			<script>
                    				$(document).ready(function(){
									  $("#permiso").val('<?php echo $row["permiso"]; ?>');
									});
                    			</script>
                                <select class="form-control" name="permiso" id="permiso" required="">
                                  <option value>->Seleccione Permiso<-</option>
								  <option value="admin">Administrador</option>
								  <option value="docente">Docente</option>
								</select>

                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-camera bigicon"></i></span>
                            <div class="col-md-7">
                                 <input type="file" name="fotografia" id="fotografia" class="form-control" placeholder="fotografia">
                            </div>
                        </div>
                                             
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            	<br>
                                
                                <input type="submit" id="updDocente" name="modificarDatosAdmin" class="btn btn-info btn-lg" value="Actualizar">
                                <input type="reset" id="limpiar" name="reset" class="btn btn-info btn-lg" value="Cancelar" >
                            </div>
                            </div>
                        </div>

                     </form>
					</div>
					</div>
				</div>
				<?php
				}}
					
					?>
			</div>
			<div class="col-sm-1 col-md-1 col-lg-1">
				&nbsp;
			</div>
		</div>
<?php 
if (isset($_POST["modificarDatosAdmin"])) {
    $idProfesor=$_POST["idDocente"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $contrasena=$_POST["contrasena"];
    $direccion=$_POST["direccion"];
    $correo=$_POST["correo"];
    $fechaNacimiento=$_POST["fechaNacimiento"];
    $permiso=$_POST["permiso"];
    $fotografia=$_POST["fotografia"];
    
    $sql="update profesor set nombreProfesor='".$nombre."', apellidoProfesor='".$apellido."', contrasenaProfesor='".$contrasena."', direccionProfesor='".$direccion."', correoProfesor='".$correo."', fechaNacimientoProfesor='".$fechaNacimiento."', permiso='".$permiso."', fotografia='".$fotografia."' where idProfesor='$idProfesor';";

   
    $res=$conn->query($sql);

    if ($res == TRUE) {
            echo "<script>alert('Registro Actualizado satisfactoriamente.');
            document.location='?nh=modificarDatosAdmin.php';
            </script>";
        }else {
            echo "Error: $sql <br> $conn->error ";
        }
 }    
?>