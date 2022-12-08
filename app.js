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
        document.getElementById("text-muted").style.visibility = "visible";
        url = "userLoginForm.php";
        workSpace = document.getElementById("gridBox");
        xhttp.open(method, url, false);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                workSpace.innerHTML = this.responseText;
                loginButton = document.getElementById("loginButton").addEventListener('click', function(event){
                    event.preventDefault();
                    var email = document.getElementById("email").value.replace(/(<([^>]+)>)/gi, "").trim();
                    var password = document.getElementById("password").value.replace(/(<([^>]+)>)/gi, "").trim();
                    var csfrToken = document.getElementById("csrfToken").value;
                    if(email !== "" && password !== ""){
                        url = "userLogin.php";
                        params = "email=" +email+ "&password=" +password+ "&csfrToken=" +csfrToken;
                        xhttp.open(method, url, false);
                        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200){
                                result = this.responseText.replace(/(<([^>]+)>)/gi, "").trim();
                                if(result[1] == 1){
                                    document.getElementById("text-muted").style.visibility = "hidden";
                                    if(result[3] == 0){
                                        loadPage(workSpace, xhttp, "dashboard.php", method, params, result, init, result[3]);
                                    }else if(result[3] == 1){
                                        loadPage(workSpace, xhttp, "userList.php", method, params, result, init, result[3]);
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
    if(url == "dashboard.php"){
        params = "type=All Contacts";
    }
    
    xhttp.open(method, url, false);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            result = this.responseText;
            workSpace.innerHTML = result;

            var links = document.querySelectorAll("a");
            linkClicker(links, init, role);
            if(url == "dashboard.php"){
                document.getElementById("newContactButton").addEventListener('click', function(event){
                    loadPage(workSpace, xhttp, "newContactForm.php", method, params, result, init, role);
                });
            }else if(url == "userList.php"){
                document.getElementById("newUserButton").addEventListener('click', function(event){
                    loadPage(workSpace, xhttp, "newUserForm.php", method, params, result, init, role);
                });
            }
        }
    }
    xhttp.send(params);

    if(url == "newUserForm.php"){
        document.getElementById("saveButton").addEventListener('click', function(){
            var reg;
            var pass = true;
            var firstName = document.querySelector("form [for='firstName'] input").value.replace(/(<([^>]+)>)/gi, "").trim();
            var lastName = document.querySelector("form [for='lastName'] input").value.replace(/(<([^>]+)>)/gi, "").trim();
            var email = document.querySelector("form [for='email'] input").value.replace(/(<([^>]+)>)/gi, "").trim();
            var password = document.querySelector("form [for='password'] input").value.replace(/(<([^>]+)>)/gi, "").trim();
            var roleName = document.getElementById("roleSelector").value.replace(/(<([^>]+)>)/gi, "").trim();
            var title = document.getElementById("titleSelector").value.replace(/(<([^>]+)>)/gi, "").trim();
            var csfrToken = document.getElementById("csfrToken").value;

            reg = /^[a-zA-Z]{1,}$/;
            if(!firstName.match(reg)){
                pass = false;
            }
            if(!lastName.match(reg)){
                pass = false;
            }
            reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(!email.match(reg)){
                pass = false;
            }
            reg = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/;
            if(!password.match(reg)){
                pass = false;
            }
            
            if(pass == true){
                url = "newUser.php";
                params = "firstname=" +firstName+ "&lastname=" +lastName+ "&email=" +email+ "&password=" +password+ "&role=" +roleName+ "&title=" +title+ "&csfrToken=" +csfrToken;
                xhttp.open(method, url, false);
                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        loadPage(workSpace, xhttp, "userList.php", method, params, result, init, role);
                    }
                }
                xhttp.send(params);                  
            }
        });
    }else if(url == "newContactForm.php"){
        document.getElementById("saveButton").addEventListener('click', function(event){
            var reg;
            var pass = true;
            var firstName = document.querySelector("form [for='firstName'] input").value.replace(/(<([^>]+)>)/gi, "").trim();
            var lastName = document.querySelector("form [for='lastName'] input").value.replace(/(<([^>]+)>)/gi, "").trim();
            var company = document.querySelector("form [for='company'] input").value.replace(/(<([^>]+)>)/gi, "").trim();
            var email = document.querySelector("form [for='email'] input").value.replace(/(<([^>]+)>)/gi, "").trim();
            var tel = document.querySelector("form [for='tel'] input").value.replace(/(<([^>]+)>)/gi, "").trim();
            var type = document.getElementById("typeSelector").value.replace(/(<([^>]+)>)/gi, "").trim();
            var title = document.getElementById("titleSelector").value.replace(/(<([^>]+)>)/gi, "").trim();     
            var assignedTo = document.getElementById("assignedSelector").value.replace(/(<([^>]+)>)/gi, "").trim();
            var csfrToken = document.getElementById("csrfToken").value.replace(/(<([^>]+)>)/gi, "").trim();

            reg = /^[a-zA-Z]{1,}$/;
            if(!firstName.match(reg)){
                console.log("a");
                pass = false;
            }

            if(!lastName.match(reg)){
                console.log("s");
                pass = false;
            }

            if(!company.match(reg)){
                console.log("d");
                pass = false;
            }

            reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(!email.match(reg)){
                console.log("f");
                pass = false;
            }

            reg = /^((\(\d{3}\)))[ ]\d{3}[-]\d{4}$/;
            if(!tel.match(reg)){
                console.log("g");
                pass = false;
            }

            if(pass == true){     
                url = "newContact.php";          
                params = "firstname=" +firstName+ "&lastname=" +lastName+ "&company=" +company+ "&email=" +email+ "&tel=" +tel+ "&type=" +type+ "&title=" +title+ "&assignedTo=" +assignedTo+ "&csfrToken=" +csfrToken;
                xhttp.open(method, url, false);
                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        result = this.responseText;
                        console.log(result);
                        if(role == 0){
                            url = "dashboard.php";
                            params = "type=All Contacts";
                        }else if(role == 1){
                            url = "userList.php";
                            params = "";
                        }     
                        loadPage(workSpace, xhttp, url, method, params, result, init, role);
                    }
                }
                xhttp.send(params);
            }
        });
    }

    function linkClicker(links, init, role){
        for(let link of links){
            link.addEventListener('click', function(event){
                event.preventDefault();
                if(link.textContent == "Home"){
                    if(role == 1){
                        url = "userList.php";
                    }else if(role == 0){
                        url = "dashboard.php";
                    }
                    loadPage(workSpace, xhttp, url, method, params, result, init, role);
                }else if(link.textContent == "New Contact"){
                    loadPage(workSpace, xhttp, "newContactForm.php", method, params, result, init, role);
                }else if(link.textContent == "Users"){
                    loadPage(workSpace, xhttp, "userList.php", method, params, result, init, role);
                }else if(link.textContent == "Logout"){
                    if(confirm("Are you sure you would like to logout?")){
                        init();
                    }
                }
            });
        }
    }

    function openContacts(event, xhttp, url, method, params){
        var buttons = document.getElementsByClassName("tablinks");
        var choice;
        for(let button of buttons){
            if(button.textContent == "All Contacts"){
                choice = 1;
            }else if(button.textContent == "Sales Lead" || button.textContent == "Support"){
                params = "type=" +button.textContent;
                choice = 2;
            }else if(button.textContent == "Assigned to me"){
                choice = 3;
            }
        }

        xhttp.open(method, url, false);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                result = this.responseText;
                workSpace.innerHTML = result;
            }
        }
        xhttp.send('type=' +params+ "&choice=" +choice);
    }
}