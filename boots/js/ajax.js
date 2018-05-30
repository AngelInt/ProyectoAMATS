function objetoAjax(){
	var xmlhttp = false;
	try{
		xmlhttp= new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try{
			xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
		}catch(E){
			xmlhttp=false
		}

	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp=new XMLHttpRequest();
	}
	return xmlhttp;
}

function  consultar(){
	idAula = document.getElementById("idAula");
	ajax = objetoAjax();
	ajax.open("POST","consAula.php",true);
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4 && ajax.status==200){
			idAula.value=ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send()
}