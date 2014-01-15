function validateData (form) {
    var first_name = form.first_name.value;
    var last_name = form.last_name.value;
	var email = form.email.value;
    var squares = form.squares.value;
    
    var atpos = form.email.value.indexOf("@");
    var dotpos = form.email.value.lastIndexOf(".");
	
	if (first_name == "" || last_name == "" || email == "") {		
        alert("Please fill out all required fields in the form.");
		return false;
	}
	else if (squares == "") {
		alert("Please select at least one square.");
		return false;
	}
	
	else {
		return true;
	}
 }

 