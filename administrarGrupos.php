<script>
$(document).ready(function(evento){
   
    $('td').click(function(evento){
        var x = $(this).parent("tr");
        var id = document.getElementsByName('idGrupo')[x.index()].value;
        var grupo = document.getElementsByName('nombreGrupo')[x.index()].value;

        document.getElementById("idGrupo").readOnly = true;
        document.getElementById("updGrupo").disabled = false;
        document.getElementById("addGrupo").disabled = true;
        $('#idGrupo').val(id);
        $('#nombreGrupo').val(grupo);
        
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
                        Administrar Grupos
                    </div>
                    <div class="panel-body" style="text-align: justify;">

                    <form method="POST">
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-key"></i></span>
                            <div class="col-md-7">
                                <input id="idGrupo" name="idGrupo" type="text" placeholder="Código Grupo" class="form-control" maxlength="15" required="">
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                             <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-users bigicon"></i></span>
                                <div class="col-md-7">
                                    <input id="nombreGrupo" name="nombreGrupo" type="text" placeholder="Nombre Grupo" class="form-control" required="">
                                </div>
                        </div>
                                                    
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <br>
                                <input type="submit" id="addGrupo" name="agregarGrupo" class="btn btn-info btn-lg" value="Agregar">
                                <input type="submit" id="updGrupo" name="actualizarGrupo" class="btn btn-info btn-lg" value="Actualizar" disabled=true>
                                <input type="reset" id="limpiar" name="reset" class="btn btn-info btn-lg" value="Cancelar" >
                            </div>
                        </div>
                    </form>
                       
                    </div>
                    
                </div>

                    <div class="panel panel-info">
                    <div class="panel-heading">
                        Grupos
                    </div>
                    <div class="panel-body" style="text-align: justify;">
                      <form method="POST">
                        <table class="table">
                            <tr>
                                <th>
                                </th>
                                <th>
                                    Código Grupo
                                </th>
                                <th>
                                   Nombre Grupo
                                </th>
                                
                            </tr>

                            <?php
                            $sql = "select * from grupo";
                            $result=$conn->query($sql); 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <th class='no'>
                                        
                                            <input type=checkbox name=eliminar[] value=".$row["idGrupo"].">
                                            <input type='hidden' name='idGrupo' value='".$row["idGrupo"]."'>
                                            <input type='hidden' name='nombreGrupo' value='".$row["nombreGrupo"]."'>
                                       
                                        </th>
                                        <td> ".$row["idGrupo"]."</td>
                                        <td> ".$row["nombreGrupo"]."</td>
                                   
                                        </tr>
                                        ";
                                        
                                }
                            }

                           ?>
                           <tr class='no'>
                                <td colspan="3" align='center'>
                                    <br>
                                  <input type="submit" name="eliminarGrupo" value='Eliminar Registro' class="btn btn-info btn-lg">                              
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
if (isset($_POST["agregarGrupo"])) {
    $idGrupo=$_POST["idGrupo"];

    $nombreGrupo=$_POST["nombreGrupo"];
 

        $tabla="grupo";
        $campos="idGrupo,nombreGrupo";
        $values="'$idGrupo','$nombreGrupo'";

        $sql="INSERT INTO $tabla ($campos) VALUES ($values) ";

        if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro agregado satisfactoriamente.');
            document.location='?nh=administrarGrupos.php';
            </script>";
        }else {
            echo "Error: $sql <br> $conn->error ";
        }
    
}elseif (isset($_POST["eliminar"])) {
    $grupo = $_POST["eliminar"];
    foreach($grupo as $idGrupo){
        $sql="delete from grupo where idGrupo='$idGrupo'";
        $conn->query($sql);    
    }
    if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Registro eliminado satisfactoriamente.');
            document.location='?nh=administrarGrupos.php';
            </script>";
        }else {
            echo "<script>alert('Primero debe verificar que el grupo no se encuentre asignado a ningún curso.');
            document.location='?nh=administrarGrupos.php';
            </script>";
        }
 }elseif (isset($_POST["actualizarGrupo"])) {
    $idGrupo = $_POST["idGrupo"];
    $nombreGrupo = $_POST["nombreGrupo"];
    
    $sql="update grupo set nombreGrupo='".$nombreGrupo."' where idGrupo='$idGrupo';";

   
    $res=$conn->query($sql);

    if ($res == TRUE) {
            echo "<script>alert('Registro Actualizado satisfactoriamente.');
            document.location='?nh=administrarGrupos.php';
            </script>";
        }else {
            echo "Error: $sql <br> $conn->error ";
        }
 }   
?>