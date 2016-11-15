//Submit form with id function
function submit_by_id() {
	var usuario = document.getElementById("usuario").value;
  var password = document.getElementById("password").value;
	
	if(validation())// Calling validation function
	  { 
	    document.getElementById("form_id").submit();//form submission
	    //alert(" Usuario : "+usuario+" \n Password : "+password+" \n Form Id : "+document.getElementById("form_id").getAttribute("id")+"\n\n Form Submitted Successfully......");
	  }	
}	
//  Name and Email validation Function
function validation(){
	var usuario = document.getElementById("usuario").value;
  var password = document.getElementById("password").value;

  if(usuario ==='' || password ===''){
    alert("Campos sin completar");
    return false;
  }else{
    return true;
  }
}
   /* var repassword = document.getElementById("repassword").value;
    var espacios = false;
    var cont = 0;
 
	while (!espacios && (cont < p1.length)) {
    if (p1.charAt(cont) == " ")
      espacios = true;
    cont++;
     }
 
    if (espacios) {
      alert ("La contraseña no puede contener espacios en blanco");
      return false;
    }

	if (p1.length == 0 || p2.length == 0) {
 	alert("Los campos de la password no pueden quedar vacios");
  	return false;
    }

    if (p1 != p2) {
 	 alert("Las passwords deben de coincidir");
  	 return false;
	} 
	else {
  	 alert("Todo esta correcto");
     return true; 
    }   
}*/
