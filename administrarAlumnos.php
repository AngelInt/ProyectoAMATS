<script>
$(document).ready(function(evento){
       $('td').click(function(evento){
        var x = $(this).parent("tr");
        var id = document.getElementsByName('idAlumno')[x.index()].value;
        //var grupo_curso = document.getElementsByName('idGrupo_curso')[x.index()].value;
      
        var nombre = document.getElementsByName('nombre')[x.index()].value;
        var apellido = document.getElementsByName('apellido')[x.index()].value;
        var contrasena = document.getElementsByName('contrasena')[x.index()].value;
        var direccion = document.getElementsByName('direccion')[x.index()].value;
        var fechaNacimiento = document.getElementsByName('fechaNacimiento')[x.index()].value;
        //var fotografia = document.getElementsByName('fotografia')[x.index()].value;
        var correo = document.getElementsByName('correo')[x.index()].value;

        document.getElementById("idAlumno").readOnly = true;
        document.getElementById("updAlumnos").disabled = false;
        document.getElementById("addAlumno").disabled = true;
        $('#idAlumno').val(id);
        //$('#idGrupo_curso').val(grupo_curso);
        $('#nombre').val(nombre);
        $('#apellido').val(apellido);
        $('#contra1').val(contrasena);
        $('#direccion').val(direccion);
        $('#correo').val(correo);
        $('#fechaNacimiento').val(fechaNacimiento);
        //$('#fotografia').val(fotografia);


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
                        Administrar Alumnos
                    </div>
                    <div class="panel-body" style="text-align: justify;">
                     <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-id-card"></i></span>
                            <div class="col-md-7">
                                <input id="idAlumno" name="idAlumno" type="text" placeholder="Carnet" class="form-control" maxlength="15" required="">
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
                                <input id="contra1" name="contrasena" type="password" placeholder="Contraseña" class="form-control" required="">
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
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-camera bigicon"></i></span>
                            <div class="col-md-7">
                                 <input type="file" name="fotografia" id="fotografia" class="form-control" placeholder="fotografia">
                            </div>
                        </div>
                                             
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <br>
                                <input type="submit" id="addAlumno" name="agregarAlumnos" class="btn btn-info btn-lg" value="Agregar">
                                <input type="submit" id="updAlumnos" name="actualizarAlumnos" class="btn btn-info btn-lg" value="Actualizar" disabled=true>
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
        </div>

        <div class="row">
            
            
            <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-info">
                    <div class="panel-heading">
                        Alumnos
                    </div>
                    <div class="panel-body" style="text-align: justify;" >
                    
                      <form method="POST" style="text-align: center;">  
                        <div style="overflow-x: auto;">
                        <table class="table ">
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
                            $sql = "SELECT * FROM alumno;";
                             $result=$conn->query($sql); 
                            if ($result==true) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <th class='no'>
                                       
                                            <input type=checkbox name=eliminar[] value=".$row["idAlumno"].">
                                            <input type='hidden' name='idAlumno' value='".$row["idAlumno"]."'>
                                            
                                            <input type='hidden' name='nombre' value='".$row["nombreAlumno"]."'>
                                            <input type='hidden' name='apellido' value='".$row["apellidoAlumno"]."'>
                                            <input type='hidden' name='contrasena' value='".$row["contrasenaAlumno"]."'>
                                            <input type='hidden' name='direccion' value='".$row["direccionAlumno"]."'>
                                            <input type='hidden' name='correo' value='".$row["correoAlumno"]."'>
                                            <input type='hidden' name='fechaNacimiento' value='".$row["fechaNacimientoAlumno"]."'>
                                            <input type='hidden' name='fotografia' value='".$row["fotografia"]."'>
                                        
                                        </th>
                                        <td> ".$row["idAlumno"]."</td>
                                        <td> ".$row["nombreAlumno"]."</td>
                                        <td> ".$row["apellidoAlumno"]."</td>
                                        <td> ".$row["direccionAlumno"]."</td>
                                        <td> ".$row["correoAlumno"]."</td>
                                        <td> ".$row["fechaNacimientoAlumno"]."</td>
                                        <td> <img src='".$row["fotografia"]."' height='75px' width='75px'></td>
                                   
                                        </tr>
                                        ";
                                        
                                }
                            }
                           ?>
                           
                        </table>
                    </div>
                        <input type="submit" name="eliminarAlumno" value='Eliminar Registro' class="btn btn-info btn-lg">
                       </form>
                       
                    </div>
                </div>
        </div>
        
        </div>
<?php 
if (isset($_POST["agregarAlumnos"])) {

    
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

        $idAlumno=$_POST["idAlumno"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $contrasena=$_POST["contrasena"];
        $direccion=$_POST["direccion"];
        $correo=$_POST["correo"];
        $fechaNacimiento=$_POST["fechaNacimiento"];
        

        $sql="insert into alumno(idAlumno,nombreAlumno,apellidoAlumno,contrasenaAlumno,direccionAlumno,correoAlumno,fechaNacimientoAlumno,fotografia) values('$idAlumno','$nombre','$apellido','$contrasena','$direccion','$correo','$fechaNacimiento','$name')";

        if($conn->query($sql)==true){
            echo "<SCRIPT>alert('Registro Agregado Correctamente');
              document.location='?nh=administrarAlumnos.php';
              </SCRIPT>";
          }

    }else{ 
        $idAlumno=$_POST["idAlumno"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $contrasena=$_POST["contrasena"];
        $direccion=$_POST["direccion"];
        $correo=$_POST["correo"];
        $fechaNacimiento=$_POST["fechaNacimiento"];
        

        $sql="insert into alumno(idAlumno,nombreAlumno,apellidoAlumno,contrasenaAlumno,direccionAlumno,correoAlumno,fechaNacimientoAlumno,fotografia) values('$idAlumno','$nombre','$apellido','$contrasena','$direccion','$correo','$fechaNacimiento','imagenes/av.gif')";

        if($conn->query($sql)==true){
            echo "<SCRIPT>alert('Registro Agregado Correctamente');
              document.location='?nh=administrarAlumnos.php';
              </SCRIPT>";
    } 
    }
  
}

}elseif (isset($_POST["eliminar"])) {
    $alumno = $_POST["eliminar"];
    foreach($alumno as $idAlumno){
        $sql="delete from alumno where idAlumno='$idAlumno'";
        $conn->query($sql);    
    }
    if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro eliminado satisfactoriamente.');
            document.location='?nh=administrarAlumnos.php';
            </script>";
        }else {
            echo "Error: $sql <br> $conn->error ";
        }

 }elseif (isset($_POST["actualizarAlumnos"])) {

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

        $idAlumno=$_POST["idAlumno"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $contrasena=$_POST["contrasena"];
        $direccion=$_POST["direccion"];
        $correo=$_POST["correo"];
        $fechaNacimiento=$_POST["fechaNacimiento"];

        $sql="update alumno set nombreAlumno='".$nombre."',  apellidoAlumno='".$apellido."', contrasenaAlumno='".$contrasena."', direccionAlumno='".$direccion."', correoAlumno='".$correo."', fechaNacimientoAlumno='".$fechaNacimiento."', fotografia='".$name."' where idAlumno='".$idAlumno."';";
       
        if($conn->query($sql)==true){
            echo "<SCRIPT>alert('Registro Actualizado Correctamente');
              document.location='?nh=administrarAlumnos.php';
              </SCRIPT>";
        }

    }else{ 
        $idAlumno=$_POST["idAlumno"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $contrasena=$_POST["contrasena"];
        $direccion=$_POST["direccion"];
        $correo=$_POST["correo"];
        $fechaNacimiento=$_POST["fechaNacimiento"];

        $sql="update alumno set nombreAlumno='".$nombre."',  apellidoAlumno='".$apellido."', contrasenaAlumno='".$contrasena."', direccionAlumno='".$direccion."', correoAlumno='".$correo."', fechaNacimientoAlumno='".$fechaNacimiento."' where idAlumno='".$idAlumno."';";
        
        if($conn->query($sql)==true){
            echo "<SCRIPT>alert('Registro Actualizado Correctamente');
              document.location='?nh=administrarAlumnos.php';
              </SCRIPT>";
        }
    } 
    
    
  }

 }    
?>