'use strict';

window.onload = function(){
    var url; //Used for php file
    var method;
    var result;
    var params; //Used for php parameters in file
    var workSpace;
    var xhttp = new XMLHttpRequest();
    var workSpace = document.getElementById("gridBox");
    var loginButton;

    function init(){
        url = "userLogin.php";
        method = "POST";
        params = "";
        workSpace = document.getElementById("gridBox");
        xhttp.open(method, url, false);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                workSpace.innerHTML = this.responseText;
                loginButton = document.getElementById("loginButton").addEventListener('click', function(event){
                    event.preventDefault();
                    var username = document.getElementById("username").value.replace(/(<([^>]+)>)/gi, "").trim();
                    var password = document.getElementById("password").value.replace(/(<([^>]+)>)/gi, "").trim();
                    if(username !== "" && password !== ""){
                        url = "verifyUser.php";
                        method = "POST";
                        params = "username=" +username+ "&password="+password;
                        xhttp.open(method, url, false);
                        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200){
                                result = this.responseText.replace(/(<([^>]+)>)/gi, "").trim();
                                console.log(result);
                                if(result[1] == 1){
                                    if(result[3] == 0){
                                        console.log("member");
                                        loadPage(workSpace, xhttp, url, method, params, result, init, result[3]);
                                    }else if(result[3] == 1){
                                        console.log("admin");
                                        loadPage(workSpace, xhttp, url, method, params, result, init, result[3]);
                                    }
                                }else{
                                    // Add unsuccessful login prompt
                                }
                            }
                        }
                        xhttp.send(params);
                    }
                });
            }
        }
        xhttp.send(params);
    }
    init();
}

function loadPage(workSpace, xhttp, url, method, params, result, init, role){
    if(role == 0){
        url = "dashboard.php";
    }else if(role == 1){
        url = "userList.php";
    }
    method = "POST";
    params = "";
    xhttp.open(method, url, false);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            result = this.responseText;
            workSpace.innerHTML = result;
        }
    }
    xhttp.send(params);

    var links = document.querySelectorAll("a");
    links.forEach((link) =>{
        link.addEventListener('click', function(event){
            event.preventDefault();
            if(this.textContent == "Home"){
                
            }else if(this.textContent == "New Contact"){
        
            }else if(this.textContent == "Users"){
        
            }else if(this.textContent == "Logout"){
                if(confirm("Are You sure you would like to logout?")){
                    init();
                }else{
        
                }
            }
        });
    });
}