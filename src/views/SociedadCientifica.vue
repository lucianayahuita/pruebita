<template>
  <div>
    <!-- Barra de navegación -->
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
    <header class="carousel">
      <div class="carousel-slide" :style="{ backgroundImage: 'url(' + images[currentSlide] + ')' }">
        <h1 class="header-title">Sociedad Científica</h1>
      </div>
    </header>

    <!-- Contenido principal -->
    <main>
      <div class="logout-button-container">
      <button v-if="isAuthorizedUser" @click="logout" class="btn btn-secondary">Cerrar sesión</button>
      </div>
      <div>
        <section class="activities-section">
        <h2>SOBRE NOSOTROS</h2>
        <div class="card-grid">
          <!-- Tarjeta 1 -->
          <div class="card">
            <img src="@/assets/Sociedad3.jpg" alt="Taller de Investigación" class="card-image" />
            <div class="card-content">
              <h3>¿Qué es la Sociedad Científica?</h3>
              <p>
                La Sociedad Científica de la carrera de Ciencias Políticas de la Universidad Católica Boliviana (UCB) suele ser un espacio de encuentro y colaboración entre estudiantes y docentes enfocado en la investigación, la reflexión crítica y la divulgación del conocimiento. Estas sociedades científicas tienen como misión fomentar el pensamiento analítico, desarrollar proyectos de investigación en torno a los temas relevantes de la política, la sociedad y el desarrollo, y promover actividades académicas como conferencias, seminarios y publicaciones científicas.
                tiene como principales objetivos fomentar la investigación en temas políticos, organizar eventos académicos como conferencias y debates, y promover la publicación de trabajos científicos. Además, busca construir redes de colaboración con otras instituciones y formar líderes con pensamiento crítico y habilidades de análisis.
              </p>
            </div>
          </div>

          <!-- Tarjeta 2 -->
          <div class="card">
            <img src="@/assets/chasqui2.jpg" alt="Seminario de Inteligencia Artificial" class="card-image" />
            <div class="card-content">
              <h3>¿Qué son las Chasquipostas? </h3>
              <p>
                Las Chaskipostas de la carrera de Ciencias Políticas (CPO) son publicaciones que destacan por su compromiso con la difusión ágil y accesible de conocimientos. Inspirados en los antiguos mensajeros andinos, estas entregas buscan transmitir ideas, análisis e investigaciones de relevancia política y social, conectando a la comunidad académica con los temas más relevantes del entorno local, nacional e internacional. A través de estos espacios, la CPO fortalece su labor de reflexión crítica y contribución intelectual.<br>
                Estas publicaciones no solo buscan informar, sino también involucrar a estudiantes, docentes y a la sociedad en general en debates de relevancia contemporánea. Los Chaskipostas abordan temas que van desde la coyuntura política nacional hasta tendencias internacionales, siempre con un enfoque analítico y propositivo. Además, son un espacio donde se refleja el talento y el compromiso de la comunidad de Ciencias Políticas de la UCB, consolidando su rol como referente académico y contribuyendo al desarrollo de una ciudadanía más informada y participativa. Con cada edición, se reafirma el compromiso de la carrera con la producción y divulgación de conocimiento accesible y significativo.
              </p>
            </div>
          </div>

          <!-- Tarjeta 3 -->
          <div class="card">
            <img src="@/assets/Nopolitica.jpg" alt="Proyecto Estudiantil" class="card-image" />
            <div class="card-content">
              <h3>¿Qué es "Esto No Es Política"?</h3>
              <p>
                “Esto No Es Política” es el podcast oficial de la carrera de Ciencias Políticas (CPO) de la UCB, disponible en Spotify. Este espacio busca acercar los grandes temas políticos y sociales a una audiencia diversa, combinando análisis profundo con un tono fresco y accesible. El nombre del podcast refleja su intención de romper con los estereotipos y explorar los aspectos humanos, culturales y cotidianos que también forman parte del universo político, pero que a menudo quedan fuera de la discusión tradicional. Con cada episodio, se invita a expertos, docentes y estudiantes a compartir sus perspectivas, generando un diálogo dinámico y enriquecedor.
                Más allá de ser solo un espacio académico, “Esto No Es Política” es una plataforma que conecta a la comunidad universitaria con el público en general, fomentando la reflexión crítica sobre temas relevantes y actuales. Desde debates sobre democracia y derechos humanos hasta conversaciones sobre movimientos sociales y cultura política, el podcast se convierte en un vehículo para construir ciudadanía y fortalecer el vínculo entre la universidad y la sociedad. A través de este proyecto, la CPO reafirma su compromiso con la innovación educativa y la divulgación de ideas, haciendo del conocimiento algo cercano, útil y transformador.
              </p>
            </div>
          </div>
        </div>
      </section>
        <!-- Hero Section -->
    <section class="hero">
      <div class="hero-overlay">
        <h1 class="hero-title">Se parte de <span class="highlight">La Sociedad Científica</span> ,aquí tienes tu lugar.</h1>
        <p class="hero-description">
          Con nosotros garantizas una formación que te prepara para el mercado laboral y para la vida,
          fomentando el pensamiento analítico, el desarrollo de proyectos de investigación en torno a los temas relevantes en la política, la sociedad y el desarrollo, y promoviendo actividades académicas como conferencias, seminarios y publicaciones científicas.
        </p>
        <a href="https://drive.google.com/drive/folders/1DDsgGy8a_4UqjUPg3IQFVLJYXEF-zTi_?fbclid=PAZXh0bgNhZW0CMTEAAabMdGp9-J299RrIhc-Q-knDYFLlbXi6O_f48QawNU_npnwCa_91kUVnm0k_aem_uWdtipIPe6EyJmAMLw-qiw"
          target="_blank" 
          class="button">
          POSTULATE AQUÍ
        </a>
      </div>
    </section>

    <section class="buttons">
        <a href="https://www.facebook.com/scecpo?mibextid=LQQJ4d" class="fa fa-facebook" target="_blank" aria-label="Facebook"></a>
        <a href="https://www.instagram.com/sociedadcientificacpo?igsh=MTRpc2hod2luejB2cA==" class="fa fa-instagram" target="_blank" aria-label="Twitter"></a>
        <a href="https://open.spotify.com/show/0jmsF7xCezZcFZu4v9ASDH?si=qwlLk-mtQcaFpNnGzxo_7w" class="fa fa-spotify" target="_blank" aria-label="Google Plus"></a>
        <a href="https://youtube.com/@sociedadcientificacpo8517?si=bVkQU9dEr9UgxLVB" class="fa fa-youtube" target="_blank" aria-label="YouTube"></a>
        <a href="https://x.com/sociedadcpo?t=9roPpXrAlp16Mi1EJQkDbw&s=08 " class="fa fa-twitter" target="_blank" aria-label="LinkedIn"></a>
      </section>
    <!-- Sección de las Chasquis -->
    <section id="chasquis">
        <h2>CHASQUIPOSTAS</h2>
        <div class="chasqui-list">
          <div v-for="chaski in chaskis" :key="chaski.id_chaskiposta" class="chasqui-item">
            <h3>{{ chaski.titulo_chaski }}</h3>
            <p>Número: {{ chaski.numero }}</p>
            <a :href="chaski.chaskiposta" target="_blank" class="btn-download">Ver Chaskiposta</a>
            <button v-if="isAuthorizedUser" @click="deleteChaski(chaski.id_chaskiposta)" class="btn-delete">Eliminar</button>
          </div>
        </div>
      </section>


  </div>
      <!-- Formulario de Chasquiposta -->
      <div v-if="isAuthorizedUser">
      <section class="formularios">
        <div class="titulosFormularios">
          <h3>Formulario de registro Chasqui</h3>
        </div>
        <form @submit.prevent="submitChaski">
          <label for="numero">Número de la Chaskiposta</label>
          <input type="number" v-model="newChaski.numero" required />

          <label for="titulo_chasqui">Título de la Chasqui</label>
          <input type="text" v-model="newChaski.titulo_chaski" required />

          <label for="chaskiposta">Archivo de la Chasqui</label>
          <input type="file" ref="chaskiposta" @change="handleFileChange" required />

          <input type="submit" value="Registrar" />
        </form>
      </section>
    </div>

    <!-- Si no está autorizado, mostrar un mensaje -->
    <div v-else>
      <p>No tienes acceso para ver el formulario de registro.</p>
    </div>
    </main>

    <!-- Footer -->
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

        <!-- Sociedad Científica -->
        <div class="footer-column">
          <h3>Ciencias Políticas</h3>
          <ul>
            <li><a href="https://www.instagram.com/cienciaspoliticas.ucb">Instagram</a></li>
            <li><a href="https://www.facebook.com/profile.php?id=100070409821200">Facebook</a></li>
          </ul>
        </div>

        <!-- Recursos Interactivos -->
        <div class="footer-column">
          <h3>Interactivo</h3>
          <ul>
            <li><a href="https://lpz.ucb.edu.bo/mapa-ucb-lp/">Mapa del campus</a></li>
            <li><a href="https://lpz.ucb.edu.bo/wp-content/uploads/2023/12/CPO-2024.pdf">Malla curricular</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
export default {
  name: "SociedadCientifica",
  data() {
    return {
      // Datos del formulario de Chaskiposta
      isAuthorizedUser: false,  // Estado para verificar si el usuario está autorizado
      newChaski: {
        numero: '',
        titulo_chaski: '',
        chaskiposta: null,
      },
      chaskis: [],  // Lista de chaskipostas
      darkMode: false,  // Estado del modo oscuro
      // Datos para el carrusel
      images: [
        require('@/assets/alumnos.jpg'),
        require('@/assets/imagenIndex.webp'),
        require('@/assets/SP4.webp'),
      ],
      currentSlide: 0,  // Control del slide actual del carrusel
      carouselInterval: null,  // Intervalo del carrusel
    };
  },
  methods: {
    // Maneja el cambio de archivo en el formulario
    handleFileChange(event) {
      this.newChaski.chaskiposta = event.target.files[0];
    },
    //para checar autorizaciones
    checkAuthorization() {
      const isAuthorized = localStorage.getItem("isAuthorizedUser");

      if (isAuthorized === "carlos" || isAuthorized === "mdiez") {
        this.isAuthorizedUser = true;  // Solo si el valor en localStorage es "carlos" o "mdiez"
      } else {
        this.isAuthorizedUser = false; // Si no, no está autorizado
      }
    },
    async logout() {
      // Aquí no hace falta hacer una llamada al backend si solo queremos esconder el formulario
      localStorage.removeItem('isAuthorizedUser');
      this.isAuthorizedUser = false;  // Oculta el formulario
      Swal.fire({
            icon: "success",
            title: "¡Se ha cerrado sesion!",
            text: "Se ha cerrado de sesión exitosamente.",
            confirmButtonText: "Aceptar",
          });
      this.$router.push("/LoginPage");  // Redirige a la página de login
    },
    // Envia los datos del formulario de Chaskiposta al backend
    async submitChaski() {
      if (!this.newChaski.chaskiposta) {
        alert("Por favor, selecciona un archivo para la Chaskiposta.");
        return;
      }

      const formData = new FormData();
      formData.append("titulo_chaski", this.newChaski.titulo_chaski);
      formData.append("numero", this.newChaski.numero);
      formData.append("chaskiposta", this.newChaski.chaskiposta);

      try {
        const response = await axios.post(
          "http://localhost/proyecto/login/backend/API/chaskiAPI.php", // Cambia la URL según tu configuración
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        );

        if (response.data.message === "Chaskiposta registrada correctamente") {
          alert("Chaskiposta registrada con éxito");
          this.fetchChaskis(); // Recarga las chaskipostas
          this.newChaski = { numero: '', titulo_chaski: '', chaskiposta: null }; // Limpia el formulario
        } else {
          console.error("Error al registrar la chaskiposta:", response.data.message);
        }
      } catch (error) {
        console.error("Error al enviar el formulario:", error);
      }
    },
    // Obtiene las chaskipostas del backend
    async fetchChaskis() {
      try {
        const response = await axios.get("http://localhost/proyecto/login/backend/API/chaskiAPI.php");
        if (Array.isArray(response.data)) {
          this.chaskis = response.data;
        } else {
          console.error("Datos inesperados:", response.data);
        }
      } catch (error) {
        console.error("Error al obtener las Chaskipostas:", error);
      }
    },
    // Elimina una chaskiposta de la lista
    deleteChaski(id) {
      this.chaskis = this.chaskis.filter((chaski) => chaski.id_chaskiposta !== id);
      alert("Chaskiposta eliminada con éxito");
    },
    // Alterna entre modo claro y oscuro
    toggleDarkMode() {
      this.darkMode = !this.darkMode;
      document.body.classList.toggle("dark-mode", this.darkMode);
    },
    // Inicia el carrusel de imágenes
    startCarousel() {
      if (this.images.length === 0) return;
      this.carouselInterval = setInterval(() => {
        this.currentSlide = (this.currentSlide + 1) % this.images.length;
      }, 5000);
    },
  },
  created() {
    this.fetchChaskis();
  },
  mounted() {
    this.startCarousel();  // Inicia el carrusel cuando el componente se monta
    this.checkAuthorization();  // Verificar si el usuario está autorizado al montar el componente
  },
  beforeUnmount() {
    if (this.carouselInterval) {
      clearInterval(this.carouselInterval); // Limpia el intervalo del carrusel cuando el componente se destruye
    }
  },
};
</script>
<style>
.logout-button-container {
  display: flex;
  justify-content: center;  /* Centra el contenido horizontalmente */
  align-items: center;      /* Centra el contenido verticalmente */
}
.logout-button-container button {
  align-items: center;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  background-color: #e74c3c;
  color: white;
  border: none;
  border-radius: 5px;
  transition: background-color 0.3s;
}

.logout-button-container button:hover {
  background-color: #c0392b;
}
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

.carousel {
  position: relative;
  width: 100%;
  height: 50vh;
  overflow: hidden;
}

.carousel-slide {
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  transition: background-image 1s ease-in-out;
}

.header-title {
  font-size: 500%; 
  text-align: center;
  color: #ffffff;
  display: flex; /* Configura Flexbox */
  justify-content: center; /* Centra horizontalmente */
  align-items: center; /* Centra verticalmente */
  height: 100%; /* Asegúrate de que el contenedor tenga altura */
}


/* Modo oscuro */
body.dark-mode .header-content {
  background-color: rgba(0, 0, 0, 0.6); /* Fondo más oscuro */
}

/* General del Main */
main {
  padding: 20px;
}
/* */
.about-section,
.activities-section {
  margin: 40px 0;
}

.about-section h2,
.activities-section h2 {
  color: #003366;
  margin-bottom: 20px;
  text-align: center;
}

.card-grid {
  display: grid;
  grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
}

.card {
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: background-color 0.3s, color 0.3s;
}

.card-image {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.card-content {
  padding: 20px;
}

.card-content h3 {
  font-size: 1.3rem;
  color: #003366;
  margin-bottom: 10px;
  transition: color 0.3s;
}

.card-content p {
  color: #666;
  font-size: 1rem;
  line-height: 1.6;
  transition: color 0.3s;
  text-align: justify;
}

/* Modo oscuro */
body.dark-mode .about-section h2,
body.dark-mode .activities-section h2 {
  color: #ffcc00; /* Amarillo claro para destacar */
}

body.dark-mode .card {
  background-color: #1a1a1a; /* Fondo oscuro */
  box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1); /* Sombra clara */
}

body.dark-mode .card-content h3 {
  color: #ffcc00; /* Títulos destacados en amarillo claro */
}

body.dark-mode .card-content p {
  color: #cccccc; /* Texto gris claro */
}


body {
    margin: 0;
    padding: 0;
    background-color: rgb(245, 245, 245);
    font-family: 'Arial', sans-serif;
}

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

body.dark-mode .footer-column h3,
body.dark-mode .footer-column ul li a {
  color: #ffffff; /* Color de los textos en el footer en modo oscuro */
}

body.dark-

/* Ajustes para elementos interactivos */
body.dark-mode #toggleDark {
  color: #ffd700; /* Cambiar el color del ícono en modo oscuro */
}

/* Clase para imágenes con tamaño fijo */
.fixed-size-img {
  width: 400px; /* Ancho predeterminado */
  height: 400px; /* Altura predeterminada */
  object-fit: cover; /* Mantener proporciones */
  border-radius: 10px; /* Bordes redondeados */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra */
  transition: transform 0.3s ease-in-out; /* Animación */
}

.fixed-size-img:hover {
  transform: scale(1.1); /* Efecto zoom */
}

/* Hero Section */
.hero {
  position: relative;
  width: 100%;
  height: 100vh; /* Altura completa de la ventana */
  background-image: url('@/assets/footerSociedad.webp'); /* Reemplaza con tu imagen */
  background-size: cover;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* Overlay para contenido */
.hero-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Oscurece el fondo */
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  padding: 20px;
}

/* Título principal */
.hero-title {
  color: #ffffff;
  font-size: 3rem;
  font-weight: bold;
  margin-bottom: 1rem;
  line-height: 1.2;
}

.highlight {
  color: #ffd700; /* Amarillo destacado */
}

/* Descripción */
.hero-description {
  color: #ffffff;
  font-size: 1.2rem;
  line-height: 1.6;
  margin-bottom: 2rem;
  max-width: 600px; /* Limita el ancho */
}

/* Botón de llamada a la acción */
.button {
 --color: #f16022;
 padding: 0.8em 1.7em;
 background-color: transparent;
 border-radius: .3em;
 position: relative;
 overflow: hidden;
 cursor: pointer;
 transition: .5s;
 font-weight: 400;
 font-size: 17px;
 border: 1px solid;
 font-family: inherit;
 text-transform: uppercase;
 color: var(--color);
 z-index: 1;
}

.button::before, .button::after {
 content: '';
 display: block;
 width: 50px;
 height: 50px;
 transform: translate(-50%, -50%);
 position: absolute;
 border-radius: 50%;
 z-index: -1;
 background-color: var(--color);
 transition: 1s ease;
}

.button::before {
 top: -1em;
 left: -1em;
}

.button::after {
 left: calc(100% + 1em);
 top: calc(100% + 1em);
}

.button:hover::before, .button:hover::after {
 height: 410px;
 width: 410px;
}

.button:hover {
 color: rgb(0, 0, 0);
}

.button:active {
 filter: brightness(.8);
}

/* Modo oscuro */
body.dark-mode .hero-overlay {
  background-color: rgba(0, 0, 0, 0.8);
}

body.dark-mode .hero-title {
  color: #ffd700;
}

body.dark-mode .hero-description {
  color: #e0e0e0;
}

body.dark-mode .hero-button {
  background-color: #003366;
  color: #ffffff;
}

body.dark-mode .hero-button:hover {
  background-color: #0056b3;
}

#chasquis h2 {
  text-align: center;
  font-family: 'Poppins', sans-serif;
  font-size: 40px;
  color: #ffd700; /* Amarillo predeterminado */
}

/* Estilos para el modo oscuro */
body.dark-mode #chasquis h2 {
  color: #ffffff; /* Blanco para mayor contraste */
}

#artes h2 {
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 40px;
    color:  #ffd700;
    background-color:none; 
}

.chasqui-list {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  padding: 20px;
  justify-content: center;
}

.chasqui-item {
  background-color: #ffffff; /* Fondo claro por defecto */
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra estándar */
  width: 300px;
  text-align: center;
  transition: background-color 0.3s, box-shadow 0.3s; /* Transiciones suaves */
}

/* Estilos para el modo oscuro */
body.dark-mode .chasqui-item {
  background-color: #323131; /* Fondo oscuro */
  box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1); /* Sombra ajustada para modo oscuro */
}


.btn-download {
  display: block;
  margin: 10px 0;
  color: #ffffff;
  background-color: #ffd700;
  padding: 10px;
  text-decoration: none;
  border-radius: 5px;
}

.btn-delete {
  background-color: #e74c3c;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
}

.btn-delete:hover {
  background-color:  #e74c3c;
}

/* Estilos generales */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.buttons {
  min-width: 700px;
  display: flex;
  justify-content: space-around;
  margin: 20px auto;
}

.buttons a {
  text-decoration: none;
  font-size: 28px;
  width: 60px;
  height: 60px;
  line-height: 60px;
  text-align: center;
  background: #003366;
  color: #f1f1f1;
  border-radius: 50%;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
  transition: all 0.4s ease-in-out;
}

.buttons a:hover {
  transform: scale(1.2);
}

/* Modo oscuro */
body.dark-mode .buttons a {
  background: #1a1a1a;
  color: #ffd700;
  box-shadow: 2px 2px 5px rgba(255, 255, 255, 0.5);
}

body.dark-mode .buttons a:hover {
  transform: scale(1.2);
}
/* Formulario */
.titulosFormularios {
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 40px;
    margin-bottom: 10px;
    color: #003366;
    transition: color 0.3s;
}

body.dark-mode .titulosFormularios {
    color: white; /* Cambia a un color amarillo en modo oscuro */
}

form {
    width: 100%;
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background: white; /* Fondo claro por defecto */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
    transition: background-color 0.3s, box-shadow 0.3s;
}

body.dark-mode form {
  background: #000000;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #434343, #000000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #434343, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

 /* Fondo oscuro */
    box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1); /* Sombra ajustada para modo oscuro */
}

form label {
    font-size: 16px;
    color: #333;
    font-weight: bold;
    margin-bottom: 5px;
    display: inline-block;
    transition: color 0.3s;
}

body.dark-mode form label {
    color: #ffffff; /* Cambia el color del texto en modo oscuro */
}

form input[type="number"],
form input[type="text"],
form input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0 20px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s ease, background-color 0.3s ease, color 0.3s ease;
}

body.dark-mode form input[type="number"],
body.dark-mode form input[type="text"],
body.dark-mode form input[type="file"] {
    border: 1px solid  #e74c3c; /* Cambia el borde a un color brillante */
    background-color: #1a1a1a; /* Fondo oscuro */
    color: #ffffff; /* Texto blanco */
}

form input[type="number"]:focus,
form input[type="text"]:focus,
form input[type="file"]:focus {
    border-color: #e74c3c;
    outline: none;
}

form input[type="submit"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
    color: #ffffff;
    background-color: #e74c3c;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

body.dark-mode form input[type="submit"] {
    background-color: #ffd700; /* Cambia el fondo del botón en modo oscuro */
    color: #1a1a1a; /* Texto oscuro para contraste */
}

form input[type="submit"]:hover {
    background-color: #e74c3c;
}

body.dark-mode form input[type="submit"]:hover {
    background-color: #ffcc00; /* Más brillante al pasar el mouse */
}

.formularios {
    margin: 30px auto;
    background-color: #ffffff; /* Fondo claro por defecto */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s, box-shadow 0.3s;
}

body.dark-mode .formularios {
    background-color: #1a1a1a; /* Fondo oscuro */
    box-shadow: 0 2px 5px rgba(255, 255, 255, 0.1); /* Sombra clara para modo oscuro */
}

@media (max-width: 480px) {
    form {
        padding: 15px;
        width: 90%;
    }

    form input[type="submit"] {
        font-size: 14px;
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