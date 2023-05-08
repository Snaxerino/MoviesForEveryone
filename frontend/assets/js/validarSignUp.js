// const form = document.querySelector('#signupForm');
// const nome = document.querySelector('#name');
// const email = document.querySelector('#email');
// const password = document.querySelector('#password');
// const password2 = document.querySelector('#password2');

// form.addEventListener('submit', (event) => {
//   // Verifica se o nome está vazio
//   if (nome.value === '') {
//     nome.classList.add('erro');
//     document.querySelector('#nomeErro').textContent = 'Coloque um nome!';
//     event.preventDefault();
//   } else {
//     nome.classList.remove('erro');
//     document.querySelector('#nomeErro').textContent = '';
//   }

//   // Verifica se o email é válido
//   if (!isValidEmail(email.value)) {
//     email.classList.add('erro');
//     document.querySelector('#emailErro').textContent = 'Coloque um email válido!';
//     event.preventDefault();
//   } else {
//     email.classList.remove('erro');
//     document.querySelector('#emailErro').textContent = '';
//   }

//   // Verifica se a password tem pelo menos 8 caracteres
//   if (password.value.length < 8) {
//     password.classList.add('erro');
//     document.querySelector('#passwordErro').textContent = 'A Password deve ter pelo menos 8 caracteres';
//     event.preventDefault();
//   } else {
//     password.classList.remove('erro');
//     document.querySelector('#passwordErro').textContent = '';
//   }

//   // Verifica se as duas senhas são iguais
//   if (password2.value !== password.value) {
//     password2.classList.add('erro');
//     document.querySelector('#password2Erro').textContent = 'As passwords devem ser iguais';
//     event.preventDefault();
//   } else {
//     password2.classList.remove('erro');
//     document.querySelector('#password2Erro').textContent = '';
//   }
// });

// // Função de validação de email
// function isValidEmail(email) {
//   const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//   return emailRegex.test(email);
// }
