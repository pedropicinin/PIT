const btnCad = document.getElementById("btnCad");
btnCad.disabled = true;

btnCad.style.backgroundColor = "red";


// Máscara para CPF (xxx.xxx.xxx-xx)
const cpfInput = document.querySelector('input[name="cpf"]');
cpfInput.addEventListener('blur', function () {
  let value = this.value.replace(/\D/g, '');
  value = value.replace(/^(\d{3})(\d)/g, '$1.$2');
  value = value.replace(/^(\d{3})\.(\d{3})(\d)/g, '$1.$2.$3');
  value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/g, '$1.$2.$3-$4');
  this.value = value.substring(0, 14);
});

// Máscara para número de telefone ((xx) xxxxx-xxxx)
const phoneInput = document.querySelector('input[name="number"]');
phoneInput.addEventListener('blur', function () {
  let value = this.value.replace(/\D/g, '');
  value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
  value = value.replace(/(\d)(\d{4})$/, '$1-$2');
  this.value = value.substring(0, 14);
});


function Verifica(){
  const passwordInput = document.querySelector('input[name="password"]');
let value = passwordInput.value;
const regexUpperCase = /[A-Z]/;
  const regexLowerCase = /[a.z]/;
  const regexNumber = /[0-9]/;

  console.log(value);
  console.log(regexUpperCase.test(value));
  console.log(regexLowerCase.test(value));
  console.log(regexNumber.test(value));

  if (regexUpperCase.test(value) || regexLowerCase.test(value) || regexNumber.test(value) && value.length > 6) {
btnCad.disabled = false;
btnCad.style.backgroundColor = "GREEN";
  }
}




