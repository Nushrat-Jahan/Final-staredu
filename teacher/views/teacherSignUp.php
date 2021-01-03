<?php
include_once '../controllers/teacherControllers.php';
function test(){
    echo 'hello php';
}
function test2($a, $b){
    $x = $a + $b;
    //echo 'hello test2';
    return $x;
}

?>
<html>
<head>
    <style>
        body{
            background-color: slategrey;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../design.css"/>
</head>
<body>

<script type="text/javascript">
    function teacherRegister(){
        //alert('fwe');
        document.getElementById('err_teacherName').innerHTML = "";
        document.getElementById('err_teacherEmail').innerHTML = "";
        document.getElementById('err_teacherPass').innerHTML = "";


        var name = document.getElementById('teacherName').value;
        var email = document.getElementById('teacherEmail').value;
        var pass = document.getElementById('teacherPass').value;
        //alert(email);

        //alert(zero);
        //check if name contains number
        var zero = name.search("0");
        var one = name.search("1");
        var two = name.search("2");
        var three = name.search("3");
        var four = name.search("4");
        var five = name.search("5");
        var six = name.search("6");
        var seven = name.search("7");
        var eight = name.search("8");
        var nine = name.search("9");

        //email search
        var at = email.search("@");
        var d = email.includes(".");

        var dot = email.indexOf(".");
        var atrate = email.indexOf("@");
        //alert('hi');
        //alert('else '+dot);

        //check if Password contains at least a number and a special character
        var pzero = pass.search("0");
        var pone = pass.search("1");
        var ptwo = pass.search("2");
        var pthree = pass.search("3");
        var pfour = pass.search("4");
        var pfive = pass.search("5");
        var psix = pass.search("6");
        var pseven = pass.search("7");
        var peight = pass.search("8");
        var pnine = pass.search("9");

        var pexc = pass.search("!");
        var pquest = pass.indexOf("?");

        //password is upper and lowercase
        var lower = -1;
        var upper = -1;

        /*alert('at '+at);
        alert('exc '+pexc);
        alert(pass);
        alert('low: '+lower);*/
        if(name == ""){
            //alert("hello");
            document.getElementById('err_teacherName').innerHTML = "Name Must be Filled";
            return false;
        }
        else{
            if(name.length < 6){
                //alert("name length");
                document.getElementById('err_teacherName').innerHTML = "Name Must at least 6 characters long";
                return false;
            }
            if (zero != -1 || one != -1 || three != -1 || four != -1 || five != -1 || six != -1 ||
                seven != -1 || eight != -1 || nine != -1 || two != -1){
                //alert("name conatins number");
                document.getElementById('err_teacherName').innerHTML = "Name Cannot have a number!";
                return false;
            }
        }

        if(email == ""){
            //alert("hello");
            document.getElementById('err_teacherEmail').innerHTML = "Email Must be Filled";
            return false;
        }
        else {
            if(at == -1){
                document.getElementById('err_teacherEmail').innerHTML = "Must Give @ in the email!";
                return false;
            }
            if(d == false){
                document.getElementById('err_teacherEmail').innerHTML = "Must Give dot (.) in the email. If given then not the in the first place!";
                return false;
            }
            if(atrate>dot){
                document.getElementById('err_teacherEmail').innerHTML = "dot (.) cannot be before @ in the email body!";
                return false;
            }
            /*else{

                var xhttp = new XMLHttpRequest();
                alert('t1');
                xhttp.onreadystatechange = function () {
                    alert('t2');
                    if (this.readyState == 4 && this.status == 200) {
                        alert('t3');
                        document.getElementById("err_teacherEmail").innerHTML = this.responseText;
                        if (document.getElementById("err_teacherEmail").innerHTML == "Exists"){
                            alert('t4');
                            document.getElementById('err_teacherEmail').innerHTML = "Exists";
                            alert('t5');
                            var sig = "false";
                            return false;
                        }
                    }
                };
                alert('t6');
                xhttp.open("GET", "checkEmail.php?tEmail="+ email, true);
                alert('t7');
                xhttp.send();
                alert('inner Box '+email);
                var y =
                alert('value of y');
                alert(y);

                if(sig == "false"){
                    return false;
                }
            }*/

        }

        if(pass == ""){
            //alert("pass");
            document.getElementById('err_teacherPass').innerHTML = "Password Must be Filled";
            return false;
        }
        else {
            if(pass.length < 6){
                //alert("name length");
                document.getElementById('err_teacherPass').innerHTML = "Password Must be at least 6 characters long";
                return false;
            }
            if(pzero == -1 && pone == -1 && pthree == -1 && pfour == -1 && pfive == -1 && psix == -1 &&
                pseven == -1 && peight == -1 && pnine == -1 && ptwo == -1){
                document.getElementById('err_teacherPass').innerHTML = "Password Must contain at least one number";
                return false;
            }
            if(pexc == -1 && pquest == -1){
                document.getElementById('err_teacherPass').innerHTML = "Password Must contain at least one Special Character";
                return false;
            }
            else{
                //alert("pass else lock");
                for(x = 0; x < pass.length; x++){
                    if(pass.charAt(x) >= 'a' && pass.charAt(x) <= 'z'){
                        lower = 1;
                        break;
                    }
                }
                for(x = 0; x < pass.length; x++){
                    if(pass.charAt(x) >= 'A' && pass.charAt(x) <= 'Z'){
                        upper = 1;
                        break;
                    }
                }
                if(lower == -1){
                    document.getElementById('err_teacherPass').innerHTML = "Password Must contain at least one Lowercase Character";
                    return false;
                }
                if(upper == -1){
                    document.getElementById('err_teacherPass').innerHTML = "Password Must contain at least one Uppercase Character";
                    return false;
                }
            }

        }

        return true;
    }
</script>

<form action="" method="post" id="teacherRegistration" onsubmit="return teacherRegister()">
    <table align="center">
        <tr>
            <td>
                <strong>Enter Name</strong>
            </td>
            <td>
                <input type="text" name="teacherName" id="teacherName" placeholder="Enter Name" size="35">
            </td>
            <td>
                <span id="err_teacherName"> <?php echo "" ;?> <?php echo $err_tName; ?> </span>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Enter Email</strong>
            </td>
            <td>
                <input type="text" name="teacherEmail" id="teacherEmail" placeholder="Enter Email Address" size="35">
            </td>
            <td>
                <span id="err_teacherEmail"> <?php echo $err_tEmail; ?> </span>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Enter Password</strong>
            </td>
            <td>
                <input type="password" name="teacherPass" id="teacherPass" placeholder="Enter Password" size="35">

            </td>
            <td>
                <span id="err_teacherPass"> <?php echo $err_tPass; ?> </span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="teacherRegistration" value="Sign Up">
            </td>
            <td></td>
        </tr>

    </table>
</form>
</body>
</html>