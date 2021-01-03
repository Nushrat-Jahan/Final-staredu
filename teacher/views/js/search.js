function something(text) {

    var xhttp = new XMLHttpRequest();
    alert(text);
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lec_List").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../views/lectureList.php?text="+ text, true);
    xhttp.send();
    //alert('value: ' +text.value);
}
function liveSearchLecture(c_id){

    alert(c_id.value);
    var v = document.getElementById('searchLectureText').value;
    //alert(v);
    something(v);

}