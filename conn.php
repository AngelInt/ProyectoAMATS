<?php
	$server = "localhost";
	$userBd = "root";
	$pwdBd = "";
	$bd = "cda";

	$conn = new mysqli($server,$userBd,$pwdBd,$bd);

	if ($conn->connect_error) {

		echo "
			<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                Conección fallida: Ocurrió un Error desconocido mientras se intentaba conectar. 
            </div>
		";
		;
	}else{
		echo "
			<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                Conección Exitosa.
            </div>
		";
	}


?>