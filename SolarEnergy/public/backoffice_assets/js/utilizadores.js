//botões
var btnTodos = document.getElementById('btnTodos');
var btnAdmin = document.getElementById('btnAdmin');
var btnTecnicos = document.getElementById('btnTecnicos');
var btnClientes = document.getElementById('btnClientes');

//tabelas
var tabTodos = document.getElementById('tabTodos');
var tabAdmin = document.getElementById('tabAdmin');
var tabTecnicos = document.getElementById('tabTecnicos');
var tabClientes = document.getElementById('tabClientes');

//mostrar tabela de total de utilizador
btnTodos.onclick = function(){
     tabTodos.classList.remove('d-none');
     tabAdmin.classList.add('d-none');
     tabTecnicos.classList.add('d-none'); 
     tabClientes.classList.add('d-none');
}

//mostrar tabela de administradores
btnAdmin.onclick = function(){
     tabTodos.classList.add('d-none');
     tabAdmin.classList.remove('d-none');
     tabTecnicos.classList.add('d-none');
     tabClientes.classList.add('d-none');
}

//mostrar tabela de total tecnicos
btnTecnicos.onclick = function(){
     tabTodos.classList.add('d-none');
     tabAdmin.classList.add('d-none');
     tabTecnicos.classList.remove('d-none');
     tabClientes.classList.add('d-none');
}

//mostrar tabela de total Clientes
btnClientes.onclick = function(){
     tabTodos.classList.add('d-none');
     tabAdmin.classList.add('d-none');
     tabTecnicos.classList.add('d-none');
     tabClientes.classList.remove('d-none');
}