//botões
var btnTotal = document.getElementById('btnTotal');
var btnFin = document.getElementById('btnFinalizadas');
var btnAtuais = document.getElementById('btnAtuais');
var btnPExe = document.getElementById('btnPExecutar');

//tabelas
var tabTotal = document.getElementById('tabTotal');
var tabFin = document.getElementById('tabFinalizados');
var tabAtuais = document.getElementById('tabAtuais');
var tabPExe = document.getElementById('tabPExe');

//mostrar tabela de total de assistencias
btnTotal.onclick = function(){
    tabTotal.classList.remove('d-none');
    tabFin.classList.add('d-none');
    tabAtuais.classList.add('d-none');
    tabPExe.classList.add('d-none');
}

//mostrar tabela de assistencias finalizadas
btnFin.onclick = function(){
    tabTotal.classList.add('d-none');
    tabFin.classList.remove('d-none');
    tabAtuais.classList.add('d-none');
    tabPExe.classList.add('d-none');
}

//mostrar tabela de assistencias a serem executadas
btnAtuais.onclick = function(){
    tabTotal.classList.add('d-none');
    tabFin.classList.add('d-none');
    tabAtuais.classList.remove('d-none');
 
    tabPExe.classList.add('d-none');
}
//mostrar tabela de assistencias por executar
btnPExe.onclick = function(){
    tabTotal.classList.add('d-none');
    tabFin.classList.add('d-none');
    tabAtuais.classList.add('d-none');
    tabPExe.classList.remove('d-none');
}