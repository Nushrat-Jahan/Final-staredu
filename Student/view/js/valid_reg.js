function getElement(id){
	return document.getElementById(id);
}

function validate(){
	var hasErr = false;
	var e_fname = getElement("fname");
	var e_uname = getElement("uname");
	var e_pass  = getElement("pass");
	var e_cpass = getElement("cpass");
	var e_email = getElement("email");
	
	var err_fname = getElement("err_fname");
	var err_uname = getElement("err_uname");
	var err_pass  = getElement("err_pass");
	var err_cpass = getElement("err_cpass");
	var err_email = getElement("err_email");

	//Full Name
	if(e_fname.value == ""){
		hasErr= true;
		err_fname.innerHTML = "Full name Required";
		err_fname.style.color = "blue";
		e_fname.focus();
		return !hasErr;
	}
	else {
			err_fname.innerHTML = "";
	}
	
	//Username
	if(e_uname.value == ""){
		hasErr= true;
		err_uname.innerHTML = "Username Required";
		err_uname.style.color = "blue";
		e_uname.focus();
		return !hasErr;
	}
	else {
			err_uname.innerHTML = "";
	}

	//Password
	if(e_pass.value == ""){
		hasErr= true;
		err_pass.innerHTML = "Password Required";
		err_pass.style.color = "blue";
		e_pass.focus();
		return !hasErr;
	}
	else {
			err_pass.innerHTML = "";
	}
	
	//Confirm Password
	if(e_cpass.value == ""){
		hasErr= true;
		err_cpass.innerHTML = "Confirm your Password";
		err_cpass.style.color = "blue";
		e_cpass.focus();
		return !hasErr;
	}
	else {
			err_cpass.innerHTML = "";
	}
	
	//Email
	if(e_email.value == ""){
		hasErr= true;
		err_email.innerHTML = "Please give your email";
		err_email.style.color = "blue";
		e_email.focus();
		return !hasErr;
	}
	else {
			err_email.innerHTML = "";
	}

	return !hasErr;
	
}

function refresh(){
	var err_fname = getElement("err_fname");
	var err_uname = getElement("err_uname");
	var err_pass  = getElement("err_pass");
	var err_cpass = getElement("err_cpass");
	var err_email = getElement("err_email");
	
	
	err_name.innerHTML = "";
	err_uname.innerHTML = "";
	err_pass.innerHTML = "";
	err_cpass.innerHTML = "";
	err_email.innerHTML = "";
	
}
