const form = document.querySelector(".arealogin form");
const nomeLogin = document.querySelector(".login #nomeLogin");
const senhaLogin = document.querySelector(".login #senhaLogin");
const btnEntrarLogin = document.querySelector(".btnEntrarLogin");

const nomeCadastro = document.querySelector(".cadastro #nome");
const cpfCadastro = document.querySelector(".cadastro #cpf");
const dateCadastro = document.querySelector(".cadastro #dtNascimento");
const sexoCadastro = document.querySelector(".cadastro #sexo");
const telCadastro = document.querySelector(".cadastro #telFixo");
const celCadastro = document.querySelector(".cadastro #telCelular");
const cepCadastro = document.querySelector(".cadastro #cep");
const endrCadastro = document.querySelector(".cadastro #endereco");
const loginCadastro = document.querySelector(".cadastro #loginCadastro");
const nomeMaternoCadastro = document.querySelector(".cadastro #nomeMaterno");
const senhaCadastro = document.querySelector(".cadastro #senhaCadastro");
const senhaConfirmarCadastro = document.querySelector(
  ".cadastro #senhaConfirmarCadastro"
);
const btnCadastrar = document.querySelector(".formBotoes--Cadastrar");

const erroCadastro = document.querySelector(".cadastro .erro");
const erroCpf = document.querySelector(".cadastro .erroCpf");

// FORMULARIO CADASTRO

function ajustaCpf(v) {
  v.value = v.value.replace(/\D/g, "");
  //Adiciona ponto após os três primeiros números
  v.value = v.value.replace(/^(\d{3})(\d)/, "$1.$2");
  //Adiciona ponto após os seis primeiros números
  v.value = v.value.replace(/(\d{3})(\d)/, "$1.$2");
  //Adiciona o hífen antes dos últimos 2 caracteres
  v.value = v.value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
}

function validarCPF(cpf) {
  const cpfNumerico = cpf.replace(/\D/g, "");

  if (cpfNumerico.length !== 11) {
    return false;
  }

  const cpfArray = Array.from(cpfNumerico, Number);

  if (cpfArray.every((digito) => digito === cpfArray[0])) {
    return false;
  }

  let soma = 0;

  for (let i = 0; i < 9; i++) {
    soma += cpfArray[i] * (10 - i);
  }

  let resto = (soma * 10) % 11;

  if (resto === 10 || resto === 11) {
    resto = 0;
  }

  if (resto !== cpfArray[9]) {
    return false;
  }

  soma = 0;

  for (let i = 0; i < 10; i++) {
    soma += cpfArray[i] * (11 - i);
  }

  resto = (soma * 10) % 11;

  if (resto === 10 || resto === 11) {
    resto = 0;
  }

  if (resto !== cpfArray[10]) {
    return false;
  }

  return true;
}

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

function dateValidation(date) {
  const hoje = new Date();
  const dnasc = new Date(date);

  let idade = hoje.getFullYear() - dnasc.getFullYear();
  const mes = hoje.getMonth() - dnasc.getMonth();
  if (mes < 0 || (mes === 0) & (hoje.getDate() < dnasc.getDate())) {
    idade--;
  }

  return idade;
}

loginCadastro.addEventListener("keypress", (e) => {
  const keyCode = e.keyCode ? e.keyCode : e.which;

  if (keyCode > 47 && keyCode < 58) {
    e.preventDefault();
  }
});

senhaCadastro.addEventListener("keypress", (e) => {
  const keyCode = e.keyCode ? e.keyCode : e.which;

  if (keyCode > 47 && keyCode < 58) {
    e.preventDefault();
  }
});

senhaConfirmarCadastro.addEventListener("keypress", (e) => {
  const keyCode = e.keyCode ? e.keyCode : e.which;

  if (keyCode > 47 && keyCode < 58) {
    e.preventDefault();
  }
});

// const inputLoginVerification = (e) => {
//   if (nomeLogin.value == "") {
//     nomeLogin.classList.add("required");
//     document.querySelector(".erroPLogin").innerText = "Precisa digitar o login";
//   }
//   if (senhaLogin.value == "") {
//     senhaLogin.classList.add("required");
//     document.querySelector(".erroPSenha").innerText = "Precisa digitar a senha";
//   }

//   setTimeout(() => {
//     nomeLogin.classList.remove("required");
//     senhaLogin.classList.remove("required");

//     document.querySelector(".erroPLogin").innerText = "";
//     document.querySelector(".erroPSenha").innerText = "";
//   }, 4500);
// };

const inputCadastroVerification = () => {
  if (nomeCadastro.value == "") {
    nomeCadastro.classList.add("required");
    erroCadastro.innerText = "Precisa digitar o nome";
  } else if (nomeCadastro.value.length < 15) {
    nomeCadastro.classList.add("required");
    erroCadastro.innerText = "Precisa ter no minimo 15 digitos";
  }
  if (cpfCadastro.value == "") {
    cpfCadastro.classList.add("required");
    erroCpf.innerText = "Precisa digitar o CPF";
  } else if (cpfCadastro.value.length < 14) {
    cpfCadastro.classList.add("required");
    erroCpf.innerText = "CFP inválido";
  } else if (validarCPF(cpfCadastro.value) != true) {
    cpfCadastro.classList.add("required");
    erroCpf.innerText = "CFP inválido";
  }
  if (dateCadastro.value == "") {
    dateCadastro.classList.add("required");
    document.querySelector(".erroDate").innerText =
      "Precisa da Data de Nascimento";
  } else if (dateValidation(dateCadastro.value) < 18) {
    dateCadastro.classList.add("required");
    document.querySelector(".erroDate").innerText = "Você precisa ter 18 anos.";
  } else if (dateValidation(dateCadastro.value) > 90) {
    dateCadastro.classList.add("required");
    document.querySelector(".erroDate").innerText =
      "Data de Nascimento inválida.";
  }
  if (sexoCadastro.value == "") {
    sexoCadastro.classList.add("required");
    document.querySelector(".erroSexo").innerText =
      "Precisa selecionar o sexo.";
  }
  if (telCadastro.value == "") {
    telCadastro.classList.add("required");
    document.querySelector(".erroTelefone").innerText = "Precisa do Telefone.";
  } else if (telCadastro.value.length < 14) {
    telCadastro.classList.add("required");
    document.querySelector(".erroTelefone").innerText =
      "Número de telefone inválido.";
  }
  if (celCadastro.value == "") {
    celCadastro.classList.add("required");
    document.querySelector(".erroCelular").innerText = "Precisa do Celular.";
  } else if (celCadastro.value.length < 15) {
    celCadastro.classList.add("required");
    document.querySelector(".erroCelular").innerText =
      "Número de telefone inválido.";
  }
  if (cepCadastro.value == "") {
    cepCadastro.classList.add("required");
    document.querySelector(".erroCep").innerText = "Precisa digitar o CEP.";
  } else if (cepCadastro.value.length < 9) {
    cepCadastro.classList.add("required");
    document.querySelector(".erroCep").innerText = "CEP inválido.";
  }
  if (endrCadastro.value == "") {
    endrCadastro.classList.add("required");
    document.querySelector(".erroEndereco").innerText =
      "Precisa digitar o Endereço.";
  } else if (endrCadastro.value.length < 15) {
    endrCadastro.classList.add("required");
    document.querySelector(".erroEndereco").innerText = "Endereço inválido.";
  }
  if (loginCadastro.value == "") {
    loginCadastro.classList.add("required");
    document.querySelector(".erroLogin").innerText = "Precisa digitar o Login.";
  } else if (loginCadastro.value.length < 6) {
    loginCadastro.classList.add("required");
    document.querySelector(".erroLogin").innerText =
      "O login precisa ter 6 digitos.";
  }
  if (nomeMaternoCadastro.value == "") {
    nomeMaternoCadastro.classList.add("required");
    document.querySelector(".erroNomematerno").innerText =
      "Precisa digitar o Nome da mãe";
  } else if (nomeMaternoCadastro.value.length < 15) {
    nomeMaternoCadastro.classList.add("required");
    document.querySelector(".erroNomematerno").innerText =
      "Precisa ter no minimo 15 digitos";
  }
  if (senhaCadastro.value == "") {
    senhaCadastro.classList.add("required");
    document.querySelector(".erroSenha").innerText = "Precisa digitar a senha";
  } else if (senhaCadastro.value.length < 8) {
    document.querySelector(".erroSenha").innerText =
      "A senha precisa ter 8 digitos";
    senhaCadastro.classList.add("required");
    senhaConfirmarCadastro.classList.add("required");
  } else if (senhaCadastro.value !== senhaConfirmarCadastro.value) {
    document.querySelector(".erroSenha").innerText = "As senhas não combinam";
    senhaCadastro.classList.add("required");
    senhaConfirmarCadastro.classList.add("required");
  }
  if (
    senhaConfirmarCadastro.value == "" ||
    senhaConfirmarCadastro.value.length < 8
  ) {
    senhaConfirmarCadastro.classList.add("required");
  }

  setTimeout(() => {
    nomeCadastro.classList.remove("required");
    cpfCadastro.classList.remove("required");
    dateCadastro.classList.remove("required");
    telCadastro.classList.remove("required");
    celCadastro.classList.remove("required");
    cepCadastro.classList.remove("required");
    endrCadastro.classList.remove("required");
    loginCadastro.classList.remove("required");
    nomeMaternoCadastro.classList.remove("required");
    senhaCadastro.classList.remove("required");
    senhaConfirmarCadastro.classList.remove("required");

    erroCadastro.innerText = "";
    document.querySelector(".erroCpf").innerText = "";
    document.querySelector(".erroDate").innerText = "";
    document.querySelector(".erroSexo").innerText = "";
    document.querySelector(".erroTelefone").innerText = "";
    document.querySelector(".erroCelular").innerText = "";
    document.querySelector(".erroCep").innerText = "";
    document.querySelector(".erroEndereco").innerText = "";
    document.querySelector(".erroLogin").innerText = "";
    document.querySelector(".erroNomematerno").innerText = "";
    document.querySelector(".erroSenha").innerText = "";
  }, 4500);
};

// btnEntrarLogin.addEventListener("click", inputLoginVerification);
