function getElement(id){
	return document.getElementById(id);
}
function validate(){
	refresh();
	var hasErr=false;

	var e_uname = getElement("uname");
	var e_pass = getElement("pass");


	var err_uname = getElement("err_name");
	var err_pass = getElement("err_pass");

	
	

	if(e_uname.value == ""){
		hasErr = true;
		err_uname.innerHTML = "Username Required";
		e_uname.focus();
		return !hasErr;
	}
	if(md5(e_pass).value == ""){
		hasErr = true;
		err_pass.innerHTML = "Password Required";
		e_pass.focus();
		return !hasErr;
	}


	
	return !hasErr;

}
function refresh(){

	var err_uname = getElement("err_name");
	var err_pass = getElement("err_pass");

	
	
	err_uname.innerHTML = "";
	err_pass.innerHTML = "";

	
	
}