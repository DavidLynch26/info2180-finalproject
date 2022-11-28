window.onload = function(){

    var url = ""; //Used for php file
    var params = ""; //Used for php parameters in file

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "verifyUser.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("menu").innerHTML = this.responseText;
            console.log(this.responseText);
        }
    }
    xhttp.send("username=admin@project2.com&password=password123"); //Change to recieved var from form
}