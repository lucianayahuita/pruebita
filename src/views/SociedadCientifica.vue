<template>
  <div>
    <!-- Barra de navegación -->
    <nav>
      <div class="imgnav">
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
    </nav>

    <!-- Contenido principal -->
    <main>
      <div>
      <section id="presentacion">
      <div class="logoSC">
        <img src="@/assets/logo_sociedad.jpg" alt="Logo Sociedad Científica" class="fixed-size-img" />
      </div>
      <div class="contenidoSC">
        <h2>¿Qué es la Sociedad Científica?</h2>
        <p>
          La Sociedad Científica de la carrera de Ciencias Políticas de la Universidad Católica Boliviana (UCB) suele ser un espacio de encuentro y colaboración entre estudiantes y docentes enfocado en la investigación, la reflexión crítica y la divulgación del conocimiento. Estas sociedades científicas tienen como misión fomentar el pensamiento analítico, desarrollar proyectos de investigación en torno a los temas relevantes de la política, la sociedad y el desarrollo, y promover actividades académicas como conferencias, seminarios y publicaciones científicas.
          tiene como principales objetivos fomentar la investigación en temas políticos, organizar eventos académicos como conferencias y debates, y promover la publicación de trabajos científicos. Además, busca construir redes de colaboración con otras instituciones y formar líderes con pensamiento crítico y habilidades de análisis.
        </p>
      </div>
    </section>

    <!-- Resúmenes -->
    <section class="resumen">
      <!-- Sección de las Chasquis -->
      <div class="secResumen">
        <a href="#chasquis"><img src="@/assets/logo_chasqui.jpg" alt="Logo Chasquis" class="fixed-size-img" /></a>
        <div>
          <h3>CHASQUIPOSTAS</h3>
          <p>
            Los Chaskipostas de la carrera de Ciencias Políticas (CPO) son publicaciones que destacan por su compromiso con la difusión ágil y accesible de conocimientos. Inspirados en los antiguos mensajeros andinos, estas entregas buscan transmitir ideas, análisis e investigaciones de relevancia política y social, conectando a la comunidad académica con los temas más relevantes del entorno local, nacional e internacional. A través de estos espacios, la CPO fortalece su labor de reflexión crítica y contribución intelectual.
            Estas publicaciones no solo buscan informar, sino también involucrar a estudiantes, docentes y a la sociedad en general en debates de relevancia contemporánea. Los Chaskipostas abordan temas que van desde la coyuntura política nacional hasta tendencias internacionales, siempre con un enfoque analítico y propositivo. Además, son un espacio donde se refleja el talento y el compromiso de la comunidad de Ciencias Políticas de la UCB, consolidando su rol como referente académico y contribuyendo al desarrollo de una ciudadanía más informada y participativa. Con cada edición, se reafirma el compromiso de la carrera con la producción y divulgación de conocimiento accesible y significativo.
          </p>
        </div>
      </div>

      <!-- Sección "Esto no es política" -->
      <div class="secResumen1">
        <div>
          <h3>ESTO NO ES POLÍTICA</h3>
          <p>
            “Esto No Es Política” es el podcast oficial de la carrera de Ciencias Políticas (CPO) de la UCB, disponible en Spotify. Este espacio busca acercar los grandes temas políticos y sociales a una audiencia diversa, combinando análisis profundo con un tono fresco y accesible. El nombre del podcast refleja su intención de romper con los estereotipos y explorar los aspectos humanos, culturales y cotidianos que también forman parte del universo político, pero que a menudo quedan fuera de la discusión tradicional. Con cada episodio, se invita a expertos, docentes y estudiantes a compartir sus perspectivas, generando un diálogo dinámico y enriquecedor.
            Más allá de ser solo un espacio académico, “Esto No Es Política” es una plataforma que conecta a la comunidad universitaria con el público en general, fomentando la reflexión crítica sobre temas relevantes y actuales. Desde debates sobre democracia y derechos humanos hasta conversaciones sobre movimientos sociales y cultura política, el podcast se convierte en un vehículo para construir ciudadanía y fortalecer el vínculo entre la universidad y la sociedad. A través de este proyecto, la CPO reafirma su compromiso con la innovación educativa y la divulgación de ideas, haciendo del conocimiento algo cercano, útil y transformador.
          </p>
        </div>
        <a href="https://open.spotify.com/show/0jmsF7xCezZcFZu4v9ASDH?si=30GlKUOyS_KAZvAgPPx5SQ ">
          <img src="@/assets/esto_no_es_politica.jpg" alt="Esto no es política" class="fixed-size-img" />
        </a>
      </div>

    </section>

    <!-- Sección de las Chasquis -->
    <section id="chasquis">
        <h2>Revisa nuestras CHASQUIPOSTAS</h2>
        <div class="chasqui-list">
          <div v-for="chaski in chaskis" :key="chaski.id_chaskiposta" class="chasqui-item">
            <h3>{{ chaski.titulo_chaski }}</h3>
            <p>Número: {{ chaski.numero }}</p>
            <a :href="chaski.chaskiposta" target="_blank" class="btn-download">Ver Chaskiposta</a>
            <button @click="deleteChaski(chaski.id_chaskiposta)" class="btn-delete">Eliminar</button>
          </div>
        </div>
      </section>


  </div>
      <!-- Formulario de Chasquiposta -->
      <section class="formularios">
        <div class="titulosFormularios">
          <h3>Formulario de registro Chasqui</h3>
        </div>
        <form id="chaskiposta" action="http://localhost/proyecto/login/backend/API/chaskiposta.php" method="POST" enctype="multipart/form-data">
          <label for="numero">Número de la Chaskiposta</label>
          <input type="number" name="numero" required />
          <label for="titulo_chasqui">Título de la Chasqui</label>
          <input type="text" name="titulo_chasqui" required />
          <label for="chaskiposta">Archivo de la Chasqui</label>
          <input type="file" name="chaskiposta" required />
          <input type="submit" value="Registrar" />
        </form>
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

export default {
  name: "SociedadCientifica",
  data() {
    return {
      chaskis: [
        {
          id_chaskiposta: 1,
          titulo_chaski: "Primer Chaskiposta",
          numero: "1",
          chaskiposta: "https://www.example.com/docs_chaskis/chasquiposta.pdf"
        }
      ] // Lista inicial con datos manuales
    };
  },
  methods: {
    async fetchChaskis() {
      try {
        const response = await axios.get("http://localhost/proyecto/login/backend/API/chaskiAPI.php");
        if (Array.isArray(response.data)) {
          // Combina datos del backend con los manuales
          this.chaskis = [...this.chaskis, ...response.data];
        } else {
          console.error("Datos inesperados:", response.data);
        }
      } catch (error) {
        console.error("Error al obtener las Chaskipostas:", error);
      }
    },
    deleteChaski(id) {
      this.chaskis = this.chaskis.filter((chaski) => chaski.id_chaskiposta !== id);
      alert("Chaskiposta eliminada con éxito");
    }
  },
  mounted() {
    this.fetchChaskis();
  }
};
</script>


<style>
body {
    margin: 0;
    padding: 0;
    background-color: rgb(245, 245, 245);
    font-family: 'Arial', sans-serif;
}
/* Clase para imágenes con tamaño fijo */
.fixed-size-img {
  width: 400px; /* Ancho predeterminado */
  height: 400px; /* Altura predeterminada */
  object-fit: cover; /* Para mantener la proporción */
  border-radius: 10px; /* Opcional: bordes redondeados */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Opcional: sombra */
  transition: transform 0.3s ease-in-out; /* Animación al pasar el mouse */
}

.fixed-size-img:hover {
  transform: scale(1.1); /* Efecto zoom al pasar el mouse */
}

/* Resumen - Alinear imágenes */
.secResumen, .secResumen1 {
  display: flex;
  align-items: center;
  gap: 20px;
}

.secResumen div, .secResumen1 div {
  flex: 1;
}

/* Responsivo */
@media (max-width: 768px) {
  .fixed-size-img {
    width: 120px;
    height: 120px;
  }
}
/* Presentación */
#presentacion {
    padding: 20px;
    display: flex;
    height: 400px;
    justify-content: space-around;
    align-items: center;
    background-color: #f0f8ff; /* Azul muy claro */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra ligera */
}

/* Logo */
.logoSC {
    height: 300px;
    margin: 0 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.logoSC img {
    height: 300px;
    width: 300px;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Contenido principal */
.contenidoSC {
    background-color: #5a39ee;
    color: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.contenidoSC h2 {
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 40px;
    margin-bottom: 10px;
}

.contenidoSC p {
    text-align: justify;
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    line-height: 1.5;
    margin: 10px 0;
}

/* Resumen */
.resumen {
    background-color: #ffffff;
    padding: 20px 0;
}

/* Sección de Resumen */
.secResumen, .secResumen1 {
    display: flex;
    justify-content: center;
    gap: 20px;
    padding: 20px;
}

.secResumen div, .secResumen1 div {
    background-color: #faab35;
    height: auto;
    padding: 10px;
    border-radius: 10px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.secResumen div:hover, .secResumen1 div:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.secResumen div img, .secResumen1 div img {
    height: 120px;
    width: 120px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 10px;
    transition: transform 0.5s ease;
}

.secResumen div img:hover, .secResumen1 div img:hover {
    transform: scale(1.2);
}

.secResumen div h3, .secResumen1 div h3 {
    font-family: 'Poppins', sans-serif;
    font-size: 20px;
    margin: 10px 0;
    color: #333;
}

.secResumen div p, .secResumen1 div p {
    text-align: justify;
    font-family: 'Georgia', serif;
    font-size: 16px;
    line-height: 1.5;
    color: #444;
}

/* Responsivo */
@media (max-width: 768px) {
    #presentacion {
        flex-direction: column;
        align-items: center;
    }

    .secResumen, .secResumen1 {
        flex-direction: column;
        padding: 10px;
    }

    .secResumen div, .secResumen1 div {
        width: 80%;
    }
}


#chasquis h2{
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 40px;
    margin-bottom: 10px;
    color: #0f0053;
    background-color: #f0f8ff; /* Azul muy claro */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra ligera */
}

#artes h2{
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 40px;
    margin-bottom: 10px;
    color: #0f0053;
    background-color: #ffffff; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra ligera */
}

.chasqui-list {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  padding: 20px;
  justify-content: center;
}

.chasqui-item {
  background-color: #f9f9f9;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  width: 300px;
  text-align: center;
}

.btn-download {
  display: block;
  margin: 10px 0;
  color: #ffffff;
  background-color: #5a39ee;
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
  background-color: #c0392b;
}
/* ---------------- */
/* FORMULARIOS */
/* ---------------- */

.titulosFormularios{
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 40px;
    margin-bottom: 10px;
    color: #0f0053;
}

/* Estilos generales para los formularios */
form {
    width: 100%;
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
}

/* Etiquetas */
form label {
    font-size: 16px;
    color: #333;
    font-weight: bold;
    margin-bottom: 5px;
    display: inline-block;
}

/* Campos de entrada */
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
    transition: border-color 0.3s ease;
}

form input[type="number"]:focus,
form input[type="text"]:focus,
form input[type="file"]:focus {
    border-color: #5a39ee;
    outline: none;
}

/* Botón de enviar */
form input[type="submit"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
    color: #ffffff;
    background-color: #5a39ee;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #4631c6;
}

/* Ajustes de alineación */
form label, 
form input {
    display: block;
}

form label {
    margin-top: 10px;
    margin-bottom: 5px;
}

/* Estilo del contenedor */
.formularios {
    margin: 30px auto;
    background-color: #f0f8ff; /* Azul muy claro */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra ligera */
}

/* Responsivo */
@media (max-width: 480px) {
    form {
        padding: 15px;
        width: 90%;
    }

    form input[type="submit"] {
        font-size: 14px;
    }
}
</style>