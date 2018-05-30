
<?php
session_start();

	include("conn.php");
	if(isset($_POST['rol'])){
		$uid = $_POST['uid'];
		$contra = $_POST['contra'];
		$rol = $_POST['rol'];

		switch ($rol) {
			case 'admin':
				
				$sql = "select * from profesor where idProfesor='".$uid."' and contrasenaProfesor='".$contra."' and permiso='".$rol."'";

				$result=$conn->query($sql);

				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$_SESSION["carnet"]=$row['idProfesor'];
						echo "
						<script>
							alert('¡Bienvenido ".$_SESSION["carnet"]."!');
							location.href='indexa.php';
						</script>
					";
					
				}else{
					echo "
					<script>
					alert('Nombre de usuario y/o contraseña inválido');
					window.location='index.php';
					</script>
					";
				}

				break;
			
			case 'alumno':
				$sql = "select * from alumno where idAlumno='".$uid."' and contrasenaAlumno='".$contra."'";
				echo $sql;
				$result=$conn->query($sql);

				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$_SESSION["carnet"]=$row['idAlumno'];
						echo "
						<script>
							alert('¡Bienvenido!');
							location.href='indexal.php';
						</script>
					";
					
				}else{
					echo "
					<script>
					alert('Nombre de usuario y/o contraseña inválido');
					window.location='index.php';
					</script>
					";
				}
				break;

			case 'docente':
				$sql = "select * from profesor where idProfesor='".$uid."' and contrasenaProfesor='".$contra."' and (permiso='".$rol."' or permiso='admin')";

				$result=$conn->query($sql);

				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();

						$_SESSION["carnet"]=$row['idProfesor'];
						echo "
							<script>
								alert('¡Bienvenido!');
								location.href='indexd.php';
							</script>
						";
					
					
				}else{
					echo "
					<script>
					alert('Nombre de usuario y/o contraseña inválido');
					window.location='index.php';
					</script>
					";
				}
				break;

		}
	}
?>