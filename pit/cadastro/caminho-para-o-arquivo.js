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
const form = document.querySelector('form');
        const passwordInput = document.querySelector('input[name="password"]');
        const confirmInput = document.querySelector('input[name="Confirmpassword"]');

        form.addEventListener('submit', function(event) {
            const password = passwordInput.value;
            const confirm = confirmInput.value;

            if (!isValidPassword(password)) {
                event.preventDefault();
                windows.alert('A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula e um número.');
            } else if (password !== confirm) {
                event.preventDefault();
                windows.alert('As senhas não coincidem.');
            }
        });

        function isValidPassword(password) {
            const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
            return regex.test(password);
        }