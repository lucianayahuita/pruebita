<template>
  <div>
    <nav>
      <div class="imgnav">
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
  <div>
    <!-- Formulario para registrar un nuevo docente (Comentado) -->
    <!--
    <form @submit.prevent="registrarDocente" enctype="multipart/form-data">
      <div>
        <label for="usuario">Usuario:</label>
        <input v-model="nuevoDocente.usuario" type="text" id="usuario" required />
      </div>
      <div>
        <label for="password">Contraseña:</label>
        <input v-model="nuevoDocente.password" type="password" id="password" required />
      </div>
      <div>
        <label for="nombre">Nombre:</label>
        <input v-model="nuevoDocente.nombre" type="text" id="nombre" required />
      </div>
      <div>
        <label for="ap_paterno">Apellido Paterno:</label>
        <input v-model="nuevoDocente.ap_paterno" type="text" id="ap_paterno" />
      </div>
      <div>
        <label for="ap_materno">Apellido Materno:</label>
        <input v-model="nuevoDocente.ap_materno" type="text" id="ap_materno" />
      </div>
      <div>
        <label for="correo">Correo:</label>
        <input v-model="nuevoDocente.correo" type="email" id="correo" />
      </div>
      <div>
        <label for="tipo_docente">Tipo de Docente:</label>
        <input v-model="nuevoDocente.tipo_docente" type="text" id="tipo_docente" />
      </div>
      <div>
        <label for="foto_docente">Foto del Docente:</label>
        <input type="file" @change="handleFileUpload" id="foto_docente" />
      </div>
      <button type="submit">Registrar Docente</button>
    </form>
    -->

    <!-- Mostrar docentes registrados -->
    <div>
      <div class="docentes-container">
        <div v-for="docente in docentes" :key="docente.id" class="docente-card">
          <!-- Imagen del docente -->
          <img :src="docente.imagen" alt="Foto del docente" class="docente-imagen" />

          <!-- Nombre completo del docente -->
          <h3>{{ docente.nombre }} {{ docente.descripcion }}</h3>

          <!-- Tipo de docente -->
          <p>Tipo: {{ docente.tipo_docente }}</p>

          <!-- Botón para enviar mensaje -->
          <a v-if="docente.email" :href="'mailto:' + docente.email">Message</a>
        </div>
      </div>

      <!-- Indicadores para simular un carrusel (opcional) -->
      <div class="indicators">
        <span v-for="n in 3" :key="n" :class="{ active: n === 1 }"></span>
      </div>
    </div>
  </div>
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
import axios from "axios";

export default {
  name: "Personal_Docente",
  data() {
    return {
      docentes: [],
      nuevoDocente: {
        usuario: "",
        password: "",
        nombre: "",
        ap_paterno: "",
        ap_materno: "",
        correo: "",
        tipo_docente: "",
        foto_docente: null,
      },
      darkMode: false, 
    };
  },
  mounted() {
    this.obtenerDocentes();
  },
  methods: {
    async obtenerDocentes() {
      try {
        const response = await axios.get(
          "http://localhost/proyecto/login/backend/API/docenteAPI.php"
        );
        if (response.data) {
          this.docentes = response.data;
        }
      } catch (error) {
        console.error("Error al obtener docentes:", error);
      }
    },
    handleFileUpload(event) {
      this.nuevoDocente.foto_docente = event.target.files[0];
    },
    async registrarDocente() {
      const formData = new FormData();
      Object.keys(this.nuevoDocente).forEach((key) => {
        formData.append(key, this.nuevoDocente[key]);
      });

      try {
        const response = await axios.post(
          "http://localhost/proyecto/login/backend/API/docenteAPI.php",
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        );
        if (response.data.message === "Docente registrado correctamente") {
          this.obtenerDocentes();
          alert("Docente registrado correctamente");
        }
      } catch (error) {
        console.error("Error al registrar el docente:", error);
      }
    },
    toggleDarkMode() {
      this.darkMode = !this.darkMode;  
      document.body.classList.toggle("dark-mode", this.darkMode);  
    },
  },
};
</script>
<style>
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

/*modo oscuro*/

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
/* Contenedor principal */
.docentes-container {
  display: flex;
  justify-content: center;
  align-items: stretch;
  gap: 20px;
  padding: 20px;
  flex-wrap: wrap;
  background: #f12711;  /* fallback for old browsers */
  background: #000428;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #004e92, #000428);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #004e92, #000428); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

/* Tarjetas de docentes */
.docente-card {
  background: rgba(255, 255, 255, 0.2); /* Fondo semitransparente */
  border: 2px solid rgba(255, 255, 255, 0.2); /* Borde semitransparente */
  border-radius: 15px; /* Bordes redondeados */
  text-align: center;
  padding: 15px; /* Espaciado interno */
  width: 250px;
  height: auto; /* Ajustar altura automáticamente */
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center; /* Centrar verticalmente los elementos */
  align-items: center;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4); /* Sombra más pronunciada */
  transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
}

.docente-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.6);
}

/* Imagen del docente */
.docente-imagen {
  width: 100px; /* Mantener tamaño original */
  height: 100px;
  border-radius: 50%;
  border: 3px solid #fff;
  object-fit: cover;
  margin-bottom: 8px; /* Reducir separación con el siguiente elemento */
}

/* Nombre del docente */
.docente-card h3 {
  color: #ffffff;
  font-size: 16px; /* Mantener tamaño original */
  font-weight: bold;
  margin: 6px 0; /* Reducir separación superior e inferior */
  text-align: center;
}

/* Tipo de docente */
.docente-card p {
  color: rgba(255, 255, 255, 0.8);
  font-size: 14px; /* Mantener tamaño original */
  margin: 4px 0; /* Reducir separación superior e inferior */
  text-align: center;
}

/* Botón de acción */
.docente-card a {
  display: inline-block;
  background: #007bff;
  color: white;
  text-decoration: none;
  padding: 8px 15px; /* Mantener tamaño original */
  border-radius: 20px;
  font-size: 14px; /* Mantener tamaño original */
  font-weight: bold;
  margin-top: 10px; /* Reducir separación con el texto anterior */
  transition: background-color 0.3s;
}

.docente-card a:hover {
  background: #0056b3;
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


