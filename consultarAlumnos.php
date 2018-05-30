<script>
$(document).ready(function(evento){
      
    $("#btnPrint").click(function(){
        $("#formulario").hide();
        $("#btnPrint").hide();
        window.print();
        window.location="?nh=consultarDocentes.php";
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
                        Consulta Alumnos
                    </div>
                    <div class="panel-body" style="text-align: justify;">
                      <form method="POST">
                        <table class="table">
                            <tr>
                                <th>
                                   Alumno
                                </th>
                                <th>
                                   Curso
                                </th>
                                <th>
                                   Grupo
                                </th>
                                <th>
                                   Aula
                                </th>
                            </tr>
                            <?php
                            $sql="SELECT nombreAlumno, apellidoAlumno, nombreGrupo, nombreCurso, nombreAula
                                    FROM alumno a
                                    INNER JOIN grupo g ON a.idGrupo = g.idGrupo
                                    INNER JOIN grupo_curso gc ON g.idGrupo = gc.idGrupo
                                    INNER JOIN curso c ON gc.idCurso = c.idCurso
                                    INNER JOIN aula au ON c.idAula = au.idAula
                                    ORDER BY nombreCurso, nombreAlumno;";
                            $result=$conn->query($sql); 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td> ".$row["nombreAlumno"]." ".$row["apellidoAlumno"]."</td>
                                        <td> ".$row["nombreCurso"]."</td>
                                        <td> ".$row["nombreGrupo"]."</td>
                                        <td> ".$row["nombreAula"]."</td>";
                                        
                                        
                                }
                            }

                           ?>           
                            <tr class="no">
                                <td colspan="4" align='center'>
                                    <button id="btnPrint" class="btn btn-success" id="imprimir"><span class="fa fa-print"></span> &nbsp;Imprimir</button>                      
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

    </div>