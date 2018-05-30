<script>
$(document).ready(function(evento){
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
        document.getElementById("addDocente").disabled = true;
        $('#idDocente').val(id);
        $('#nombre').val(nombre);
        $('#apellido').val(apellido);
        $('#contra').val(contrasena);
        $('#direccion').val(direccion);
        $('#correo').val(correo);
        $('#fechaNacimiento').val(fechaNacimiento);
        $('#permiso').val(permiso);

        
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
						Administrar Docentes
					</div>
					<div class="panel-body" style="text-align: justify;">
					 <form method="POST" enctype="multipart/form-data">
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-id-card"></i></span>
                            <div class="col-md-7">
                                <input id="idDocente" name="idDocente" type="text" placeholder="Carnet" class="form-control" maxlength="15" required="">
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>	
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-7">
                                <input id="nombre" name="nombre" type="text" placeholder="Nombres" class="form-control" required="">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user-o bigicon"></i></span>
                            <div class="col-md-7">
                                <input id="apellido" name="apellido" type="text" placeholder="Apellidos" class="form-control" required="">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-bookmark-o bigicon"></i></span>
                            <div class="col-md-7">
                                <input id="contra" name="contrasena" type="password" placeholder="Contraseña" class="form-control" required="">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-7">
                                <textarea class="form-control" id="direccion" name="direccion" placeholder="Dirección" rows="1" maxlength="250"></textarea>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-7">
                                <input id="correo" name="correo" type="email" placeholder="Correo electrónico" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-birthday-cake bigicon"></i></span>
                            <div class="col-md-7">
                                <input id="fechaNacimiento" name="fechaNacimiento" type="date" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-check-square-o bigicon"></i></span>
                            <div class="col-md-7">
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
                                <input type="submit" id="addDocente" name="agregarDocente" class="btn btn-info btn-lg" value="Agregar">
                                <input type="submit" id="updDocente" name="actualizarDocente" class="btn btn-info btn-lg" value="Actualizar" disabled=true>
                                <input type="reset" id="limpiar" name="reset" class="btn btn-info btn-lg" value="Cancelar" >
                            </div>
                            </div>
                             </form>
                        </div>

                     
                    </div>
                </div>
            
            <div class="col-sm-1 col-md-1 col-lg-1">
                &nbsp;
            </div> 
        </div class="col-sm-10 col-md-10 col-lg-10">


		 <div class="row">
                      
            <div class="col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-info">
					<div class="panel-heading">
						Docentes
					</div>
					<div class="panel-body" style="text-align: justify;">
					  <form method="POST" style="text-align: center;">
                        <div style="overflow-x: auto;">
						<table class="table">
                            <tr>
                                <th>
                                </th>
                                <th>
                                Carnet
                                </th>
                                <th>
                                Nombre
                                </th>
                                <th>
                                Apellido
                                </th>
                                <th>
                                Direccion
                                </th>
                                <th>
                                Correo
                                </th>
                                <th>
                                Fecha Nacimiento
                                </th>
                                <th>
                                Fotografia
                                </th>
                                
                            </tr>

                            <?php
                            $sql = "select * from profesor";
                             $result=$conn->query($sql); 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <th class='no'>
                                       
                                            <input type=checkbox name=eliminar[] value=".$row["idProfesor"].">
                                            <input type='hidden' name='idDocente' value='".$row["idProfesor"]."'>
                                            <input type='hidden' name='nombre' value='".$row["nombreProfesor"]."'>
                                            <input type='hidden' name='apellido' value='".$row["apellidoProfesor"]."'>
                                            <input type='hidden' name='contrasena' value='".$row["contrasenaProfesor"]."'>
                                            <input type='hidden' name='direccion' value='".$row["direccionProfesor"]."'>
                                            <input type='hidden' name='correo' value='".$row["correoProfesor"]."'>
                                            <input type='hidden' name='fechaNacimiento' value='".$row["fechaNacimientoProfesor"]."'>
                                            <input type='hidden' name='permiso' value='".$row["permiso"]."'>
                                            <input type='hidden' name='fotografia' value='".$row["fotografia"]."'>
                                        
                                        </th>
                                        <td> ".$row["idProfesor"]."</td>
                                        <td> ".$row["nombreProfesor"]."</td>
                                        <td> ".$row["apellidoProfesor"]."</td>
                                        <td> ".$row["direccionProfesor"]."</td>
                                        <td> ".$row["correoProfesor"]."</td>
                                        <td> ".$row["fechaNacimientoProfesor"]."</td>
                                        <td> <img src='".$row["fotografia"]."' height='75px' width='75px'></td>
                                   
                                        </tr>
                                        ";
                                        
                                }
                            }

                           ?>
                            
                        </table>
                        </div>
                        <input type="submit" name="eliminarDocente" value='Eliminar Registro' class="btn btn-info btn-lg"> 
                       </form> 
					</div>
					
				</div>


			</div>
			
		</div>
		
<?php 
if (isset($_POST["agregarDocente"])) {

    
    //agregar docentes con foto de perfil
   if (isset($_FILES["fotografia"])){ 
    if (is_uploaded_file ($_FILES['fotografia']['tmp_name'])){  
      $tmp_name = $_FILES["fotografia"]["tmp_name"]; 
      $name = "imagenes/".$_FILES["fotografia"]["name"]; 
      $nombrearchivoSinExtension=substr($name,0,strpos($name, '.')); 
      $extensionArchivo=substr(strrchr($name, '.'), 1); 
      if (is_file($name)) { 
        $idUnico=time();
        $name = "imagenes/".$idUnico."-".$_FILES["fotografia"]["name"];         
      } 
      move_uploaded_file($tmp_name,$name);

        $idProfesor=$_POST["idDocente"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $contrasena=$_POST["contrasena"];
        $direccion=$_POST["direccion"];
        $correo=$_POST["correo"];
        $fechaNacimiento=$_POST["fechaNacimiento"];
        $permiso=$_POST["permiso"];

        $sql="insert into profesor(idProfesor,nombreProfesor,apellidoProfesor,contrasenaProfesor,direccionProfesor,correoProfesor,fechaNacimientoProfesor,permiso,fotografia) values('$idProfesor','$nombre','$apellido','$contrasena','$direccion','$correo','$fechaNacimiento','$permiso','$name')";

        if($conn->query($sql)==true){
            echo "<SCRIPT>alert('Registro Agregado Correctamente');
              document.location='?nh=administrarDocentes.php';
              </SCRIPT>";
          }

    }else{ 
        $idProfesor=$_POST["idDocente"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $contrasena=$_POST["contrasena"];
        $direccion=$_POST["direccion"];
        $correo=$_POST["correo"];
        $fechaNacimiento=$_POST["fechaNacimiento"];
        $permiso=$_POST["permiso"];

        $sql="insert into profesor(idProfesor,nombreProfesor,apellidoProfesor,contrasenaProfesor,direccionProfesor,correoProfesor,fechaNacimientoProfesor,permiso, fotografia) values('$idProfesor','$nombre','$apellido','$contrasena','$direccion','$correo','$fechaNacimiento','$permiso','imagenes/av.gif')";

        if($conn->query($sql)==true){
            echo "<SCRIPT>alert('Registro Agregado Correctamente');
              document.location='?nh=administrarDocentes.php';
              </SCRIPT>";
    } 
    }
  
}

}elseif (isset($_POST["eliminar"])) {
    $profesor = $_POST["eliminar"];
    foreach($profesor as $idProfesor){
        $sql="delete from profesor where idProfesor='$idProfesor'";
        $conn->query($sql);    
    }
    if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro eliminado satisfactoriamente.');
            document.location='?nh=administrarDocentes.php';
            </script>";
        }else {
            echo "Error: $sql <br> $conn->error ";
        }

 }elseif (isset($_POST["actualizarDocente"])) {

    if (isset($_FILES["fotografia"])){ 
    if (is_uploaded_file ($_FILES['fotografia']['tmp_name'])){  
      $tmp_name = $_FILES["fotografia"]["tmp_name"]; 
      $name = "imagenes/".$_FILES["fotografia"]["name"]; 
      $nombrearchivoSinExtension=substr($name,0,strpos($name, '.')); 
      $extensionArchivo=substr(strrchr($name, '.'), 1); 
      if (is_file($name)) { 
        $idUnico=time();
        $name = "imagenes/".$idUnico."-".$_FILES["fotografia"]["name"];         
      } 
      move_uploaded_file($tmp_name,$name);
        $idProfesor=$_POST["idDocente"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $contrasena=$_POST["contrasena"];
        $direccion=$_POST["direccion"];
        $correo=$_POST["correo"];
        $fechaNacimiento=$_POST["fechaNacimiento"];
        $permiso=$_POST["permiso"];

        $sql="update profesor set nombreProfesor='".$nombre."',  apellidoProfesor='".$apellido."', contrasenaProfesor='".$contrasena."', direccionProfesor='".$direccion."', correoProfesor='".$correo."', fechaNacimientoProfesor='".$fechaNacimiento."', permiso='".$permiso."', fotografia='".$name."' where idProfesor='".$idProfesor."';";
       
        if($conn->query($sql)==true){
            echo "<SCRIPT>alert('Registro Actualizado Correctamente');
              document.location='?nh=administrarDocentes.php';
              </SCRIPT>";
        }

    }else{ 
        $idProfesor=$_POST["idDocente"];
       $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $contrasena=$_POST["contrasena"];
        $direccion=$_POST["direccion"];
        $correo=$_POST["correo"];
        $fechaNacimiento=$_POST["fechaNacimiento"];
        $permiso=$_POST["permiso"];

        $sql="update profesor set nombreProfesor='".$nombre."',  apellidoProfesor='".$apellido."', contrasenaProfesor='".$contrasena."', direccionProfesor='".$direccion."', correoProfesor='".$correo."', fechaNacimientoProfesor='".$fechaNacimiento."', permiso='".$permiso."' where idProfesor='".$idProfesor."';";
        
        if($conn->query($sql)==true){
            echo "<SCRIPT>alert('Registro Actualizado Correctamente');
              document.location='?nh=administrarDocentes.php';
              </SCRIPT>";
        }
    } 
    
    
  }

 }    
?>