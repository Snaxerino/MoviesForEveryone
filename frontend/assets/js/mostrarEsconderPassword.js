const mostrarEsconderPassword = () => {
    let password = document.getElementById("password");
    let icon = document.getElementById("password-icon");
    if (password.type === "password") {
      password.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      password.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }

const mostrarEsconderPassword2 = () => {
  let password2 = document.getElementById("password2");
  let icon = document.getElementById("password-icon");
  if (password2.type === "password") {
    password2.type = "text";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  } else {
    password2.type = "password";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}