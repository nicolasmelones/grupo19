function mostrarMensaje(){
	alert("¿Está seguro que desea modificar la/s caracteristicas?");
}


function valida_enviar(){ 
   	//validacion del nombre 
   	if (document.registro.nombre.value.length==0){ 
      	alert("Tiene que escribir su nombre") 
      	document.registro.nombre.focus() 
      	return false; 
   	}
	else if ( !(/^[a-zA-Z_áéíóúñÁÉÍÓÚÑ'\s]*$/.test(document.registro.nombre.value)) ){
		alert("Tiene que escribir su nombre en letras") 
      	document.registro.nombre.focus() 
      	return false;
	}
	
	//validacion del apellido
   	if (document.registro.apellido.value.length==0){ 
      	alert("Tiene que escribir su apellido") 
      	document.registro.apellido.focus() 
      	return false; 
   	} 


	//validacion del e-mail
	if (document.registro.email.value.length==0){ 
      	alert("Tiene que escribir su E-mail") 
      	document.registro.email.focus() 
      	return false;
   	}
	//validacion del formato del e-mail
	else if ( !(/\S+@\S+\.\S+/.test(document.registro.email.value)) ){
		alert("Tiene que escribir un E-mail con formato válido") 
      	document.registro.email.focus() 
      	return false;}
	
	
	//validacion de la clave
	if (document.registro.clave.value.length==0){ 
      	alert("Tiene que escribir su Clave") 
      	document.registro.clave.focus() 
      	return false; 
   	}
	
	if (document.registro.telefono.value.length==0){ 
      	alert("Tiene que escribir su Teléfono") 
      	document.registro.telefono.focus() 
      	return false; 
   	}
	else if ( !(/^[0-9]+$/.test(document.registro.telefono.value)) ){
		alert("Tiene que escribir un Teléfono en números") 
      	document.registro.telefono.focus() 
      	return false;}
	
	if (document.registro.edad.value.length==0){ 
      	alert("Tiene que escribir su Edad") 
      	document.registro.edad.focus() 
      	return false; 
   	}
	else if ( !(/^[0-9]+$/.test(document.registro.edad.value)) ){
		alert("Tiene que escribir se Edad en números") 
      	document.registro.edad.focus() 
      	return false;}
	
	if (document.registro.localidades.value==0){ 
      	alert("Tiene que seleccionar una Localidad") 
      	document.registro.localidades.focus() 
      	return false; 
   	}
}


function valida_enviar1(){ 
   	//validacion del email 
   	if (document.iniciar.email.value.length==0){ 
      	alert("Tiene que escribir su E-mail") 
      	document.iniciar.email.focus() 
      	return false; 
   	}
	else if ( !(/\S+@\S+\.\S+/.test(document.iniciar.email.value)) ){
		alert("Tiene que escribir un E-mail con formato válido") 
      	document.iniciar.email.focus() 
      	return false;}

	//validacion de la contraseña 
   	if (document.iniciar.clave.value.length==0){ 
      	alert("Tiene que escribir su contraseña") 
      	document.iniciar.clave.focus() 
      	return false; 
   	}
}

function valida_enviar2(){ 
		//validacion del tipo 
   	if (document.credito.numero.value.length==0){ 
      	alert("Debe escribir un número de tarjeta") 
      	document.credito.numero.focus() 
      	return false; 
   	}
	
	else if ( !(/^[0-9]+$/.test(document.credito.numero.value)) ){
		alert("Tiene que escribir solo números en el campo 'Número de tarjeta'") 
      	document.credito.numero.focus() 
      	return false;}
		
	if (document.credito.codigo.value.length==0){ 
      	alert("Debe escribir un código de seguridad") 
      	document.credito.codigo.focus() 
      	return false; 
   	}
	else if ( !(/^[0-9]+$/.test(document.credito.codigo.value)) ){
		alert("Tiene que escribir solo números en el campo 'Código de seguridad'") 
      	document.credito.codigo.focus() 
      	return false;}
}

function valida_enviar3(){ 
		//validacion de la marca 
   	if (document.gauchada.titulo.value.length==0){ 
      	alert("Debe escribir un Título") 
      	document.gauchada.titulo.focus() 
      	return false; 
   	}
	
	if (document.gauchada.descripcion.value.length==0){ 
      	alert("Debe escribir una Descripción") 
      	document.gauchada.descripcion.focus() 
      	return false; 
   	}
	
	if (document.gauchada.fecha.value.length==0){ 
      	alert("Debe ingresar una Fecha") 
      	document.gauchada.fecha.focus() 
      	return false; 
   	}
	

		
}

function valida_enviar4(){
		//validacion del modelo
   	if (document.modelo.modelo.value.length==0){ 
      	alert("Debe escribir un modelo") 
      	document.modelo.modelo.focus() 
      	return false; 
   	}

	if(confirm("¿Está seguro que desea modificar este Modelo?")){}
	else {return false}
	
}

function valida_enviar5(){ 
		//validacion de la caracteristica 
   	if (document.caracteristica.caracteristica.value.length==0){ 
      	alert("Debe escribir una característica") 
      	document.caracteristica.caracteristica.focus() 
      	return false; 
   	}
	
	if(confirm("¿Está seguro que desea modificar esta Característica?")){}
	else {return false}
}

function Mayuscula2() {
    document.modificar.patente.value = document.modificar.patente.value.toUpperCase();
}

function valida_enviar6(){
	//validacion del tipo 
   	if (document.modificar.tipo.value.length==0){ 
      	alert("Debe seleccionar un tipo") 
      	document.modificar.tipo.focus() 
      	return false; 
   	}
	
	
	//validacion del modelo
   	if (document.modificar.modelo.value.length==0){ 
      	alert("Debe seleccionar un modelo") 
      	document.modificar.modelo.focus() 
      	return false; 
   	}
	
	
   	//validacion del año 
   	if (document.modificar.año.value.length==0){ 
      	alert("Debe escribir un año") 
      	document.modificar.año.focus() 
      	return false; 
   	}
	
	else if (document.modificar.año.value.length!=4){
		alert("Debe escribir cuatro números") 
      	document.modificar.año.focus() 
      	return false;
	}	
		
	else if ( !/^[0-9]{4}$/.test(document.modificar.año.value) ){
		alert('Tiene que escribir un año con formato válido. Ejemplo: "2010"') 
      	document.modificar.año.focus() 
      	return false;
	}
	
	else if (document.modificar.año.value < 1900){
		alert('Tiene que escribir un año entre 1900 y 2100') 
      	document.modificar.año.focus() 
      	return false;
	}
	
	else if (document.modificar.año.value > 2100){
		alert('Tiene que escribir un año entre 1900 y 2100') 
      	document.modificar.año.focus() 
      	return false;
	}

	
	//validacion de la patente
   	if (document.modificar.patente.value.length==0){ 
      	alert("Debe escribir una patente") 
      	document.modificar.patente.focus() 
      	return false; 
   	}
	
	else if ( !(/^[a-zA-Z0-9]*$/.test(document.modificar.patente.value)) ){
      	alert("La patente solo con letras y/o numeros por favor") 
      	document.modificar.patente.focus() 
      	return false; 
   	}


	//validacion del precio
	if (document.modificar.precio.value.length==0){ 
      	alert("Debe escribir un precio") 
      	document.modificar.precio.focus() 
      	return false;
   	}
	
	else if ( !/^([0-9_.])*$/.test(document.modificar.precio.value) ){
		alert('Tiene que escribir el precio en números') 
      	document.modificar.precio.focus() 
      	return false;
	
	}
	//validacion de las caracteristicas
	var checked=false;
	var elements = document.getElementsByName("caracteristica[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}
	if (!checked) {
		alert('Debe seleccionar al menos una característica');
		return false;
	}
	
	if(confirm("¿Está seguro que desea modificar la/s características?")){}
	else {return false;}
}	

function Mayuscula() {
    document.cargar.patente.value = document.cargar.patente.value.toUpperCase();
}

function valida_enviar7(){ 
	//validacion del tipo 
   	if (document.cargar.tipo.value.length==0){ 
      	alert("Debe seleccionar un tipo") 
      	document.cargar.tipo.focus() 
      	return false; 
   	}
	

	//validacion del modelo 
 	if (document.cargar.modelo.value.length==0){ 
      	alert("Debe seleccionar un modelo") 
      	document.cargar.modelo.focus() 
      	return false; 
   	} 	
	
	
   	//validacion del año 
   	if (document.cargar.año.value.length==0){ 
      	alert("Debe escribir un año") 
      	document.cargar.año.focus() 
      	return false; 
   	}
	else if (document.cargar.año.value.length!=4){
		alert("Debe escribir cuatro números") 
      	document.cargar.año.focus() 
      	return false;
	}	
		
	else if ( !/^[0-9]{4}$/.test(document.cargar.año.value) ){
		alert('Tiene que escribir un año con formato válido. Ejemplo: "2010"') 
      	document.cargar.año.focus() 
      	return false;
	}
	
	else if (document.cargar.año.value < 1900){
		alert('Tiene que escribir un año entre 1900 y 2100') 
      	document.cargar.año.focus() 
      	return false;
	}
	
	else if (document.cargar.año.value > 2100){
		alert('Tiene que escribir un año entre 1900 y 2100') 
      	document.cargar.año.focus() 
      	return false;
	}

	
	//validacion de la patente
   	if (document.cargar.patente.value.length==0){ 
      	alert("Debe escribir una patente") 
      	document.cargar.patente.focus() 
      	return false; 
   	}
	else if ( !(/^[a-zA-Z0-9]*$/.test(document.cargar.patente.value)) ){
      	alert("Solo letras y numeros por favor") 
      	document.cargar.patente.focus() 
      	return false; 
   	} 	


	//validacion del precio
	if (document.cargar.precio.value.length==0){ 
      	alert("Debe escribir un precio") 
      	document.cargar.precio.focus() 
      	return false;
   	}
	
	else if ( !/^([0-9])*$/.test(document.cargar.precio.value) ){
		alert('Tiene que escribir el precio en números') 
      	document.cargar.precio.focus() 
      	return false;
	
	}
	

	//validacion de las caracteristicas
	var checked=false;
	var elements = document.getElementsByName("caracteristica[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}
	if (!checked) {
		alert('Debe seleccionar al menos una característica');
		return false;
	}
	
	//validacion del imagen
	if (document.cargar.imagen.value.length==0){ 
      	alert("Debe seleccionar una imagen") 
      	document.cargar.imagen.focus() 
      	return false;
   	}
	
	if(confirm("¿Está seguro que desea cargar este vehículo?")){}
	else {return false}
   	//document.contacto.submit();
	
}

function valida_enviar8(){
	
	if (document.t.tipo.value.length==0){ 
      	alert("Debe seleccionar un Tipo para modificar") 
      	document.t.tipo.focus() 
      	return false;
   	}
	
	if (document.t.tipo_l.value.length==0){ 
      	alert("Debe ingresar un valor") 
      	document.t.tipo_l.focus() 
      	return false;
   	}
	
	if(confirm("¿Está seguro que desea modificar este Tipo?")){}
	else {return false}
}

function valida_enviar9(){
	
	if (document.t1.marca.value.length==0){ 
      	alert("Debe seleccionar una Marca para modificar") 
      	document.t1.marca.focus() 
      	return false;
   	}
	
	if (document.t1.marca_l.value.length==0){ 
      	alert("Debe ingresar un valor") 
      	document.t1.marca_l.focus() 
      	return false;
   	}
	
	if(confirm("¿Está seguro que desea modificar esta Marca?")){}
	else {return false}
} 	

function valida_enviar10(){
	
	if (document.t2.modelo.value.length==0){ 
      	alert("Debe seleccionar un Modelo para modificar") 
      	document.t2.modelo.focus() 
      	return false;
   	}
	
	if (document.t2.modelo_l.value.length==0){ 
      	alert("Debe ingresar un valor") 
      	document.t2.modelo_l.focus() 
      	return false;
   	}
	
	if(confirm("¿Está seguro que desea modificar este Modelo?")){}
	else {return false}
} 	

function valida_enviar11(){
	
	if (document.t3.caracteristica.value.length==0){ 
      	alert("Debe seleccionar una Característica para modificar") 
      	document.t3.caracteristica.focus() 
      	return false;
   	}
	
	if (document.t3.caracteristica_l.value.length==0){ 
      	alert("Debe ingresar un valor") 
      	document.t3.caracteristica_l.focus() 
      	return false;
   	}
	
	if(confirm("¿Está seguro que desea modificar esta Característica?")){}
	else {return false}
}

function valida_enviar12(){
	
	if (document.tipo1.tipo.value.length==0){ 
      	alert("Debe seleccionar un Tipo") 
      	document.tipo1.tipo.focus() 
      	return false;
   	}
	
	if(confirm("¿Está seguro que desea eliminar este Tipo?")){}
	else {return false}
}

function valida_enviar13(){
	
	if (document.marca1.marca.value.length==0){ 
      	alert("Debe seleccionar una Marca") 
      	document.marca1.marca.focus() 
      	return false;
   	}
	
	if(confirm("¿Está seguro que desea eliminar esta Marca?")){}
	else {return false}
} 	

function valida_enviar14(){
	
	if (document.modelo1.modelo.value.length==0){ 
      	alert("Debe seleccionar un Modelo") 
      	document.modelo1.modelo.focus() 
      	return false;
   	}
	
	if(confirm("¿Está seguro que desea eliminar este Modelo?")){}
	else {return false}
} 	

function valida_enviar15(){
	
	if (document.caracteristica1.caracteristica.value.length==0){ 
      	alert("Debe seleccionar una Característica") 
      	document.caracteristica1.caracteristica.focus() 
      	return false;
   	}
	
	if(confirm("¿Está seguro que desea eliminar esta Característica")){}
	else {return false}
}

function valida_enviar16(){ 
		//validacion del tipo 
   	if (document.tipo.tipo.value.length==0){ 
      	alert("Debe escribir un tipo") 
      	document.tipo.tipo.focus() 
      	return false; 
   	}
	
	else if ( !(/^[a-zA-Z_áéíóúñ']*$/.test(document.tipo.tipo.value)) ){
		alert("Solo letras por favor") 
      	document.tipo.tipo.focus() 
      	return false;}

	if(confirm("¿Está seguro que desea cargar este Tipo?")){}
	else {return false}		
}

function valida_enviar17(){ 
		//validacion de la marca 
   	if (document.marca.marca.value.length==0){ 
      	alert("Debe escribir una marca") 
      	document.marca.marca.focus() 
      	return false; 
   	}
	
	else if ( !(/^[a-zA-Z_áéíóúñ']*$/.test(document.marca.marca.value)) ){
		alert("Solo letras por favor") 
      	document.marca.marca.focus() 
      	return false;}

	if(confirm("¿Está seguro que desea cargar esta Marca?")){}
	else {return false}	
		
}

function valida_enviar18(){
		//validacion del modelo
   	if (document.modelo.marca_modelo.value.length==0){ 
    alert("Debe escribir seleccionar una Marca") 
    document.modelo.marca_modelo.focus() 
    return false; 
   	}
	
	if (document.modelo.modelo.value.length==0){ 
      	alert("Debe escribir un modelo") 
      	document.modelo.modelo.focus() 
      	return false; 
   	}

	if(confirm("¿Está seguro que desea cargar este Modelo?")){}
	else {return false}
	
}

function valida_enviar19(){ 
		//validacion de la caracteristica 
   	if (document.caracteristica.caracteristica.value.length==0){ 
      	alert("Debe escribir una característica") 
      	document.caracteristica.caracteristica.focus() 
      	return false; 
   	}
	
	if(confirm("¿Está seguro que desea cargar esta Característica?")){}
	else {return false}
}