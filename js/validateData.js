function validateData (form) {
    var first_name = form.first_name.value;
    var last_name = form.last_name.value;
	var email = form.email.value;
    var squares = form.squares.value;
    
    var atpos = form.email.value.indexOf("@");
    var dotpos = form.email.value.lastIndexOf(".");
	
	if (first_name == "" || first_name == null || 
		last_name == "" || last_name == null ||
		email == "" || email == null ||
		squares == "" || squares == null) {
            alert ("Please fill out all required fields in the form.");
			return false;
	}
	
	else {
		return true;
	}
 }

 