
        <div class="row">
            
            <div class="col-sm-1 col-md-1 col-lg-1">
                &nbsp;
            </div> 
            <div class="col-sm-10 col-md-10 col-lg-10">
                <img src="imagenes/logo.jpg">
                <h3>Sistema para el Control de Notas<br>CDA "Por Mi Barrio" Las Viñas</h3>
                
                    <div id="formulario" class="panel panel-info">
                    <div class="panel-heading">
                        Consulta Cursos
                    </div>
                    <div class="panel-body" style="text-align: justify;">
            
                    <form method="POST">
                    <fieldset>
                              <center>  <legend>Seleccione un Curso</legend> </center>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-7">

                               <select class="form-control" name="idCurso" required="">
                                    <option value>->Seleccionar Curso<-</option>
                                <?php
                                    $sql = "SELECT c.idCurso, c.nombreCurso, p.idProfesor
                                            FROM curso c 
                                            INNER JOIN profesor_curso pc ON c.idCurso = pc.idCurso
                                            INNER JOIN profesor p ON pc.idProfesor = p.idProfesor
                                            WHERE p.idProfesor = '".$_SESSION["carnet"]."';";
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
                                <input type="submit" id="aceptar" name="aceptar" class="btn btn-info btn-lg" value="aceptar">
                                
                                
                            </div>
                        </div>
                        </fieldset>
                    </form>

                    </div>
                    
                </div>

            </div>
            <div class="col-sm-1 col-md-1 col-lg-1">
                &nbsp;
            </div>
        </div>

       <?php 
        if (isset($_POST["aceptar"])) {
          $idCurso = $_POST["idCurso"];
          if ($idCurso=="") {
          	
          }else{
            ?>

<div class="row">
    <div class="col-sm-1 col-md-1 col-lg-1">
        &nbsp;
    </div> 
        <div class="col-sm-10 col-md-10 col-lg-10">
           
            <div id="formulario" class="panel panel-info">
                    <div class="panel-heading">
                        Consulta Cursos
                    </div>
                    <div class="panel-body" style="text-align: justify;">
                        <form method="POST">
                        <table class="table table-bordered">
                            <tr>
                                <th rowspan="2">
                                    Código
                                </th>
                                <th rowspan="2">
                                    Nombre
                                </th>
                                <th colspan="2">
                                    Nota1
                                </th>
                                <th colspan="2">
                                    Nota2
                                </th>
                                <th colspan="2">
                                    Nota3
                                </th>
                                <th rowspan="2">
                                    Nota Final
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Nota
                                </th>
                                <th>
                                    Promedio
                                </th>
                                <th>
                                    Nota
                                </th>
                                <th>
                                    Promedio
                                </th>
                                <th>
                                    Nota
                                </th>
                                <th>
                                    Promedio
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
                                
                           <?php
                            $sql = "SELECT a.idAlumno, a.nombreAlumno, a.apellidoAlumno, c.idCurso
                            FROM alumno a
                            INNER JOIN grupo g ON a.idGrupo = g.idGrupo
                            INNER JOIN grupo_curso gc ON g.idGrupo = gc.idGrupo
                            INNER JOIN curso c ON gc.idCurso = c.idCurso
                            WHERE c.idCurso = '$idCurso';";

                             $result=$conn->query($sql); 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                    <td> ".$row["idAlumno"]."</td>
                                    <td> ".$row["apellidoAlumno"].", ".$row["nombreAlumno"]."</td>";
                            ?>
                                    <td>                                    
                                    <input type="number" step="any" min="0" max="10" id="nota1" name="nota1" class="form-control" required="" style="width: 60px;">
                                </td>
                                <td>
                                    <input type="text" id="promNota1" name="promNota1" class="form-control" style="width: 75px;" disabled="true">
                                </td>
                                <td>
                                    <input type="number" step="any" min="0" max="10" id="nota2" name="nota2" class="form-control" required="" style="width: 60px;">
                                </td>
                                <td>
                                    <input type="text" id="promNota2" name="promNota2" class="form-control" style="width: 75px;" disabled="true">
                                </td>
                                <td>
                                    <input type="number" step="any" min="0" max="10" id="nota3" name="nota3" class="form-control" required="" style="width: 60px;">
                                </td>
                                <td>
                                    <input type="text" id="promNota3" name="promNota3" class="form-control" style="width: 75px;" disabled="true">
                                </td>
                                <td>
                                    <input type="text" id="notaFinal" name="notaFinal" class="form-control" style="width: 75px;" disabled="true">
                                </td>
                                <td>
                                    <input type="submit" id="ingresar" name="ingresar" class="btn btn-info btn-lg" value="Ingresar">
                                </td>
                            </tr>
                            <?php            
                                }
                            }
                           ?>
                                
                           
                           
                        </table>
                    </form>  

          

                    </div>  
            </div>

        </div>
</div>

        <?php
        }
        ?> 
 <?php
}
 ?>
    <div class="col-sm-1 col-md-1 col-lg-1">
       &nbsp;
    </div>
 </div>
