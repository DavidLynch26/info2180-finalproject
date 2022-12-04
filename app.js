'use strict';

window.onload = function(){
    var url; //Used for php file
    var method = "POST";
    var result;
    var params; //Used for php parameters in file
    var xhttp = new XMLHttpRequest();
    var workSpace = document.getElementById("gridBox");
    var loginButton;

    function init(){
        url = "userLoginForm.php";
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
                        url = "verifyLogin.php";
                        params = "username=" +username+ "&password="+password;
                        xhttp.open(method, url, false);
                        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200){
                                result = this.responseText.replace(/(<([^>]+)>)/gi, "").trim();
                                if(result[1] == 1){
                                    if(result[3] == 0){
                                        loadPage(workSpace, xhttp, url, method, params, result, init, result[3]);
                                    }else if(result[3] == 1){
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

    if(role == 1){
        document.getElementById("newUserButton").addEventListener('click', function(){
            loadSub(workSpace, xhttp, url, method, params, result, "newUserForm");
            document.getElementById("saveButton").addEventListener('click', function(){

                var reg;
                var pass = true;
                var firstName = document.querySelector("form [for='firstName'] input").value;
                var lastName = document.querySelector("form [for='lastName'] input").value
                var email = document.querySelector("form [for='email'] input").value;
                var password = document.querySelector("form [for='password'] input").value;

                reg = /^[a-zA-Z]{1,}$/;
                if(!firstName.match(reg)){
                    console.log("firstName");
                    pass = false;

                }
                if(!lastName.match(reg)){
                    console.log("lastName");
                    pass = false;
                }
                reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(!email.match(reg)){
                    console.log("email");
                    pass = false;
                }
                reg = /^[a-zA-Z0-9_.-]{8,}$/;
                if(!password.match(reg)){
                    console.log("password");
                    pass = false;
                }
                
                if(pass == true){
                    url = "newUser.php";
                    params = "";
                    xhttp.open(method, url, false);
                    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhttp.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            result = this.responseText;
                            console.log(result);
                        }
                    }
                    xhttp.send(params);                   
                }
            });
        });
    }

    var links = document.querySelectorAll("a");
    links.forEach((link) =>{
        link.addEventListener('click', function(event){
            event.preventDefault();
            if(this.textContent == "Home"){
                loadSub(workSpace, xhttp, url, method, params, result, "dashboard");
            }else if(this.textContent == "New Contact"){
                loadSub(workSpace, xhttp, url, method, params, result, "newContact");
            }else if(this.textContent == "Users"){
                loadSub(workSpace, xhttp, url, method, params, result, "userList");
            }else if(this.textContent == "Logout"){
                if(confirm("Are You sure you would like to logout?")){
                    init();
                }else{
        
                }
            }
        });
    });
}

function loadSub(workSpace, xhttp, url, method, params, result, page){
    url = page + ".php";
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
}

function openContacts(event, url, method, params){
    xhttp.open(method, url, false);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            result = this.responseText;
            workSpace.innerHTML = result;
        }
    }
    xhttp.send('type=' + params);
}