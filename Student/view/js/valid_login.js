function getElement(id){
	return document.getElementById(id);
}

function validate(){
	var hasErr = false;
	var e_uname = getElement("uname");
	var e_pass  = getElement("pass");
	
	var err_uname = getElement("err_uname");
	var err_pass  = getElement("err_pass");
	
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
	
	return !hasErr;
	
}

function refresh(){
	var err_uname = getElement("err_uname");
	var err_pass  = getElement("err_pass");
	
	err_uname.innerHTML = "";
	err_pass.innerHTML = "";
}
