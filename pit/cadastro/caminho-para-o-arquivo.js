// Máscara para CPF (xxx.xxx.xxx-xx)
const cpfInput = document.querySelector('input[name="cpf"]');
cpfInput.addEventListener('input', function () {
  let value = this.value.replace(/\D/g, '');
  value = value.replace(/^(\d{3})(\d)/g, '$1.$2');
  value = value.replace(/^(\d{3})\.(\d{3})(\d)/g, '$1.$2.$3');
  value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/g, '$1.$2.$3-$4');
  this.value = value.substring(0, 14);
});

// Máscara para número de telefone ((xx) xxxxx-xxxx)
const phoneInput = document.querySelector('input[name="number"]');
phoneInput.addEventListener('input', function () {
  let value = this.value.replace(/\D/g, '');
  value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
  value = value.replace(/(\d)(\d{4})$/, '$1-$2');
  this.value = value.substring(0, 14);
});

// Validação e máscara para senha (6 caracteres, letras maiúsculas, minúsculas e números)
const passwordInput = document.querySelector('input[name="password"]');
passwordInput.addEventListener('input', function () {
  let value = this.value;
  const regexUpperCase = /[A-Z]/;
  const regexLowerCase = /[a-z]/;
  const regexNumber = /[0-9]/;
  
  if (value.length > 6) {
    this.value = value.substring(0, 6);
  }
  
  if (!regexUpperCase.test(value) || !regexLowerCase.test(value) || !regexNumber.test(value)) {
    alert("A senha deve conter pelo menos 1 letra maiúscula, 1 letra minúscula e 1 número.");
  }
});



