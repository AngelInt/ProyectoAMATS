
        <div class="row">
            
            <div class="col-sm-1 col-md-1 col-lg-1">
                &nbsp;
            </div> 
            <div class="col-sm-10 col-md-10 col-lg-10">
                <img src="imagenes/logo.jpg">
                <h3>Sistema para el Control de Notas<br>CDA "Por Mi Barrio" Las Viñas</h3>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Asignar Profesores a Curso
                    </div>
                    <div class="panel-body" style="text-align: justify;">

                    <form method="POST">
                        
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-7">
                                <select class="form-control" name="idProfesor2" id="idProfesor2" required="">
                                    <option value>->Elegir Profesor<-</option>
                                <?php
                                    $sql = "select * from profesor";
                                    $result=$conn->query($sql); 
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "
                                                <option value='".$row["idProfesor"]."'>".$row["nombreProfesor"]." ".$row["apellidoProfesor"]."</option>

                                            ";
                                        }
                                    }
                                ?>
                                </select>

                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-comments-o"></i></span>
                            <div class="col-md-7">
                                <select class="form-control" name="idCurso4" id="idCurso4" required="">
                                    <option value>->Elegir Curso<-</option>
                                <?php
                                    $sql = "select * from curso";
                                    $result=$conn->query($sql); 
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "
                                                <option value='".$row["idCurso"]."'>".$row["nombreCurso"]."</option>

                                            ";
                                        }
                                    }
                                ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <br>
                                <input type="submit" name="agregarGrupo_curso" class="btn btn-info btn-lg" value="Agregar">
                                <input type="reset" id="limpiar" name="reset" class="btn btn-info btn-lg" value="Cancelar" >
                            </div>
                        </div>

                    </form>
                       
                    </div>
                    
                </div>

                    <div class="panel panel-info">
                    <div class="panel-heading">
                        Profesores/Curso
                    </div>
                    <div class="panel-body" style="text-align: justify;">
                       <form method="POST">
                        <table class="table">
                            <tr>
                                <th>
                                </th>
                                <th>
                                Código Profesor/Curso
                                </th>
                                <th>
                                Profesor
                                </th>
                                <th>
                                Curso
                                </th>
                                
                            </tr>

                            <?php
                            $sql = "SELECT pc.idProfesor_curso AS idProfesor_curso, p.nombreProfesor AS nombreProfesor, p.apellidoProfesor AS apellidoProfesor, c.nombreCurso AS nombreCurso FROM profesor_curso pc INNER JOIN profesor p ON pc.idProfesor = p.idProfesor INNER JOIN curso c ON pc.idCurso = c.idCurso";
                             $result=$conn->query($sql); 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <th class='no'>
                                        
                                            <input type=checkbox name=eliminar[] value=".$row["idProfesor_curso"].">
                                        
                                        </th>
                                        <td> ".$row["idProfesor_curso"]."</td>
                                        <td> ".$row["nombreProfesor"]." ".$row["apellidoProfesor"]."</td>
                                        <td> ".$row["nombreCurso"]."</td>
                                   
                                        </tr>
                                        ";
                                        
                                }
                            }

                           ?>
                           <tr class="no">
                                <td colspan="4" align='center'>
                                    <br>
                                  <input type="submit" name="eliminarProfesor_curso" value='Eliminar Registro' class="btn btn-info btn-lg">                              
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
if (isset($_POST["agregarGrupo_curso"])) {
    $idProfesor=$_POST["idProfesor2"];
    $idCurso=$_POST["idCurso4"];



        $tabla="profesor_curso";
        $campos="idProfesor_curso,idProfesor,idCurso";
        $values="'','$idProfesor','$idCurso'";

        $sql="INSERT INTO $tabla ($campos) VALUES ($values) ";

        if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro agregado satisfactoriamente.');
            document.location='?nh=asignarProfesor_curso.php';
            </script>";
        }else {
            echo "Error: $sql <br> $conn->error ";
        }
    
}elseif (isset($_POST["eliminar"])) {
    $profesor_curso = $_POST["eliminar"];
    foreach($profesor_curso as $idProfesor_curso){
        $sql="delete from profesor_curso where idProfesor_curso='$idProfesor_curso'";
        $conn->query($sql);    
    }
    if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro eliminado satisfactoriamente.');
            document.location='?nh=asignarProfesor_curso.php';
            </script>";
        }else {
            echo "Error: $sql <br> $conn->error ";
        }
 }     
?>