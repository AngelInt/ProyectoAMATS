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
                        Consulta Docentes
                    </div>
                    <div class="panel-body" style="text-align: justify;">
                      <form method="POST">
                        <table class="table">
                            <tr>
                                <th>
                                   Docente
                                </th>
                                <th>
                                Curso Asignado
                                </th>
                               
                                <th>
                                   Aula
                                </th>
                                
                            </tr>

                            <?php
                            $sql = "SELECT p.idProfesor as idProfesor, p.nombreProfesor AS nombreProfesor, p.apellidoProfesor AS apellidoProfesor, c.nombreCurso AS nombreCurso, g.idGrupo as idGrupo, g.nombreGrupo AS nombreGrupo, a.nombreAula AS nombreAula 
                                FROM profesor p 
                                INNER JOIN profesor_curso pc ON p.idProfesor = pc.idProfesor 
                                INNER JOIN curso c ON pc.idCurso = c.idCurso 
                                INNER JOIN grupo_curso gc ON c.idCurso = gc.idCurso 
                                INNER JOIN grupo g ON gc.idGrupo = g.idGrupo
                                INNER JOIN grupo_curso gc1 ON g.idGrupo = gc1.idGrupo
                                INNER JOIN curso c1 ON gc1.idCurso = c1.idCurso
                                INNER JOIN aula a ON c.idAula = a.idAula group by p.nombreProfesor;";

                             $result=$conn->query($sql); 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td> ".$row["nombreProfesor"]." ".$row["apellidoProfesor"]."</td>
                                        <td> ";
                                        $sqlCurso = "SELECT c.idCurso as idCurso, c.nombreCurso as curso FROM curso c INNER JOIN profesor_curso pc on c.idCurso = pc.idCurso WHERE pc.idProfesor = '".$row["idProfesor"]."';";

                                        $resCurso = $conn->query($sqlCurso);

                                        if($resCurso->num_rows > 0){
                                            while($rCurso = $resCurso->fetch_assoc()){
                                                echo $rCurso["curso"]."<br>";
                                            }
                                        }
                                    echo"</td>
                                        <td> ".$row["nombreAula"]."</td>

                                   
                                        </tr>
                                        ";
                                        
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
    
