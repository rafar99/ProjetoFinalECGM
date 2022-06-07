window.onload = function() {active_onload()};

function active_onload(){
// Get the container element
var navContainer = document.getElementById("aside-nav");

// Get all buttons with class="btn" inside the container
var menus = navContainer.getElementsByClassName("nav-link");
// Loop through the buttons and add the active class to the current/clicked button
if(window.location.href.indexOf("users")>-1){
    menus[0].className = menus[0].className.replace("active", "");
    document.getElementById("nav-users").classList.add("active");

} else if(window.location.href.indexOf("dashboard")>-1){
    menus[0].className = menus[0].className.replace("active", "");
    document.getElementById("nav-dashboard").classList.add("active");

} else if(window.location.href.indexOf("info")>-1) {
    menus[0].className = menus[0].className.replace("active", "");
    var DOMinfo = document.getElementById("nav-info");
    DOMinfo.classList.add("active");
    DOMinfo.parentElement.classList.add("menu-open");
    
    if(window.location.href.indexOf("inicio")>-1){
        var DOMinicio = document.getElementById("nav-inicio");
        DOMinicio.querySelector('i').classList.replace("bi-circle", "bi-record-circle");
        DOMinicio.querySelector('i').classList.add("text-light");


    } else if(window.location.href.indexOf("empresa")>-1){
        var DOMempresa = document.getElementById("nav-empresa");
        DOMempresa.querySelector('i').classList.replace("bi-circle", "bi-record-circle");
        DOMempresa.querySelector('i').classList.add("text-light");


    } else if(window.location.href.indexOf("assistencia")>-1){
        var DOMassistencia = document.getElementById("nav-assistencia");
        DOMassistencia.querySelector('i').classList.replace("bi-circle", "bi-record-circle");
        DOMassistencia.querySelector('i').classList.add("text-light");


    }else if(window.location.href.indexOf("contactos")>-1){
        var DOMcontactos = document.getElementById("nav-contactos");
        DOMcontactos.querySelector('i').classList.replace("bi-circle", "bi-record-circle");
        DOMcontactos.querySelector('i').classList.add("text-light");
    }
}
}