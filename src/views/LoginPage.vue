<template>
  <div>
    <nav>
      <div class="imgnav">
        <!-- Uso de la ruta relativa correcta para Vue.js -->
        <img src="@/assets/CPO - H2.png" alt="Logo" height="100" width="140" />
      </div>
      <router-link to="/" class="menu">Inicio</router-link>
      <router-link to="/ActividadesPage" class="menu">Actividades</router-link>
      <router-link to="/FormacionPage" class="menu">Postgrado</router-link>
      <router-link to="/NoticiasPage" class="menu">Noticias</router-link>
      <router-link to="/RepositorioPage" class="menu">Publicaciones</router-link>
      <router-link to="/sociedadCientifica" class="menu">Sociedad Científica</router-link>
      <router-link to="/Personal_Docente" class="menu">Personal Docente</router-link>
      <router-link to="/LoginPage" class="menu">Login</router-link>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
      <i class="bi bi-brightness-high-fill" id="toggleDark" @click="toggleDarkMode"></i>
    </nav>
  </div>
  <body>
    <div class="container">
    <div class="blueBg">
      <div class="box signin">
        <h2>¿Eres docente?</h2>
        <button @click="toggleForm('signin')" class="signinBtn">Si</button>
      </div>
      <div class="box signup">
        <h2>¿Eres director de carrera?</h2>
        <button @click="toggleForm('signup')" class="signupBtn">Si</button>
      </div>
    </div>
    <div :class="['formBx', { active: isSignupActive }]">
      <div class="form signinForm">
        <form @submit.prevent="handleDocenteLogin">
        <h3>Docente</h3>
        <input type="text" placeholder="Usuario" v-model="docenteUser" name="usuario" />
        <input type="password" placeholder="Contraseña" v-model="docentePassword" name="password" />
        <input type="submit" value="Ingresar" />
        </form>
      </div>
      <div class="form signupForm">
        <form @submit.prevent="handleDirectorLogin">
        <h3>Director de Carrera</h3>
        <input type="text" placeholder="Usuario" v-model="directorUser" name="usuario" />
        <input type="password" placeholder="Contraseña" v-model="directorPassword" name="password" />
        <input type="submit" value="Ingresar" />
      </form>
</div>

    </div>
  </div>
  </body>
  <footer class="custom-footer">
      <div class="footer-content">
        <!-- Logo y redes sociales -->
        <div class="footer-column">
          <img src="@/assets/CPO - H2.png" alt="Logo UCB" class="footer-logo" />
          <div class="social-icons">
            <a href="https://www.instagram.com/ucb/" target="_blank" aria-label="Instagram">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.facebook.com/ucb" target="_blank" aria-label="Facebook">
              <i class="fab fa-facebook"></i>
            </a>
          </div>
          <p>Copyright © 2024 Universidad Católica Boliviana Derechos reservados.</p>
        </div>

        <!-- Contacto -->
        <div class="footer-column">
          <h3>Contáctenos</h3>
          <p>AV. 14 de Septiembre N° 4807 esquina, La Paz</p>
          <p><a href="https://api.whatsapp.com/send/?phone=59175851671&text&type=phone_number&app_absent=0">+591 75851671</a></p>
        </div>

        <!-- Cuenta -->
        <div class="footer-column">
          <h3>Cuenta</h3>
          <ul>
            <li><a href="/login">Iniciar sesión</a></li>
            <li><a href="/app-ios">Aplicación iOS</a></li>
            <li><a href="/app-android">Aplicación para Android</a></li>
          </ul>
        </div>

        <!-- Ingeniería de Sistemas -->
        <div class="footer-column">
          <h3>Ciencias Políticas</h3>
          <ul>
            <li><a href="https://www.instagram.com/cienciaspoliticas.ucb?igsh=dTQyMjFsNXllMnhy">Instagram</a></li>
            <li><a href="https://www.facebook.com/profile.php?id=100070409821200&mibextid=LQQJ4d">Facebook</a></li>
          </ul>
        </div>

        <!-- Interactivo -->
        <div class="footer-column">
          <h3>Interactivo</h3>
          <ul>
            <li><a href="https://lpz.ucb.edu.bo/mapa-ucb-lp/">Mapa del campus</a></li>
            <li><a href="https://lpz.ucb.edu.bo/wp-content/uploads/2023/12/CPO-2024.pdf">Malla curricular</a></li>
          </ul>
        </div>
      </div>
    </footer>
</template>

<script>
import Swal from "sweetalert2";
export default {
  name: "LoginPage",
  data() {
    return {
      isSignupActive: false,
      docenteUser: "",
      docentePassword: "",
      directorUser: "",
      directorPassword: "",
      darkMode: false, // Lista inicial con datos manuales
    };
   
  },
  methods: {
    toggleForm(formType) {
      this.isSignupActive = formType === "signup";
    },
    toggleDarkMode() {
      this.darkMode = !this.darkMode;  
      document.body.classList.toggle("dark-mode", this.darkMode);  
    },
    async handleDocenteLogin() {
  if (!this.docenteUser || !this.docentePassword) {
    Swal.fire({
      icon: "warning",
      title: "Advertencia",
      text: "Por favor, complete todos los campos",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  try {
    if (this.docenteUser === "mdiez" && this.docentePassword === "mdiez") {
      // Guardamos en localStorage solo si las credenciales son correctas
      localStorage.setItem("isAuthorizedUser", "mdiez");

      Swal.fire({
        icon: "success",
        title: "¡Inicio de sesión exitoso!",
        text: "Bienvenido al sistema como Docente",
        confirmButtonText: "Aceptar",
      }).then(() => {
        this.$router.push("/NoticiasPage");  // Redirigir a la página de Noticias
      });
    } else {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Usuario o contraseña incorrectos",
        confirmButtonText: "Intentar de nuevo",
      });
      localStorage.removeItem('isAuthorizedUser');  // Eliminar el valor si las credenciales son incorrectas
    }
  } catch (error) {
    console.error("Error en la solicitud:", error);
    Swal.fire({
      icon: "error",
      title: "Error del servidor",
      text: "No se pudo conectar con el servidor. Intente más tarde.",
      confirmButtonText: "Aceptar",
    });
  }
},

  // Método para el inicio de sesión del Director
  async handleDirectorLogin() {
  if (this.directorUser === "carlos" && this.directorPassword === "carlos") {
    try {
      // Guardamos en localStorage solo si las credenciales son correctas
      localStorage.setItem("isAuthorizedUser", "carlos");

      Swal.fire({
        icon: "success",
        title: "¡Inicio de sesión exitoso!",
        text: "Bienvenido al sistema como Director",
        confirmButtonText: "Aceptar",
      }).then(() => {
        this.$router.push("/NoticiasPage");  // Redirigir a la página de Noticias
      });
    } catch (error) {
      console.error("Error en la solicitud:", error);
      Swal.fire({
        icon: "error",
        title: "Error del servidor",
        text: "No se pudo conectar con el servidor. Intente más tarde.",
        confirmButtonText: "Aceptar",
      });
    }
  } else {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "Usuario o contraseña incorrectos",
      confirmButtonText: "Intentar de nuevo",
    });
    localStorage.removeItem('isAuthorizedUser');  // Eliminar el valor si las credenciales son incorrectas
  }
},
  }
};
</script>

<style scoped>
nav {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  padding: 15px 0;
  background-color: #ffffff;
}
nav a {
  color: #030000;
  text-decoration: none;
  margin: 0 15px;
  padding: 10px 20px;
  border-radius: 5px;
  transition: background-color 0.3s ease, color 0.3s ease;
  font-weight: bold;
}
nav a:hover {
  background-color: #ffcc00;
  color: #003366;
}
.imgnav {
  display: flex;
  justify-content: flex-start;
} 
body
{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #c02425; /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #c02425, #f0cb35); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #c02425, #f0cb35); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    transition: 0.5s;
}
body.active
{
    background: #cc0001;

}
/*para el modo oscuro*/
#toggleDark {
  font-size: 2rem;  
  cursor: pointer; 
  color: #000;  
}
body.dark-mode {
  background-color: #121212 !important; 
  color: #ffffff; 
}

body.dark-mode nav {
  background-color: #1a1a1a; /* Fondo del nav en modo oscuro */
}

body.dark-mode nav a {
  color: #ffffff; /* Color de los enlaces en el nav en modo oscuro */
}

body.dark-mode .split-section {
  background-color: #333333; /* Fondo de las secciones en modo oscuro */
  color: white;
}
body.dark-mode .new-post-form {
  background-color: #333333; 
}
body.dark-mode .new-post-form .form-container{
  background-color: #333333; 
}
body.dark-mode label{
  color:white;
}
body.dark-mode .footer-column h3,
body.dark-mode .footer-column ul li a {
  color: #ffffff; /* Color de los textos en el footer en modo oscuro */
}

/* Otros ajustes para elementos interactivos */
body.dark-mode #toggleDark {
  color: #ffd700; /* Cambiar el color del ícono cuando se está en modo oscuro */
}
.container
{
    position: relative;
    width: 800px;
    height: 500px;
    margin: 20px;
}
@keyframes borderRadiusAnimation {
  0% {
    border-radius: 25%; /* Bordes cuadrados al inicio */
  }
  50% {
    border-radius: 50%; /* Bordes redondeados a la mitad de la animación */
  }
  100% {
    border-radius: 50%; /* Bordes moderadamente redondeados al final */
  }
}
.blueBg
{
    position: absolute;
    top: 40px;
    width: 100%;
    height: 420px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 5px 45px rgba(0,0,0,0.15);
    animation: borderRadiusAnimation 3s infinite;
}
.blueBg .box
{
    position: relative;
    width: 50%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.blueBg .box h2
{
    color: #fff;
    font-size: 1.2em;
    font-weight: 500;
    margin-bottom: 10px;
}
.blueBg .box button
{
    cursor: pointer;
    padding: 10px 20px;
    background: #fff;
    color: #333;
    font-size: 16px;
    font-weight: 500;
    border: none;
}
@keyframes borderAnimation {
  0% {
    border: 2px solid #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
  }
  25% {
    border: 2px solid transparent;
    box-shadow: 0 0 10px rgba(255, 0, 0, 1), 0 0 20px rgba(255, 0, 0, 0.5);
  }
  50% {
    border: 2px solid #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
  }
  75% {
    border: 2px solid transparent;
    box-shadow: 0 0 10px rgba(255, 0, 0, 1), 0 0 20px rgba(255, 0, 0, 0.5);
  }
  100% {
    border: 2px solid #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
  }
}
.formBx
{
    position: absolute;
    top: 0;
    left: 0;
    width: 50%;
    height: 100%;
    background: #fff;
    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 5px 45px rgba(0,0,0,0.25);
    animation: borderAnimation 3s infinite; /* Añade la animación */
    transition: 0.5s ease-in-out;
    overflow: hidden;
}
.formBx.active
{
    left: 50%;
}

.formBx .form
{
    position: absolute;
    left: 0;
    width: 100%;
    padding: 50px;
    transition: 0.5s;
}
.formBx .signinForm
{
    transition-delay: 0.25s;
}
.formBx.active .signinForm
{
    left: -100%;
    transition-delay: 0s;
}
.formBx .signupForm
{
    left: 100%;
    transition-delay: 0s;
}
.formBx.active .signupForm
{
    left: 0;
}
.formBx .form form
{
    width: 100%;
    display: flex;
    flex-direction: column;
}
.formBx .form form h3
{
    font-size: 1.5em;
    color: #333;
    margin-bottom: 20px;
    font-weight: 500;
}
.formBx .form form input
{
    width: 90%;
    margin-bottom: 20px;
    padding: 10px;
    outline: none;
    font-size: 16px;
    border: 1px solid #333;
}
.formBx .form form input[type="submit"]
{
    background: #0078b7;
    border: none;
    color: #fff;
    max-width: 200px;
    cursor: pointer;
}
.formBx.active .signupForm input[type="submit"]
{
    background: #cc0001;
}
.formBx .form form .forgot
{
    color: #333;
}

@media (max-width: 991px)
{
    .container
    {
        max-width: 400px;
        height: 650px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .container .blueBg
    {
        top: 0;
        height: 100%;
    }
    .formBx
    {
        width: 100%;
        height: 500px;
        top: 0;
        box-shadow: none;
    }
    .blueBg .box
    {
        position: absolute;
        width: 100%;
        height: 150px;
        bottom: 0;
    }
    .box.signin
    {
        top: 0;
    }
    .formBx.active
    {
        left: 0;
        top: 150px;
    }
}
.footer-content {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  flex-wrap: wrap;
  gap: 20px;
}

.footer-column {
  flex: 1;
  min-width: 200px;
}

.footer-column h3 {
  font-size: 1.2rem;
  color: #000;
  margin-bottom: 10px;
  font-weight: bold;
}

.footer-column ul {
  list-style: none;
  padding: 0;
}

.footer-column ul li {
  margin: 5px 0;
}

.footer-column ul li a {
  text-decoration: none;
  color: #666;
  transition: color 0.3s;
}

.footer-column ul li a:hover {
  color: #003366;
}

.footer-logo {
  width: 150px;
  margin-bottom: 15px;
}

.social-icons {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-bottom: 10px;
}

.social-icons a {
  font-size: 1.5rem;
  color: #666;
  transition: color 0.3s;
}

.social-icons a:hover {
  color: #003366;
}

.footer-column p {
  font-size: 0.9rem;
  color: #666;
}

@media (max-width: 768px) {
  .footer-content {
    flex-direction: column;
    align-items: center;
  }

  .footer-column {
    text-align: center;
  }

  .social-icons {
    justify-content: center;
  }
}
</style>