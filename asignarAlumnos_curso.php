        <div class="row">
            
            <div class="col-sm-1 col-md-1 col-lg-1">
                &nbsp;
            </div> 
            <div class="col-sm-10 col-md-10 col-lg-10">
                <img src="imagenes/logo.jpg">
                <h3>Sistema para el Control de Notas<br>CDA "Por Mi Barrio" Las Viñas</h3>
     

                    <div class="panel panel-info">
                    <div class="panel-heading">
                        Asignar Alumnos
                    </div>
                    <div class="panel-body" style="text-align: justify;">
                      <form method="POST">  
                        <table class="table ">
                            <tr>
                                <th>
                                    &nbsp;
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
                                Curso
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            
                           <tr class="no">
                                <td colspan="4" align='center'>
                                    <br>
                                  <input type="submit" name="eliminarGrupo_curso" value='Eliminar Registro' class="btn btn-info btn-lg">                              
                                </td>                
                            </tr> 
                        </table>
                       </form>
                    </div>
                    
                </div>
                                                       
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
if (isset($_POST["agregarGrupo_curso"])) {
    $idGrupo=$_POST["idGrupo2"];
    $idCurso=$_POST["idCurso3"];



        $tabla="grupo_curso";
        $campos="idGrupo_curso,idGrupo,idCurso";
        $values="'','$idGrupo','$idCurso'";

        $sql="INSERT INTO $tabla ($campos) VALUES ($values) ";

        if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro agregado satisfactoriamente.');
            document.location='?nh=asignarGrupo_curso.php';
            </script>";
        }else {
            echo "<script>alert('Intento fallido al agregar registro.');
            document.location='?nh=asignarGrupo_curso.php';
            </script>";
        }
    
}elseif (isset($_POST["eliminarGrupo_curso"])) {
    $grupo_curso = $_POST["eliminar"];
    foreach($grupo_curso as $idGrupo_curso){
        $sql="delete from grupo_curso where idGrupo_curso='$idGrupo_curso'";
        $conn->query($sql);    
    }
    if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro eliminado satisfactoriamente.');
            document.location='?nh=asignarGrupo_curso.php';
            </script>";
        }else {
             echo "<script>alert('Debe asegurarse que no haya ningún alumno inscrito en el Grupo y Curso.');
            document.location='?nh=asignarGrupo_curso.php';
            </script>";
        }
 }   
?>