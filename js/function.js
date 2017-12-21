$(document).ready(function() {
	$('#metodo').change(function(){
		if($('#metodo').val()=="Establecer"){
			$('#consulta_box').fadeOut(function(){
				$('#establecer_actualizar').fadeIn();
				$('#btnid').fadeIn();
			});						
		}
		if($('#metodo').val()=="Consulta"){
			$('#establecer_actualizar').fadeOut(function(){
				$('#consulta_box').fadeIn();
				$('#btnid').fadeIn();
			});
		}
		if($('#metodo').val()==""){
			$('#establecer_actualizar').fadeOut();
			$('#consulta_box').fadeOut();
			$('#btnid').fadeOut();
		}
		
	});

	// Botón para reiniciar el aplicativo
	$("#reiniciar").click(function(e){
		e.preventDefault();
		if(confirm("Deseas reinicar el aplicativo?")){
			window.location='index.php';
		}
	});
});

// Validar los campos
function validateform(){

	if($('#metodo').val()==""){
		alert("Por favor seleccione una opción");
		$('#metodo').focus();
		return false;
	}

	// Método Establecer
	if($('#metodo').val()=="Establecer"){
		// X
		if(!validateVal($('#set1'),'x')){ return false; }
		if(!validateNum($('#set1'),"x")){ return false; }

		// Y
		if(!validateVal($('#set2'),'y')){ return false; }
		if(!validateNum($('#set2'),"y")){ return false; }

		// Z
		if(!validateVal($('#set3'),'z')){ return false; }
		if(!validateNum($('#set3'),"z")){ return false; }

		// W
		if(!validateVal($('#set4'),'w')){ return false; }
		if(!validateNum($('#set4'),"w")){ return false; }
	}
	// Método Consulta
	if($('#metodo').val()=="Consulta"){
		// X1
		if(!validateVal($('#query1'),'x1')){ return false; }
		if(!validateNum($('#query1'),"x1")){ return false; }

		// Y1
		if(!validateVal($('#query2'),'y1')){ return false; }
		if(!validateNum($('#query2'),"y1")){ return false; }

		// Z1
		if(!validateVal($('#query3'),'z1')){ return false; }
		if(!validateNum($('#query3'),"z1")){ return false; }

		// X2
		if(!validateVal($('#query4'),'x2')){ return false; }
		if(!validateNum($('#query4'),"x2")){ return false; }

		// Y2
		if(!validateVal($('#query5'),'y2')){ return false; }
		if(!validateNum($('#query5'),"y2")){ return false; }

		// Z2
		if(!validateVal($('#query6'),'z2')){ return false; }
		if(!validateNum($('#query6'),"z2")){ return false; }

	}	

	return true;
}

// Validar para que ingrese un valor
function validateVal(select, msg){
	if($.trim(select.val())==""){
		alert("Por favor ingrese un valor en " + msg);
		select.val("");
		select.focus();
		return false;
	}
	return true;
}

// Validar para que ingrese sólo números
function validateNum(select, msg){
	if(isNaN(select.val())){
		alert("Por favor ingrese solo números en " + msg);
		select.val("");
		select.focus();
		return false;
	}
	return true;
}
