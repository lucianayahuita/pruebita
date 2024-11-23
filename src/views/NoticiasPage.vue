<template>
  <div>
    <nav>
      <div class="imgnav">
        <!-- Uso de la ruta relativa correcta para Vue.js -->
        <img src="@/assets/CPO - H2.png" alt="Logo" height="100" width="140" />
      </div>
      <router-link to="/LoginPage" class="menu">Inicio</router-link>
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
    <!-- Contenedor de publicaciones -->
    <div class="container-post">
      <div class="posts-vertical">
        <div v-for="post in posts" :key="post.id_noticia" class="post">
          <div class="post-image">
            <img :src="`http://localhost/proyecto/login/backend/API/${post.imagen_noticia}`" alt="Imagen noticia" />
          </div>
          <div class="post-content">
            <div class="post-header">
              <h2>{{ post.titulo_noticia }}</h2>
            </div>
            <p>{{ post.contenido_noticia }}</p>
            <div class="post-footer">
              <button @click="deletePost(post.id_noticia)" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Formulario de Nueva Noticia -->
      <div v-if="isAuthorizedUser" class="new-post-form">
        <h2>Ingresar Nueva Noticia</h2>
        <form @submit.prevent="submitNews" class="form-container" enctype="multipart/form-data">
          <div class="form-group">
            <label for="titulo_noticia">Título:</label>
            <input v-model="newPost.titulo_noticia" type="text" id="titulo_noticia" class="form-control" required />
          </div>

          <div class="form-group">
            <label for="contenido_noticia">Contenido:</label>
            <textarea v-model="newPost.contenido_noticia" id="contenido_noticia" rows="5" class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label for="imagen_noticia">Foto:</label>
            <input type="file" ref="foto" id="imagen_noticia" class="form-control" />
          </div>

          <button type="submit" class="btn btn-primary" :disabled="isSubmitting">
            {{ isSubmitting ? 'Publicando...' : 'Publicar Noticia' }}
          </button>
        </form>
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
import Swal from "sweetalert2";

export default {
  name: "NoticiasPage",
  data() {
    return {
      isAuthorizedUser: true,
      posts: [],
      newPost: {
        titulo_noticia: "",
        contenido_noticia: "",
      },
      isSubmitting: false,
      darkMode: false, 
    };
  },
  mounted() {
    this.fetchPosts();
  },
  methods: {
    async fetchPosts() {
      try {
        const response = await axios.get("http://localhost/proyecto/login/backend/API/noticiaAPI.php");
        if (response.status === 200) {
          this.posts = response.data;
        }
      } catch (error) {
        console.error("Error al cargar las noticias:", error);
      }
    },
    async submitNews() {
      if (this.isSubmitting) return;

      this.isSubmitting = true;

      const formData = new FormData();
      formData.append("titulo_noticia", this.newPost.titulo_noticia);
      formData.append("contenido_noticia", this.newPost.contenido_noticia);
      if (this.$refs.foto.files.length > 0) {
        formData.append("imagen_noticia", this.$refs.foto.files[0]);
      }

      try {
        const response = await axios.post(
          "http://localhost/proyecto/login/backend/API/noticiaAPI.php",
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        );

        if (response.data.message === "Datos guardados correctamente") {
          Swal.fire({
            icon: "success",
            title: "¡Noticia Publicada!",
            text: "La noticia fue añadida con éxito.",
            confirmButtonText: "Aceptar",
          });
          this.fetchPosts();
          this.newPost = { titulo_noticia: "", contenido_noticia: "" };
          this.$refs.foto.value = null;
        } else {
          console.error("Error en la API:", response.data.message);
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Hubo un problema al publicar la noticia.",
            confirmButtonText: "Aceptar",
          });
        }
      } catch (error) {
        console.error("Error al añadir la noticia:", error);
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "No se pudo conectar con el servidor.",
          confirmButtonText: "Aceptar",
        });
      } finally {
        this.isSubmitting = false;
      }
    },
    async deletePost(id_noticia) {
      try {
        const response = await axios.delete(
          "http://localhost/proyecto/login/backend/API/noticiaAPI.php",
          {
            data: { id_noticia },
          }
        );

        if (response.data.message === "noticia eliminada exitosamente") {
          Swal.fire({
            icon: "success",
            title: "¡Eliminada!",
            text: "La noticia fue eliminada con éxito.",
            confirmButtonText: "Aceptar",
          });
          this.fetchPosts();
        } else {
          console.error("Error al eliminar la noticia:", response.data.message);
        }
      } catch (error) {
        console.error("Error al intentar eliminar la noticia:", error);
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "No se pudo eliminar la noticia.",
          confirmButtonText: "Aceptar",
        });
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
body {
  background-color: #F7C74D;
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.container-post {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.posts-vertical {
  display: flex;
  flex-direction: column; /* Las tarjetas se apilan verticalmente */
  gap: 20px; /* Espaciado entre las tarjetas */
}


.post {
  background-color: #E08F13;
  border-radius: 10px;
  border: 2px solid black; /* Añadir un borde de 2px de color oscuro */
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Sombra del card */
  overflow: hidden;
  display: flex;
  flex-direction: row; /* Alinea los elementos de la tarjeta horizontalmente */
  min-width: 350px; /* Ancho mínimo de cada tarjeta */
  transition: transform 0.3s, box-shadow 0.3s;
}

.post:hover {
  transform: translateY(-5px);
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
}

.post-image {
  width: 400px; /* Ancho fijo para la sección de la imagen */
  height: 400px; /* Altura fija para la sección de la imagen */
  overflow: hidden; /* Asegura que la imagen no se desborde */
  border-top-left-radius: 10px; /* Bordes redondeados superiores */
  border-bottom-left-radius: 10px; /* Bordes redondeados inferiores */
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); /* Sombra más prominente en el contenedor */
  background-color: white; /* Fondo del div para evitar transparencias si no hay imagen */
  display: flex; /* Para alinear el contenido si es necesario */
  justify-content: center; /* Centrar horizontalmente */
  align-items: center; /* Centrar verticalmente */
}

.post-image img {
  width: 100%; /* La imagen ocupa todo el ancho del contenedor */
  height: 100%; /* La imagen ocupa toda la altura del contenedor */
  object-fit: cover; /* Ajusta la imagen para que se recorte proporcionalmente */
  display: block; /* Asegura que no haya espacio extra */
}


.post-content {
  padding: 15px;
  display: flex;
  flex-direction: column;
  font-family: Arial;
  color:#333;
  justify-content: space-between;
  width: 100%;
}

.post-header {
  margin-bottom: 10px;
}

.post-header h2 {
  margin: 0;
  font-size: 33px;
  margin-bottom: 10px; /* Reducir espacio debajo del título */
  font-family:Arial, Helvetica, sans-serif;
  color: black;
}

.post-content p {
  font-size: 16px; /* Tamaño de fuente */
  color: white; /* Color del texto */
  line-height: 1.5; /* Espaciado entre líneas para mejor legibilidad */
  text-align: justify; /* Justifica el contenido */
  margin: 10px 0; /* Margen superior e inferior */
}


.post-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.post-footer .post-date {
  font-size: 0.8em;
  color: #999;
}

.btn-danger {
  padding: 15px 20px;
  background-color: #e74c3c;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.btn-danger:hover {
  background-color: #c0392b;
}

.new-post-form {
  margin-top: 20px;
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group {
  margin-bottom: 15px;
}

label {
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
textarea,
input[type="file"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

input:focus,
textarea:focus {
  outline: none;
  border-color: #4286f4;
}

.btn-primary {
  background-color: #4286f4;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.btn-primary:hover {
  background-color: #3578e5;
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