window.onload = function(){
    var url; //Used for php file
    var method;
    var result;
    var params; //Used for php parameters in file
    var xhttp = new XMLHttpRequest();
    var workSpace = document.getElementById("gridBox");
    var loginButton;
    
    function init(){
        url = "userLogin.php";
        method = "POST";
        params = "";
        result = document.getElementById("gridBox");
        xhttp.open(method, url, false);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                result.innerHTML = this.responseText;
            }
        }
        xhttp.send(params);
    }
    init();

    loginButton = document.getElementById("loginButton").addEventListener('click', function(event){
        event.preventDefault();
        var username = document.getElementById("username").value.trim().replace(/(<([^>]+)>)/gi, "");
        var password = document.getElementById("password").value.trim().replace(/(<([^>]+)>)/gi, "");
        if(username !== "" && password !== ""){
            url = "verifyUser.php";
            method = "POST";
            params = "username=" +username+ "&password="+password;
            xhttp.open(method, url);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    result = this.responseText;
                    // loadPage();
                }
            }
            xhttp.send(params);
        }
    });
}

function loadPage(){
    workSpace.innerHTML = "";

    var leftSide = document.createElement("section");
    leftSide.setAttribute("id", "sideBar");
    var rightSide = document.createElement("section");
    rightSide.setAttribute("id", "loader");
}