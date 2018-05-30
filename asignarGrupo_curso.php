        <div class="row">
            
            <div class="col-sm-1 col-md-1 col-lg-1">
                &nbsp;
            </div> 
            <div class="col-sm-10 col-md-10 col-lg-10">
                <img src="imagenes/logo.jpg">
                <h3>Sistema para el Control de Notas<br>CDA "Por Mi Barrio" Las Viñas</h3>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Asignar Grupos a curso
                    </div>
                    <div class="panel-body" style="text-align: justify;">

                    <form method="POST">
                        
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-users bigicon"></i></span>
                            <div class="col-md-7">
                                <select class="form-control" name="idGrupo2" required="">
                                    <option value>->Elegir Grupo<-</option>
                                <?php
                                    $sql = "SELECT * from grupo;";
                                    $result=$conn->query($sql); 
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "
                                                <option value='".$row["idGrupo"]."'>".$row["nombreGrupo"]."</option>

                                            ";
                                        }
                                    }
                                ?>
                                </select>

                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-comments-o"></i></span>
                            <div class="col-md-7">
                                <select class="form-control" name="idCurso3" required="">
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
                        Grupos/Curso
                    </div>
                    <div class="panel-body" style="text-align: justify;">
                      <form method="POST">  
                        <table class="table">
                            <tr>
                                <th>
                                </th>
                                <th>
                                Código Grupo/Curso
                                </th>
                                <th>
                                Grupo
                                </th>
                                <th>
                                Curso
                                </th>
                                
                            </tr>

                            <?php
                            $sql = "SELECT gc.idGrupo_curso AS idGrupo_curso, g.nombreGrupo AS nombreGrupo, c.nombreCurso AS nombreCurso FROM grupo_curso gc INNER JOIN grupo g ON gc.idGrupo = g.idGrupo INNER JOIN curso c ON gc.idCurso = c.idCurso";
                             $result=$conn->query($sql); 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <th class='no'>
                                        
                                            <input type=checkbox name=eliminar[] value=".$row["idGrupo_curso"].">
                                        
                                        </th>
                                        <td> ".$row["idGrupo_curso"]."</td>
                                        <td> ".$row["nombreGrupo"]."</td>
                                        <td> ".$row["nombreCurso"]."</td>
                                   
                                        </tr>
                                        ";
                                        
                                }
                            }

                           ?>
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