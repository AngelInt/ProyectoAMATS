
<script>
$(document).ready(function(evento){
      
    $("#btnPrint").click(function(){
    	$("#formulario").hide();
    	$("#btnPrint").hide();
    	window.print();
    	window.location="?nh=consultarCursos.php";
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

<div class="panel panel-info">
	<div class="panel-heading">
        Consulta Cursos
    </div>
<div class="panel-body" style="text-align: justify;">
        <table class="table">
            <tr>
                <th>
                    Curso:
                </th>
                <td>
                    <?php  
                  $sql="select nombreCurso from curso where idCurso='$idCurso';"; 
                   $result=$conn->query($sql); 
                       if ($result->num_rows > 0) {
                       while ($row = $result->fetch_assoc()) {
                           echo $row['nombreCurso'];
                    }
                    }
                    ?>
                </td>  
            </tr>
            <tr>
                              
                <th>
                    Profesor Asignado:
                </th>
                <td>
                    <?php  
                   $sql="SELECT p.nombreProfesor, p.apellidoProfesor, c.idCurso 
                          FROM profesor p
                           INNER JOIN profesor_curso pc ON p.idProfesor = pc.idProfesor
                           INNER JOIN curso c ON pc.idCurso = c.idCurso
                           WHERE c.idCurso='$idCurso';"; 
                    $result=$conn->query($sql); 
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['nombreProfesor']." ".$row['apellidoProfesor'];
                    }
                    }
                    ?>
                </td>    
            </tr>
            <tr>
                            
                <th>
                    Aula Asignada:
                </th>
                <td>
                    <?php  
                    $sql="SELECT a.nombreAula, c.idCurso
                            FROM aula a
                            INNER JOIN curso c ON a.idAula = c.idAula
                            WHERE c.idCurso='$idCurso';"; 
                    $result=$conn->query($sql); 
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['nombreAula'];
                    }
                    }
                    ?>
                </td>                
            </tr>

            <?php
        }
        ?>
        
        </table>
        <table class="table">
        	<tr>
        		<th>
        			Alumno Inscrito:
        		</th>
        		<th>
        			Grupo:
        		</th>
        	</tr>
        	<tr>
        		<td>
        			 <?php  

                    $sql="SELECT a.nombreAlumno, a.apellidoAlumno,c.idCurso
					FROM alumno a 
					INNER JOIN grupo g ON a.idGrupo = g.idGrupo
					INNER JOIN grupo_curso gc ON g.idGrupo = gc.idGrupo
					INNER JOIN curso c ON gc.idCurso = c.idCurso
					WHERE c.idCurso = '$idCurso';"; 
                    $result=$conn->query($sql); 
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['nombreAlumno']." ".$row['apellidoAlumno']."<br>";
                    }
                    }
                    ?>
        		</td>
        		<td>
        			<?php  

                    $sql="SELECT a.nombreAlumno, a.apellidoAlumno, g.nombreGrupo, c.idCurso
					FROM alumno a 
					INNER JOIN grupo g ON a.idGrupo = g.idGrupo
					INNER JOIN grupo_curso gc ON g.idGrupo = gc.idGrupo
					INNER JOIN curso c ON gc.idCurso = c.idCurso
					WHERE c.idCurso = '$idCurso'
					ORDER BY nombreGrupo;"; 
                    $result=$conn->query($sql); 
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['nombreGrupo']."<br>";
                    }
                    }
                    ?>
        		</td>
        	</tr>

        </table>
         <table class="table">
         	<tr>
         		<th colspan="4">
         			Horario:
         		</th>
         	</tr>
        	<tr>
        		<th>
        			Grupo
        		</th>
        		<th>
        			Dia
        		</th> 
        		<th>
        			Hora Inicio
        		</th>
        		<th>
        			Hora Fin
        		</th>       		
        	</tr>
        	<tr>
        		<td>
        			<?php  
                    $sql="SELECT g.nombreGrupo, c.idCurso
					FROM grupo g 
					INNER JOIN grupo_curso gc ON g.idGrupo = gc.idGrupo
					INNER JOIN curso c ON gc.idCurso = c.idCurso
					WHERE c.idCurso = 'Art212';  "; 
                    $result=$conn->query($sql); 
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['nombreGrupo']."<br>";
                    }
                    }
                    ?>
        		</td>
        		<td>
        			<?php  
                    $sql="SELECT h.dia, c.idCurso
					FROM horario h
					INNER JOIN grupo g ON h.idGrupo = g.idGrupo
					INNER JOIN grupo_curso gc ON g.idGrupo = gc.idGrupo
					INNER JOIN curso c ON gc.idCurso = c.idCurso
					WHERE c.idCurso = '$idCurso';"; 
                    $result=$conn->query($sql); 
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['dia']."<br>";
                    }
                    }
                    ?>
        		</td>
        		<td>
        			<?php  
                    $sql="SELECT h.horaInicio, c.idCurso
					FROM horario h
					INNER JOIN grupo g ON h.idGrupo = g.idGrupo
					INNER JOIN grupo_curso gc ON g.idGrupo = gc.idGrupo
					INNER JOIN curso c ON gc.idCurso = c.idCurso
					WHERE c.idCurso = '$idCurso';"; 
                    $result=$conn->query($sql); 
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['horaInicio']."<br>";
                    }
                    }
                    ?>
        		</td>
        		<td>
        			<?php  
                    $sql="SELECT h.horaFin, c.idCurso
					FROM horario h
					INNER JOIN grupo g ON h.idGrupo = g.idGrupo
					INNER JOIN grupo_curso gc ON g.idGrupo = gc.idGrupo
					INNER JOIN curso c ON gc.idCurso = c.idCurso
					WHERE c.idCurso = '$idCurso';"; 
                    $result=$conn->query($sql); 
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['horaFin']."<br>";
                    }
                    }

                    ?>
        		</td>
        	</tr>
        	<tr class="no">
        		<td colspan="4">
        			<button id="btnPrint" class="btn btn-success" id="imprimir"><span class="fa fa-print"></span> &nbsp;Imprimir</button>
        		</td>
        	</tr>
        </table>


 </div>
                    
 </div>
        

 </div>
 </div>
 <?php
}
 ?>
    <div class="col-sm-1 col-md-1 col-lg-1">
       &nbsp;
    </div>
 </div>
