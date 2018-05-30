 
<script>
$(document).ready(function(evento){
    
    $('td').click(function(evento){
        var x = $(this).parent("tr");
        var id = document.getElementsByName('idCurso')[x.index()].value;
        var curso = document.getElementsByName('nombreCurso')[x.index()].value;
        var descripcion = document.getElementsByName('descripcionCurso')[x.index()].value;
        //var idAula = document.getElementsByName('codAula')[x.index()].value;


        document.getElementById("idCurso").readOnly = true;
        document.getElementById("updCurso").disabled = false;
        document.getElementById("addCurso").disabled = true;
        document.getElementById("limpiar").disabled = false;
        //$('.selDiv option[value="SEL1"]')
        $('#idCurso').val(id);
        $('#nombreCurso').val(curso);
        $('#descripcionCurso').val(descripcion);
        //$('#idAula2').val(idAula);
        
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
                        Administrar Cursos
                    </div>
                    <div class="panel-body" style="text-align: justify;">

                    <form method="POST">
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-key"></i></span>
                            <div class="col-md-7">
                                <input id="idCurso" name="idCurso" type="text" placeholder="Código Curso" class="form-control" maxlength="15" required="">
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-check-square-o bigicon"></i></span>
                            <div class="col-md-7">
                                <select class="form-control" name="idAula2" id="idAula2" required="">
                                    <option value>->Asignar Aula<-</option>
                                <?php
                                    $sql = "select * from aula";
                                    $result=$conn->query($sql); 
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "
                                                <option value='".$row["idAula"]."'>".$row["nombreAula"]."</option>

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
                                    <input id="nombreCurso" name="nombreCurso" type="text" placeholder="Nombre Curso" class="form-control" required="">
                                </div>
                        </div>
                        <br>
                        <br>                                     
                        <div class="form-group">
                             <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-comments-o"></i></span>
                                <div class="col-md-7">
                                    <input id="descripcionCurso" name="descripcionCurso" type="text" placeholder="Descripcion Curso" class="form-control">
                                </div>
                        </div>
                            
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <br>
                                <input type="submit" id="addCurso" name="agregarCurso" class="btn btn-info btn-lg" value="Agregar">
                                <input type="submit" id="updCurso" name="actualizarCurso" class="btn btn-info btn-lg" value="Actualizar" disabled=true>
                                <input type="reset" id="limpiar" name="reset" class="btn btn-info btn-lg" value="Cancelar">
                            </div>
                        </div>
                    </form>
                       
                    </div>
                    
                </div>

                    <div class="panel panel-info">
                    <div class="panel-heading">
                        Cursos
                    </div>
                    <div class="panel-body" style="text-align: justify;">
                    <form method="POST">
                        <table class="table">
                            <tr>
                                <th>
                                </th>
                                <th>
                                    Código Curso
                                </th>
                                <th>
                                   Aula
                                </th>
                                <th>
                                   Nombre Curso
                                </th>
                                <th>
                                   Descripción Curso
                                </th>
                            </tr>

                            <?php
                            $sql = "select c.idCurso as idCurso, a.nombreAula as nombreAula, a.idAula as idAula, c.nombreCurso as nombreCurso, c.descripcionCurso as descripcionCurso from curso c inner join aula a on c.idAula = a.idAula";
                             $result=$conn->query($sql); 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <th class='no'>
                                       
                                            <input type=checkbox name=eliminar[] value=".$row["idCurso"].">
                                            <input type='hidden' name='idCurso' value='".$row["idCurso"]."'>
                                            <input type='hidden' name='nombreCurso' value='".$row["nombreCurso"]."'>
                                            <input type='hidden' name='descripcionCurso' value='".$row["descripcionCurso"]."'>
                                            <input type='hidden' name='codAula' value='".$row["idAula"]."'>
                                        </th>
                                        <td> ".$row["idCurso"]."</td>
                                        <td> ".$row["nombreAula"]."</td>
                                        <td> ".$row["nombreCurso"]."</td>
                                        <td> ".$row["descripcionCurso"]."</td>
                                        </tr>
                                        ";
                                        
                                }
                            }

                           ?>
                           <tr class="no">
                                <td colspan="5" align='center'>
                                    <br>
                                  <input type="submit" name="eliminarCurso" value='Eliminar Registro' class="btn btn-info btn-lg">                              
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
if (isset($_POST["agregarCurso"])) {
    $idCurso=$_POST["idCurso"];
    $idAula=$_POST["idAula2"];
    $nombreCurso=$_POST["nombreCurso"];
    $descripcionCurso=$_POST["descripcionCurso"];

        $tabla="curso";
        $campos="idCurso,idAula,nombreCurso,descripcionCurso";
        $values="'$idCurso','$idAula','$nombreCurso','$descripcionCurso'";

        $sql="INSERT INTO $tabla ($campos) VALUES ($values) ";

        if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro agregado satisfactoriamente.');
            document.location='?nh=administrarCursos.php';
            </script>";
        }else {
            echo "Error: $sql <br> $conn->error ";
        }
     
 }elseif (isset($_POST["eliminar"])) {
    $curso = $_POST["eliminar"];
    foreach($curso as $idCurso){
        $sql="delete from curso where idCurso='$idCurso'";
        $conn->query($sql);    
    }
    if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro eliminado satisfactoriamente.');
            document.location='?nh=administrarCursos.php';
            </script>";
        }else {
            echo "<script>alert('Primero debe verificar que en el curso no este asignado a ningún grupo, a ningún horario creado y que no tenga un profesor asignado.');
            document.location='?nh=administrarCursos.php';
            </script>";
        }
 }elseif (isset($_POST["actualizarCurso"])) {
    $idCurso=$_POST["idCurso"];
    $idAula=$_POST["idAula2"];
    $nombreCurso=$_POST["nombreCurso"];
    $descripcionCurso=$_POST["descripcionCurso"];

       $sql="update curso set idAula='".$idAula."', nombreCurso='".$nombreCurso."', descripcionCurso='".$descripcionCurso."'  where idCurso='$idCurso';";

   
    $res=$conn->query($sql);

    if ($res == TRUE) {
            echo "<script>alert('Registro Actualizado satisfactoriamente.');
            document.location='?nh=administrarCursos.php';
            </script>";
        }else {
            echo "Error: $sql <br> $conn->error ";
        }
     
 } 
?>