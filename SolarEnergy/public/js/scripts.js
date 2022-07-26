window.onload= function (){
    setTimeout(hideElement, 5000); //milliseconds until timeout//

    function hideElement() {
        var alert = document.getElementById("alerta");
        alert.classList.add("d-none");
      }
}