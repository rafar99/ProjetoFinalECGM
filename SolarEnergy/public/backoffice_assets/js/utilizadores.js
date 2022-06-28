//botões
var btnTodos = document.getElementById('btnTodos');
var btnAdTec = document.getElementById('btnAdTec');
var btnClientes = document.getElementById('btnClientes');

//tabelas
var tabTodos = document.getElementById('tabTodos');
var tabAdTec = document.getElementById('tabAdTec');
var tabClientes = document.getElementById('tabClientes');

//mostrar tabela de total de assistencias
btnTodos.onclick = function(){
    tabTodos.classList.remove('d-none');
    tabAdTec.classList.add('d-none');
    tabClientes.classList.add('d-none');
}

//mostrar tabela de assistencias finalizadas
btnAdTec.onclick = function(){
     tabTodos.classList.add('d-none');
     tabAdTec.classList.remove('d-none');
     tabClientes.classList.add('d-none');
}

//mostrar tabela de assistencias a serem executadas
btnClientes.onclick = function(){
     tabTodos.classList.add('d-none');
     tabAdTec.classList.add('d-none');
     tabClientes.classList.remove('d-none');
}