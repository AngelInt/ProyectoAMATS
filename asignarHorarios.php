        <div class="row">
            
            <div class="col-sm-1 col-md-1 col-lg-1">
                &nbsp;
            </div> 
            <div class="col-sm-10 col-md-10 col-lg-10">
                <img src="imagenes/logo.jpg">
                <h3>Sistema para el Control de Notas<br>CDA "Por Mi Barrio" Las Viñas</h3>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Asignar Horarios
                    </div>
                    <div class="panel-body" style="text-align: justify;">

                    <form method="POST">
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-7">
                                <select class="form-control" name="idGrupo" required="">
                                    <option value>->Seleccionar Grupo<-</option>
                                <?php
                                    $sql = "SELECT g.idGrupo, g.nombreGrupo, c.nombreCurso
                                            FROM grupo g
                                            INNER JOIN grupo_curso gc ON g.idGrupo = gc.idGrupo
                                            INNER JOIN curso c ON gc.idCurso = c.idCurso;";
                                    $result=$conn->query($sql); 
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "
                                                <option value='".$row["idGrupo"]."'>".$row["nombreGrupo"]."&nbsp;&nbsp;&nbsp;".$row["nombreCurso"]."</option>

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
                             <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-check-square-o bigicon"></i></span>
                                <div class="col-md-7">
                                      <select class="form-control" name="dia" required="">
                                      <option value>->Selecciona día<-</option>
                                      <option value="Lunes">Lunes</option>
                                      <option value="Martes">Martes</option>
                                      <option value="Miercoles">Miércoles</option>
                                      <option value="Jueves">Jueves</option>
                                      <option value="Viernes">Viernes</option>
                                      </select>
                                </div>
                        </div>
                        <br>
                        <br>
                     
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar"></i></span>
                            <div class="col-md-7">
                                <input id="anio" name="anio" type="number" placeholder="Año" class="form-control" maxlength="4" max=2100 min=2000 required="">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-clock-o"></i></span>
                            <div class="col-md-7">
                                Hora Inicio: <input id="horaInicio" name="horaInicio" type="time" class="form-control" required="">
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-clock-o"></i></span>
                            <div class="col-md-7">
                                Hora Fin: <input id="horaFin" name="horaFin" type="time" class="form-control" required="">
                            </div>
                        </div>
                                                    
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <br>
                               <input type="submit" id="addHorario" name="agregarHorario" class="btn btn-info btn-lg" value="Agregar">
                                
                                <input type="reset" id="limpiar" name="reset" class="btn btn-info btn-lg" value="Cancelar" >
                            </div>
                        </div>
                    </form>
                       
                    </div>
                    
                </div>

                    <div class="panel panel-info">
                    <div class="panel-heading">
                        Horarios
                    </div>
                    <div class="panel-body" style="text-align: justify;">
                      <form method="POST">  
                        <table class="table">
                            <tr>
                                <th>
                                </th>
                                <th>
                                    Grupo / Curso
                                </th>
                                <th>
                                   Año
                                </th>
                                 <th>
                                    Día
                                </th>
                                <th>
                                   Hora Inicio
                                </th>
                                <th>
                                   Hora Fin
                                </th>
                            </tr>

                            <?php
                            $sql = "SELECT c.nombreCurso AS nombreCurso, g.nombreGrupo AS nombreGrupo, h.idHorario as idHorario, h.anio AS anio, h.dia AS dia, h.horaInicio AS horaInicio, h.horaFin AS horaFin 
                                FROM curso c
                                INNER JOIN grupo_curso gc ON c.idCurso = gc.idCurso
                                INNER JOIN grupo g ON gc.idGrupo = g.idGrupo
                                INNER JOIN horario h ON g.idGrupo = h.idGrupo;";
                            
                             $result=$conn->query($sql); 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <th class='no'>
                                            <input type=checkbox name=eliminar[] value=".$row["idHorario"].">
                                            
                                        </th>
                                        </td>
                                        <td> ".$row["nombreGrupo"]."&nbsp;&nbsp;&nbsp;".$row["nombreCurso"]."</td>
                                        <td> ".$row["anio"]."</td>
                                        <td> ".$row["dia"]."</td>
                                        <td> ".$row["horaInicio"]."</td>
                                        <td> ".$row["horaFin"]."</td>
                                   
                                        </tr>
                                        ";
                                        
                                }
                            }

                           ?>
                           <tr class="no">
                                <td colspan="6" align='center'>
                                    <br>
                                  <input type="submit" name="eliminarHorario" value='Eliminar Registro' class="btn btn-info btn-lg">                              
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
if (isset($_POST["agregarHorario"])) {
    $idGrupo=$_POST["idGrupo"];
    $dia=$_POST["dia"];
    $anio=$_POST["anio"];
    $horaInicio=$_POST["horaInicio"];
    $horaFin=$_POST["horaFin"];
 

        $tabla="horario";
        $campos="idGrupo,dia,anio,horaInicio,horaFin";
        $values="'$idGrupo','$dia','$anio','$horaInicio','$horaFin'";

        $sql="INSERT INTO $tabla ($campos) VALUES ($values) ";

        if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro agregado satisfactoriamente.');
            document.location='?nh=asignarHorarios.php';
            </script>";
        }else {
            echo "Error: $sql <br> $conn->error ";
        }
    
}elseif (isset($_POST["eliminarHorario"])) {
    $horario = $_POST["eliminar"];
    foreach($horario as $idHorario){
        $sql="delete from horario where idHorario='$idHorario'";
        $conn->query($sql);    
    }
    if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro eliminado satisfactoriamente.');
            document.location='?nh=asignarHorarios.php';
            </script>";
        }else {
            echo "Error: $sql <br> $conn->error ";
        }
  }
 
?>