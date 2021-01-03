function loginValidate(){
    //alert("daef");

    var email = document.getElementById('userEmail').value;
    var pass = document.getElementById('userPassword').value;
    //alert(email);
    if(email == ""){
        //alert("hello");
        document.getElementById('err_teacherEmail').innerHTML = "Email Must be Filled";
        return false;
    }

    if(pass == ""){
        //alert("pass");
        document.getElementById('err_teacherPassword').innerHTML = "Password Must be Filled";
        return false;
    }

}
