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

    <!-- Header con el carrusel de fondo -->
    <header :style="{ backgroundImage: 'url(' + currentImage + ')' }" class="carousel-header">
      <h1 class="header-title">Ciencias Políticas y Relaciones Internacionales</h1>
    </header>


    <main>
      <!-- Sección 1 -->
      <section class="split-section">
        <div class="text-content">
          <h2>¿Qué significa ser Cientista Político/a?</h2>
          <p>
            El cientista político o cientista política es un/a profesional que comprende la política, las relaciones de poder y sus implicancias. Está capacitado/a para analizar, evaluar, desarrollar y administrar proyectos relacionados con el origen, distribución y empleo del poder en la sociedad, tanto al interior del Estado como en el ámbito de la sociedad civil e internacional.
          </p>
        </div>
        <div class="media-content">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/IkAJicIjGx8?si=nwawidBdsF9kkMEc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
      </section>

      <!-- Sección 2 -->
      <section class="split-section">
        <div class="media-content">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/dZ8S7ikMY08?si=wvigpSUkyTML8Rba" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="text-content">
          <h2>Beneficios de estudiar esta carrera en la U.C.B.</h2>
          <p>
            1. Malla curricular actualizada a la altura de cualquier oferta académica extranjera.<br>

            2. Nivel académico elevado, reflejado en el acceso a becas de postgrado en universidades de prestigio.<br>

            3. Destacada experiencia del personal docente y compromiso del mismo con la Carrera y las metas de excelencia.<br>

            4. Fuerte sentido de pertenencia de los estudiantes hacia la Carrera.<br>
          </p>
        </div>
      </section>
       <!-- Sección 3 -->
       <section class="split-section">
        <div class="text-content">
          <h2>¿Dónde podrás trabajar?</h2>
          <p>
            - En asesoría de políticas en el sector público: Ejecutivo, Legislativo, Judicial y Electoral.<br>

            - En el servicio exterior y organismos internacionales.<br>

            - En partidos políticos para la formulación de propuestas electorales.<br>

            - En negociación y solución de conflictos sociales y políticos.<br>

            - En planificación y lanzamiento de estratégias de políticas públicas.<br>

            - En la formación de opinión pública a través de líderes de opinión.<br>
          </p>
        </div>
        <div class="media-content">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/hW-Rkd62pXo?si=zNjv5pQmNTXyCOPl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
      </section>

      <section class="identity-section">
        <div class="overlay">
          <h1 class="section-title">CEUB</h1>
          <p class="section-description">
            La Universidad Católica Boliviana "San Pablo" forma parte del Sistema de la Universidad Boliviana (SUB) y del Comité Ejecutivo de la Universidad Boliviana (CEUB), organismos que fortalecen la educación superior en el país.<br>
            ¿Qué es el CEUB?<br>
            El CEUB es el ente nacional que representa al Sistema de la Universidad Pública Boliviana, promoviendo el intercambio de investigadores, la gestión de convenios entre universidades e instituciones nacionales e internacionales, y el fortalecimiento de la educación universitaria en Bolivia.<br>
            Beneficios de pertenecer al SUB y CEUB:<br>
            • Títulos Profesionales reconocidos: La UCB emite títulos profesionales sin necesidad de trámites adicionales ante el Ministerio de Educación, a diferencia de las universidades privadas.<br>
            • Movilidad académica: Posibilidad de traspaso y convalidación de materias con universidades del CEUB.<br>
            • Reconocimiento internacional: Títulos homologables en el exterior, facilitando estudios de postgrado o acceso a empleos fuera del país.<br>
            • Convenios y oportunidades: Acceso a programas de movilidad estudiantil y profesional gestionados por el CEUB.<br>
            • Autonomía: Independencia de instancias estatales.<br>
            • Convalidación en otras universidades: Materias aprobadas en la UCB pueden ser reconocidas en carreras adicionales, tanto en universidades públicas como privadas.<br>
            Ser parte del SUB y CEUB refuerza el prestigio y la calidad educativa de la UCB, abriendo puertas tanto dentro como fuera del país.<br>
            También pertenecemos a la Federación Internacional de Universidades Católicas 
            (FIUC), lo que facilita a los estudiantes a acceder a cursos,
            seminarios, intercambios, participar en redes académicas, proyec-
            tos de investigación y muchas otras iniciativas y oportunidades in-
            ternacionales con universidades católicas del mundo.
          </p>
        </div>
      </section>

      <!-- Nueva sección para las tarjetas interactivas -->
      <section class="interactive-card-section">
    <h2 class="section-title">Colaboraciones y Redes Académicas</h2>
    <div class="interactive-card-container">
      <!-- Tarjeta 1 -->
      <div class="interactive-card">
        <h3>Duración de la carrera</h3>
        <div class="card-content">
          <div class="card-image">
            <img src="@/assets/Malla.png" alt="FIUC" />
          </div>
          <div class="card-hover">
            <p>
              La carrera cuenta con una duración de 9 semestres.
            </p>
            <a href="https://lpz.ucb.edu.bo/wp-content/uploads/2023/12/CPO-2024.pdf" class="button" target="_blank" rel="noopener noreferrer">
              <span class="button_lg">
                <span class="button_sl"></span>
                <span class="button_text">Descarga la Malla</span>
              </span>
            </a>
          </div>
        </div>
      </div>

      <!-- Tarjeta 2 -->
      <div class="interactive-card">
        <h3>Áreas de Estudio</h3>
        <div class="card-content">
          <div class="card-image">
            <img src="@/assets/AreasEstudio.png" alt="ODUCAL" />
          </div>
          <div class="card-hover">
            <p>
              - Historia política <br>
              - Teorías y análisis políticos<br>
              - Relaciones internacionales<br>
              - Gestión en políticas públicas<br>
              - Investigación
            </p>
          </div>
        </div>
      </div>

      <!-- Tarjeta 3 -->
      <div class="interactive-card">
        <h3>Modalidades de Gradución</h3>
        <div class="card-content">
          <div class="card-image">
            <img src="@/assets/Graduacion.png" alt="CINDA" />
          </div>
          <div class="card-hover">
            <p>
              - Graduación por excelencia<br>
              - Tesis de grado
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

        <!-- Nueva sección con tarjetas -->
        <section class="card-section">
        <h2 class="section-title">Nuestra Filosofía</h2>
        <div class="card-grid">
          <!-- Tarjeta 1 -->
          <div class="card">
            <img src="@/assets/mision2.webp" alt="Misión" class="card-image" />
            <div class="card-content">
              <h3 class="card-title">Nuestra Misión</h3>
              <p>
                La misión fundamental de la Universidad es la constante búsqueda de
                la Verdad mediante la investigación, la conservación y la comunicación del saber para el bien de la sociedad. La Universidad Católica Boliviana “San Pablo”
                participa en esta misión aportando sus características esenciales y su finalidad. (Carta Apostólica Ex Corde Ecclesiae, B.30). 
              </p>
            </div>
          </div>

          <!-- Tarjeta 2 -->
          <div class="card">
            <img src="@/assets/cristo2.webp" alt="Visión" class="card-image" />
            <div class="card-content">
              <h3 class="card-title">Nuestra Visión</h3>
              <p>
                Somos universidad católica en salida, que desde su identidad investiga
                éticamente, forma integralmente profesionales de calidad y brinda educación para la vida, interactuando socialmente en internacionalización,
                con responsabilidad social ambiental, aportando agentes de cambio humanistas para el desarrollo sostenible de la humanidad.
              </p>
            </div>
          </div>

          <!-- Tarjeta 3 -->
          <div class="card">
            <img src="@/assets/Identidad.webp" alt="Identidad Católica" class="card-image" />
            <div class="card-content">
              <h3 class="card-title">Identidad Católica</h3>
              <p>
                La Universidad Católica Boliviana "San Pablo", como obra evangelizadora nacida de la Iglesia, refleja su Identidad Católica al formar profesionales, investigar e interactuar con la sociedad desde la fe y visión cristiana. Como dijo San Juan Pablo II: “Una universidad contribuye a la Iglesia y la sociedad con investigaciones de alta calidad, un profundo estudio de los problemas y una visión integral de la persona regenerada en Cristo, promoviendo su desarrollo completo”.
              </p>
            </div>
          </div>
        </div>
      </section>

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

  </div>
</template>

<script>
export default {
  name: "HeaderCarousel",
  data() {
    return {
      images: [
        require('@/assets/inicio4.webp'),
        require('@/assets/pazmun.jpg'),
        require('@/assets/inicio2.jpg'),
      ], // Lista de imágenes
      currentImageIndex: 0, // Índice actual del carrusel
      intervalId: null, // ID del intervalo para limpiar al desmontar
      darkMode: false,  // Aquí se guarda el estado del tema
    };
  },
  computed: {
    currentImage() {
      return this.images[this.currentImageIndex];
    },
  },
  methods: {
    startCarousel() {
      this.intervalId = setInterval(() => {
        this.currentImageIndex =
          (this.currentImageIndex + 1) % this.images.length;
      }, 5000); // Cambiar cada 5 segundos
    },
    toggleDarkMode() {
      this.darkMode = !this.darkMode;  
      document.body.classList.toggle("dark-mode", this.darkMode);  
    },
  },
  mounted() {
    this.startCarousel();
  },
  beforeUnmount() {
    // Limpiar el intervalo cuando el componente se desmonta
    if (this.intervalId) {
      clearInterval(this.intervalId);
    }
  },
};
</script>

<style >
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background-color: #f9f9f9;
  font-family: "Arial", sans-serif;
  color: #333;
  line-height: 1.6;
  width: 100%;
}

/* Header */
header {
  background-image: url('@/assets/imagenIndex.webp');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 30vh;
  min-height: 300px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  width: 100%;
}

@media (max-width: 768px) {
  header {
    height: 40vh;
    min-height: 200px;
  }
}

/* Nav */
nav {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  padding: 15px 0;
  background-color: #ffffff;
  flex-wrap: wrap;
}

nav a {
  color: #030000;
  text-decoration: none;
  margin: 0 15px;
  padding: 10px 20px;
  border-radius: 5px;
  transition: background-color 0.3s ease, color 0.3s ease;
  font-weight: bold;
  display: block;
}

nav a:hover {
  background-color: #ffcc00;
  color: #003366;
}

.imgnav {
  display: flex;
  justify-content: flex-start;
}

@media (max-width: 768px) {
  nav {
    flex-direction: column;
    align-items: center;
  }

  nav a {
    width: 100%;
    margin: 5px 0;
    text-align: center;
    padding: 10px;
  }
}

/* Para el modo oscuro */
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
  background-color: #1a1a1a;
}

body.dark-mode nav a {
  color: #ffffff;
}

body.dark-mode .split-section {
  background-color: #333333;
  color: white;
}

body.dark-mode .card-section {
  background-color: #222222;
  color: white;
}

body.dark-mode .custom-footer {
  background-color: #222222;
}

body.dark-mode .interactive-card-section {
  background-color: #222222;
}

body.dark-mode .card-grid .card {
  background-color: #293737;
}

body.dark-mode .media-content {
  background-color: #222222;
}

body.dark-mode .text-content {
  color: white;
}

body.dark-mode .footer-column h3,
body.dark-mode .footer-column ul li a {
  color: #ffffff;
}

body.dark-mode #toggleDark {
  color: #ffd700;
}

.split-section {
  display: flex;
  align-items: center;
  gap: 20px;
  margin: 30px 0;
  background-color: #f16022;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.text-content {
  flex: 1;
  padding: 20px;
}

.media-content {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #eeeeee;
}

.media-content img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

.custom-footer {
  background-color: #ffffff;
  padding: 20px 50px;
  box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
  color: #333333;
  font-family: Arial, sans-serif;
}

/* Sección identidad */
.identity-section {
  position: relative;
  width: 100%;
  min-height: 600px;
  background-image: url('@/assets/ciencias.webp');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  justify-content: center;
  align-items: center;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 51, 102, 0.8);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 20px;
  text-align: center;
  color: white;
  overflow: hidden; /* Evita que el texto sobrepase la sección */
}

.identity-section .section-title {
  font-size: 2.5rem;
  font-weight: bold;
  margin-bottom: 20px;
  color: #ffd700;
}

.section-description {
  font-size: 1.1rem;
  line-height: 1.8;
  margin-bottom: 15px;
  color: #ffffff;
  text-align: left;
  padding: 0 10px; /* pequeño padding */
}

.interactive-card-section {
  padding: 40px 20px;
}

.section-title {
  text-align: center;
  color: #003366;
  margin-bottom: 20px;
  font-size: 2.5rem;
  font-weight: bold;
}

.interactive-card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

.interactive-card {
  width: 300px;
  height: 300px;
  perspective: 1000px;
}

.interactive-card .card-content {
  width: 100%;
  height: 100%;
  position: relative;
  overflow: hidden;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
}

.interactive-card:hover .card-content {
  transform: translateY(-5px);
}

.button {
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  border: none;
  background: none;
  color: #0f1923;
  cursor: pointer;
  position: relative;
  padding: 8px;
  margin-bottom: 20px;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 14px;
  transition: all .15s ease;
}

.button::before,
.button::after {
  content: '';
  display: block;
  position: absolute;
  right: 0;
  left: 0;
  height: calc(50% - 5px);
  border: 1px solid #7D8082;
  transition: all .15s ease;
}

.button::before {
  top: 0;
  border-bottom-width: 0;
}

.button::after {
  bottom: 0;
  border-top-width: 0;
}

.button:active,
.button:focus {
  outline: none;
}

.button:active::before,
.button:active::after {
  right: 3px;
  left: 3px;
}

.button:active::before {
  top: 3px;
}

.button:active::after {
  bottom: 3px;
}

.button_lg {
  position: relative;
  display: block;
  padding: 10px 20px;
  color: #fff;
  background-color: #0f1923;
  overflow: hidden;
  box-shadow: inset 0px 0px 0px 1px transparent;
}

.button_lg::before {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 2px;
  height: 2px;
  background-color: #0f1923;
}

.button_lg::after {
  content: '';
  display: block;
  position: absolute;
  right: 0;
  bottom: 0;
  width: 4px;
  height: 4px;
  background-color: #0f1923;
  transition: all .2s ease;
}

.button_sl {
  display: block;
  position: absolute;
  top: 0;
  bottom: -1px;
  left: -8px;
  width: 0;
  background-color: #ffcc00;
  transform: skew(-15deg);
  transition: all .2s ease;
}

.button_text {
  position: relative;
}

.button:hover {
  color: #0f1923;
}

.button:hover .button_sl {
  width: calc(100% + 15px);
}

.button:hover .button_lg::after {
  background-color: #fff;
}

.interactive-card .card-image {
  width: 100%;
  height: 100%;
  overflow: hidden;
  border-radius: 10px;
}

.interactive-card .card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease-in-out;
}

.interactive-card:hover .card-image img {
  transform: scale(1.1);
}

.interactive-card .card-hover {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 179, 102, 0.9);
  color: black;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  opacity: 0;
  padding: 20px;
  border-radius: 10px;
  transition: opacity 0.3s ease-in-out;
}

.interactive-card:hover .card-hover {
  opacity: 1;
}

.interactive-card h3 {
  color:#003366;
  text-align: center;
}

.card-hover h3 {
  font-size: 1.2rem;
  margin-bottom: 10px;
  font-weight: bold;
}

.card-hover p {
  font-size: 1rem;
  line-height: 1.5;
}

/* Cuadrícula de tarjetas */
.card-section {
  padding: 40px 20px;
}

.section-title {
  text-align: center;
  color: #003366;
  margin-bottom: 30px;
  font-size: 2rem;
  font-weight: bold;
}

.card-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
}

/* Estilo para las tarjetas */
.card {
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  display: flex;
  flex-direction: column;
}

.card-image {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.card-content {
  padding: 20px;
}

.card-title {
  color: #003366;
  font-size: 1.5rem;
  margin-bottom: 10px;
  font-weight: bold;
}

.card-content p {
  color: #333333;
  font-size: 1rem;
  line-height: 1.6;
}

/* Ajustes responsivos */
@media (max-width: 768px) {
  header {
    height: 40vh;
  }
  header .header-title {
    font-size: 1.8rem; 
  }
  .split-section {
    flex-direction: column;
    gap: 20px;
  }

  .text-content, .media-content {
    padding: 10px;
  }

  .media-content iframe {
    width: 100%;
    height: auto;
  }

  .identity-section {
    min-height: 400px; /* Reducir altura en pantallas más pequeñas */
  }

  .section-title {
    font-size: 2rem; /* Reducir tamaño del título */
    margin-bottom: 15px;
  }

  .section-description {
    font-size: 1rem; /* Reducir tamaño de la descripción */
    text-align: center; /* Centrado del texto */
    margin-bottom: 10px;
  }

  .overlay {
    padding: 15px; /* Reducir padding para pantallas más pequeñas */
  }
  .interactive-card-container {
    flex-direction: column;
    align-items: center;
  }

  .interactive-card {
    width: 100%;
    max-width: 300px;
  }

  .card-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }

  .card-image {
    height: 150px;
  }

  .card-title {
    font-size: 1.2rem;
  }
  nav {
    flex-direction: column;
    align-items: center;
  }

  nav a {
    width: 100%;
    text-align: center;
    padding: 10px;
  }

  .card-grid {
    grid-template-columns: 1fr;
  }

  .media-content img {
    width: 100%;
  }
}

@media (max-width: 480px) {
  header {
    height: 50vh;
  }
  header .header-title {
    font-size: 1.5rem; 
  }
  .section-title {
    font-size: 1.5rem; /* Aún más pequeño en pantallas muy pequeñas */
  }
  .identity-section {
    min-height: 300px; /* Reducir aún más la altura */
  }

  .section-title {
    font-size: 1.5rem; /* Aún más pequeño en pantallas muy pequeñas */
    margin-bottom: 10px;
  }

  .section-description {
    font-size: 0.9rem; /* Más pequeño aún */
    line-height: 1.5;
    text-align: center;
    padding: 0 5px;
  }

  .overlay {
    padding: 10px; /* Reducir aún más el padding */
  }
  .section-description {
    font-size: 0.9rem; 
    line-height: 1.5; 
  }

  .interactive-card .card-image {
    height: 120px;
  }

  .card-content {
    font-size: 0.9rem;
  }
  .footer-column {
    font-size: 0.9rem;
  }
}


</style>