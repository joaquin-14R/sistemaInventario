

function generarCampos(datos){
	var formulario = document.getElementById("formulario");

	formulario.innerHTML="";

	var input ="<form class='row g-3' method='POST' action='update.php' id='actualizar'>";
	input+="<div class='col-md-3'><label for='actdescripcion' class='form-label' >Descripción del producto</label><input type='text' class='form-control' id='actdescripcion' placeholder='Descripción' required name='descripcion' disabled></div>";
	input+="<div class='col-md-2'><label for='actprecio' class='form-label'>Precio</label><input type='number' class='form-control' id='actprecio' placeholder='$ Precio' required name='precioact'></div>"
	input+="<div class='col-md-2'><label for='actcantidad' class='form-label'>Cantidad</label><input type='number' class='form-control' id='actcantidad' placeholder='$ Cantidad' required name='cantidadact'></div>"
	input+="<div class='col-md-2'><label for='actfechar' class='form-label'>Fecha Registro</label><input type='date' class='form-control' id='actfechar' required name='fecharact'></div>"
	input+="<div class='col-md-2'><label for='actfechac' class='form-label'>Fecha Caducidad</label><input type='date' class='form-control' id='actfechac' required name='fechacact'></div>"
	input+="<div class='col-md-12'><input type='hidden' class='form-control' id='idart' name='idarti' ></div>"
	input+="<div class='col-md-12'><div class='d-grid gap-2 d-md-block'><button type='submit' class='btn btn-dark btn-sm' ><i class='bi bi-check-circle'></i></button> <button onclick='borrar()' type='button' class='btn btn-dark btn-sm'><i class='bi bi-x-circle'></i></button></div></div>"
	input+="</form>"
	formulario.innerHTML=input;
	capturarDatos(datos);
}


function capturarDatos(datos){
	d=datos.split('||');
	$('#idart').val(d[0]);
	$('#actdescripcion').val(d[1]);
	$('#actprecio').val(d[2]);
	$('#actcantidad').val(d[3]);
	$('#actfechar').val(d[4]);
	$('#actfechac').val(d[5]);

}


function borrar(){
	var formulario = document.getElementById("formulario");

	formulario.innerHTML="";
}



