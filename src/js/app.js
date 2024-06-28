document.addEventListener('DOMContentLoaded', function(){
  eventListeners();
  botonArriba();
});

function botonArriba() {
  const btnUp = document.getElementById("boton-up");
  btnUp.addEventListener("click", scrollUp);
}

function scrollUp() {
  var currentScroll = document.documentElement.scrollTop  || document.body.scrollTop;

  if (currentScroll > 0) {
    window.requestAnimationFrame(scrollUp);
    window.scrollTo(0, currentScroll - (currentScroll / 10));
  }
}

window.onscroll = function() {
  buttonUp = document.getElementById("boton-up");
  var scroll = document.documentElement.scrollTop;
  if ( scroll > 150) {
    buttonUp.style.transform = 'scale(1)';
    buttonUp.style.transition = ".5s";
  } else if (scroll < 100) {
    buttonUp.style.transform = 'scale(0)';
    buttonUp.style.transition = ".5s";
  }
}

function eventListeners() {
  const mobileMenu = document.getElementById("menu");
  mobileMenu.addEventListener("click", navegacionResp);
  
  const eye = document.querySelector(".fa-eye");
  eye.addEventListener("click", verPass);
}

function navegacionResp() {
  const navegacion = document.querySelector('.navegacion__link');

  navegacion.classList.toggle('mostrar');
}

function verPass() {
  const pass = document.getElementById('password');
  const eye = document.querySelector(".fa-eye");
  const eyeslash = document.querySelector(".fa-eye-slash");

  if (pass.type === "password") {
    pass.type = "text";
    eye.classList.remove('fa-eye');
    eye.classList.add('fa-eye-slash');
  } else {
    pass.type = "password";
    eyeslash.classList.remove('fa-eye-slash');
    eyeslash.classList.add('fa-eye');
  }
}