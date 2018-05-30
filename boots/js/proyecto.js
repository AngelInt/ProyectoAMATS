var contraseña="admin123";

function flotante(tipo){
    
        if (tipo==1){
        	flotante(2);
	        $('#admin').animate({
	          marginTop: "-152px"
	        });
	        $('#cont').show();
        }
		
        if (tipo==2){
	        $('#admin').animate({
	          marginTop: "-2000px"
	        });
	        $('#alumno').animate({
	          marginTop: "-2000px"
	        });
	        $('#docente').animate({
	          marginTop: "-2000px"
	        });
        	$('#cont').hide();

        }
		if (tipo==3){
			flotante(2);
			$('#alumno').animate({
				marginTop: "-145"
			});
			$('#cont').show();
		}
		if (tipo==4){
			flotante(2);
			$('#docente').animate({
				marginTop: "-145"
			});
			$('#cont').show();
		}
    }


function del(){
			var check = document.getElementsByName('inte');
			for (var i = 0; i<check.length; i++){
			if (check.item(i).checked == true){
			$("#inte"+(i+1)).css("display","none");
			$("#inte"+(i+1)).css("visibility","hidden");
				}
					
			}
			alert("Integrante/s eliminado/s satisfactoriamente.");
			}

function led(){
			var check = document.getElementsByName('even');
			for (var i = 0; i<check.length; i++){
			if (check.item(i).checked == true){
			$("#even"+(i+1)).css("display","none");
			$("#even"+(i+1)).css("visibility","hidden");
			}
									
			}
			alert("Evento/s eliminado/s satisfactoriamente.");
			}
function addInte(){
	var nombre = document.getElementById('nombre').value;
	var apellido = document.getElementById('apellido').value;
	var edad = document.getElementById('edad').value;
	var instrumento = document.getElementById('instrumento').value;
	var instituto = document.getElementById('instituto').value;


	if(nombre=="" || apellido=="" || edad=="" || instrumento=="" || instituto==""){
		alert('Llenar todos los campos');
	}else{
		alert('Integrante agregado satisfactoriamente');
	}

	}

function addInte1(){
	var fecha = document.getElementById('fecha').value;
	var actividad = document.getElementById('actividad').value;
	var lugar = document.getElementById('lugar').value;
	var hora = document.getElementById('hora').value;



	if(fecha=="" || actividad=="" || lugar=="" || hora==""){
		alert('Llenar todos los campos');
	}else{
		alert('Evento agregado satisfactoriamente');
	}

	}

	function addInte2(){
	var historia = document.getElementById('historia').value;
	
	if(historia==""){
		alert('Llenar el campo requerido');
	}else{
		alert('historia agregada satisfactoriamente');
	}

	}
function cambiarClave(){
	contraseña = document.getElementById("clave").value;
	flotante(2);
}

function mostrar() 
    {
    	var contra=document.getElementById('clave');
    	var contra1=document.getElementById('clave1');
    	var check = document.getElementById('mostrar');

        if (contra.getAttribute("type")==="password") 
        {
        	contra.setAttribute("type","text");
        	contra1.setAttribute("type","text");
        } else 
        {
            contra.type = "password";
            contra1.type = "password";
        }

    }

$(document).ready(function(evento){
  $('#cont').click(function(evento){
    flotante(2);
  });
});