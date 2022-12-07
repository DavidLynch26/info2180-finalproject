'use strict';

window.onload = function(){
    var url; //Used for php file
    var method;
    var result;
    var params; //Used for php parameters in file
    var workSpace;
    var xhttp = new XMLHttpRequest();
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
                    var csfrToken = document.getElementById("csrfToken").value;
                    if(email !== "" && password !== ""){
                        url = "userLogin.php";
                        params = "email=" +email+ "&password=" +password+ "&csfrToken=" +csfrToken;
                        xhttp.open(method, url, false);
                        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200){
                                result = this.responseText.replace(/(<([^>]+)>)/gi, "").trim();
                                console.log(result);
                                if(result == "Successfull Login"){
                                    loadPage(workSpace, xhttp, url, method, params, result, init);
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
    document.getElementById("text-muted").style.visibility = "hidden";
    console.log(role);

    if(role == 0){
        params = "type=All Contacts";
        url = "dashboard.php";
    }else if(role == 1){
        url = "userList.php";
        params = "";
    }
    
    xhttp.open(method, url, false);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            result = this.responseText;
            leftSide.innerHTML = result;
        }
    }
    xhttp.send(params);
    var links = document.querySelectorAll("a");
    linkClicker(links, init);

    function linkClicker(links, init){
        console.log(links);
        for(let link of links){
            link.addEventListener('click', function(event){
                event.preventDefault();
                if(link.textContent == "Home"){
                    loadPage(workSpace, xhttp, url, method, "", result, init, role);
                }else if(link.textContent == "New Contact"){
                    loadSub(workSpace, xhttp, url, method, params, result, "newContactForm");
                }else if(link.textContent == "Users"){
                    loadSub(workSpace, xhttp, url, method, params, result, "userList");
                }else if(link.textContent == "Logout"){
                    if(confirm("Are you sure you would like to logout?")){
                        init();
                    }
                }
            });
        }
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
        var links = document.querySelectorAll("a");
    
        linkClicker(links, init);
    }

    if(role == 1){
        document.getElementById("newUserButton").addEventListener('click', function(){
            loadSub(workSpace, xhttp, url, method, params, result, "newUserForm", links);
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
                reg = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/;
                if(!password.match(reg)){
                    console.log("password");
                    pass = false;
                }
                
                if(pass == true){
                    url = "newUser.php";
                    params = "firstname=" +firstName+ "&lastname=" +lastName+ "&email=" +email+ "&password=" +password+ "&role=" +roleName+ "&title=" +title+ "&csfrToken=" +csfrToken;
                    xhttp.open(method, url, false);
                    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhttp.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            console.log(this.responseText);
                            loadPage(workSpace, xhttp, "userList.php", method, params, result, init, role);
                        }
                    }
                    xhttp.send(params);                   
                }
            });
        });
    }else{
        console.log(role);
        document.getElementById("newContactButton").addEventListener('click', function(){
            loadSub(workSpace, xhttp, url, method, params, result, "newContactForm");
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

                reg = /^[a-zA-Z]{1,}$/;
                if(!firstName.match(reg)){
                    console.log("firstName");
                    pass = false;

                }

                if(!lastName.match(reg)){
                    console.log("lastName");
                    pass = false;
                }

                if(!company.match(reg)){
                    console.log("company");
                    pass = false;
                }

                reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(!email.match(reg)){
                    console.log("email");
                    pass = false;
                }

                reg = /^((\(\d{3}\)))[ ]\d{3}[-]\d{4}$/;
                if(!tel.match(reg)){
                    console.log("tel");
                    pass = false;
                }


            });
        });
    }
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