window.onload = function () {
    active_onload();
    
    setTimeout(hideElement, 5000); //milliseconds until timeout//

    function hideElement() {
        var alert = document.getElementById("alerta");
        alert.classList.add("d-none");
      }
};

function active_onload() {
    // Get the container element
    var navContainer = document.getElementById("aside-nav");

    // Get all buttons with class="btn" inside the container
    var menus = navContainer.getElementsByClassName("nav-link");
    // Loop through the buttons and add the active class to the current/clicked button
    if (window.location.href.indexOf("users") > -1) {
        menus[0].className = menus[0].className.replace("active", "");
        document.getElementById("nav-users").classList.add("active");

    } else if (window.location.href.indexOf("dashboard") > -1) {
        menus[0].className = menus[0].className.replace("active", "");
        document.getElementById("nav-dashboard").classList.add("active");

    } else if (window.location.href.indexOf("info") > -1) {
        menus[0].className = menus[0].className.replace("active", "");
        var DOMinfo = document.getElementById("nav-info");
        DOMinfo.classList.add("active");
        DOMinfo.parentElement.classList.add("menu-open");

        if (window.location.href.indexOf("inicio") > -1) {
            var DOMinicio = document.getElementById("nav-inicio");
            DOMinicio.querySelector('i').classList.replace("bi-circle", "bi-record-circle");
            DOMinicio.querySelector('i').classList.add("text-light");


        } else if (window.location.href.indexOf("empresa") > -1) {
            var DOMempresa = document.getElementById("nav-empresa");
            DOMempresa.querySelector('i').classList.replace("bi-circle", "bi-record-circle");
            DOMempresa.querySelector('i').classList.add("text-light");


        } else if (window.location.href.indexOf("nossosprojetos") > -1) {
            var DOMassistencia = document.getElementById("nav-nossosprojetos");
            DOMassistencia.querySelector('i').classList.replace("bi-circle", "bi-record-circle");
            DOMassistencia.querySelector('i').classList.add("text-light");


        } else if (window.location.href.indexOf("contactos") > -1) {
            var DOMcontactos = document.getElementById("nav-contactos");
            DOMcontactos.querySelector('i').classList.replace("bi-circle", "bi-record-circle");
            DOMcontactos.querySelector('i').classList.add("text-light");
        }
    } else if (window.location.href.indexOf("formcontactos") > -1) {
        menus[0].className = menus[0].className.replace("active", "");
        document.getElementById("nav-formcontactos").classList.add("active");

    }
    else if (window.location.href.indexOf("tipopedido") > -1) {
        menus[0].className = menus[0].className.replace("active", "");
        document.getElementById("nav-tipopedido").classList.add("active");

    }
    else if (window.location.href.indexOf("tipoutilizador") > -1) {
        menus[0].className = menus[0].className.replace("active", "");
        document.getElementById("nav-tipoutilizador").classList.add("active");

    }
    else if (window.location.href.indexOf("tipofuncionario") > -1) {
        menus[0].className = menus[0].className.replace("active", "");
        document.getElementById("nav-tipofuncionario").classList.add("active");

    }
    else if (window.location.href.indexOf("tipocliente") > -1) {
        menus[0].className = menus[0].className.replace("active", "");
        document.getElementById("nav-tipocliente").classList.add("active");

    }
    else if (window.location.href.indexOf("tipopainel") > -1) {
        menus[0].className = menus[0].className.replace("active", "");
        document.getElementById("nav-tipopainel").classList.add("active");

    }
    else if (window.location.href.indexOf("tipoestado") > -1) {
        menus[0].className = menus[0].className.replace("active", "");
        document.getElementById("nav-tipoestado").classList.add("active");

    }
}
