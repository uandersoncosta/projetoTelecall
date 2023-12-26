function ajustaTelefone(v) {
  v.value = v.value.replace(/\D/g, "");
  //Adiciona parênteses no DDD
  v.value = v.value.replace(/^(\d\d)(\d)/g, "($1) $2");
  //Adiciona hífen no número do telefone
  v.value = v.value.replace(/(\d{4})(\d)/, "$1-$2");
}

function ajustaTelefone(v) {
  v.value = v.value.replace(/\D/g, "");
  //Adiciona parênteses no DDD
  v.value = v.value.replace(/^(\d\d)(\d)/g, "($1) $2");
  //Adiciona hífen no número do telefone
  v.value = v.value.replace(/(\d{4})(\d)/, "$1-$2");
}

function ajustaCEP(v) {
  v.value = v.value.replace(/\D/g, "");
  //Adiciona hífen no CEP
  v.value = v.value.replace(/(\d{5})(\d)/, "$1-$2");
}

function ajustaCpf(v) {
  v.value = v.value.replace(/\D/g, "");
  //Adiciona ponto após os três primeiros números
  v.value = v.value.replace(/^(\d{3})(\d)/, "$1.$2");
  //Adiciona ponto após os seis primeiros números
  v.value = v.value.replace(/(\d{3})(\d)/, "$1.$2");
  //Adiciona o hífen antes dos últimos 2 caracteres
  v.value = v.value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
}

let avatar = document.querySelector(".avatar");
let userName = document.querySelector(".userName");
let dropdownMenu = document.querySelector(".dropdown-menu");

const dropMenu = () => {
  dropdownMenu.classList.toggle("active");
};

avatar.addEventListener("click", dropMenu);
userName.addEventListener("click", dropMenu);
