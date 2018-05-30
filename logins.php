<script>
$(document).ready(function(evento){
   
    $('#mostrarPass').click(function (evento) {
    	if ($("#mostrarPass").prop("checked") == true) {
    		$('#contrasena').attr("type","text");
    	}else{
    		$('#contrasena').attr("type","password");
    	}
    });
    $('#mostrarPass2').click(function (evento) {
    	if ($("#mostrarPass2").prop("checked") == true) {
    		$('#contrasena2').attr("type","text");
    	}else{
    		$('#contrasena2').attr("type","password");
    	}
    });
    $('#mostrarPass3').click(function (evento) {
    	if ($("#mostrarPass3").prop("checked") == true) {
    		$('#contrasena3').attr("type","text");
    	}else{
    		$('#contrasena3').attr("type","password");
    	}
    });
});
    

</script>
<div class="row">
	<div class="col-lg-12">
	    <div id="cont" style="display:none;">
		</div>
	    <div id="admin" class="flotante">
			<div>
				 <h3 class="title1">Inicio Sesi&oacute;n Administrador<a onClick="flotante(2)" class="close"><i class="fa fa-close fa-1x" style="margin-right: 10px;"></i></a></h3>
				
			</div>
			<div class="conte">
				<form method=post action="login.php">
					<label>Usuario</label>
					<input type="text" class="form-control " name="uid" class="form-control" placeholder="Usuario" required ><br>
					<label>Contrase&ntilde;a</label>
					<input type="password" name="contra" id="contrasena" class="form-control " placeholder="Contrase&ntilde;a" required >
					<label style="font-weight: normal;"> <input type="checkbox" id="mostrarPass">Mostrar Contraseña</label>
					<div width=100%>
					<input type="hidden" name="rol" value="admin">
					<button name="login" type="submit" class="new btn" style="margin-bottom: 10px;margin-right: 0px;margin-top: 5px;margin-left: 5px;">Iniciar sesi&oacute;n</button>
		            </div>
					<br>
				</form>
				<p>&nbsp;</p>
			</div>
		</div>	 

		<div id="alumno" class="flotante">
			<div>
				 <h3 class="title1">Inicio de Sesi&oacute;n Alumnos<a onClick="flotante(2)" class="close"><i class="fa fa-close fa-1x" style="margin-right: 10px;"></i></a></h3>
				
			</div>
			<div class="conte">
				<form method=post action="login.php">
					<label>Usuario</label>
					<input type="text" class="form-control " name="uid" class="form-control" placeholder="Usuario"  required ><br>
					<label>Contrase&ntilde;a</label>
					<input type="password" name="contra" id="contrasena2" class="form-control " placeholder="Contrase&ntilde;a" id="contrase" required >
					<label style="font-weight: normal;"> <input type="checkbox" id="mostrarPass2">Mostrar Contraseña</label>
					<div width=100%>
					<input type="hidden" name="rol" value="alumno">
					<button name="login" type="submit" class="new btn" style="margin-bottom: 10px;margin-right: 0px;margin-top: 5px;margin-left: 5px;">Iniciar sesi&oacute;n</button>
		            </div>
					<br>
				</form>
				<p>&nbsp;</p>
			</div>
		</div>	    

		<div id="docente" class="flotante">
			<div>
				 <h3 class="title1">Inicio de Sesi&oacute;n docente<a onClick="flotante(2)" class="close"><i class="fa fa-close fa-1x" style="margin-right: 10px;"></i></a></h3>
				
			</div>
			<div class="conte" id="div_admin">
				<form method=post action="login.php">
					<label>Usuario</label>
					<input type="text" class="form-control " name="uid" class="form-control" placeholder="Usuario"  required ><br>
					<label>Contrase&ntilde;a</label>
					<input type="password" name="contra" id="contrasena3" class="form-control " placeholder="Contrase&ntilde;a" required >
					<label style="font-weight: normal;"> <input type="checkbox" id="mostrarPass3">Mostrar Contraseña</label>
					<div width=100%>
					<input type="hidden" name="rol" value="docente">
					<button name="login" type="submit" class="new btn" style="margin-bottom: 10px;margin-right: 0px;margin-top: 5px;margin-left: 5px;">Iniciar sesi&oacute;n</button>
		            </div>
					<br>
				</form>
				<p>&nbsp;</p>
			</div>
		</div>	    

	</div>

			
</div>