<template>
    <div>
      <nav>
        <a href="#UCB" class="menu">UCB</a>
        <a href="#Formación" class="menu">Formación</a>
        <a href="#Noticias" class="menu">Noticias</a>
        <a href="#sociedad-cientifica" class="menu">Sociedad Científica</a>
        <a href="#UCB Internacional" class="menu">UCB Internacional</a>
        <router-link to="/login" class="menu">Login</router-link> <!-- Uso de router-link para navegación -->

      </nav>
  
      <header>
        <h1 id="titulo">Ciencias Políticas y Relaciones Internacionales</h1>
      </header>
  
      <section class="seccion_index">
        <h2>¿Qué es la carrera?</h2>
        <h2>esta es la prueba de pruebas</h2>
        <h2>pute</h2>
        <h2>chau llora nomas</h2>
        <p>
          Conjunto estructurado de capacidades prácticas y teóricas para contribuir
          positiva y eficazmente a la solución de los problemas políticos, sociales
          y de gobiernos, buscando mejoras cualitativas que beneficien a la
          sociedad donde les toque actuar profesionalmente, sea en el ámbito
          interno y/o internacional.
        </p>
      </section>
  
      <section class="seccion_index">
        <h2>¿Qué significa ser Cientista Político/a?</h2>
        <p>
          El cientista político o cientista política es un/a profesional que comprende
          la política, las relaciones de poder y sus implicancias. Está capacitado/a
          para analizar, evaluar, desarrollar y administrar proyectos relacionados
          con el origen, distribución y empleo del poder en la sociedad, tanto al
          interior del Estado como en el ámbito de la sociedad civil e internacional.
        </p>
      </section>
      <section class="seccion_index">
        <h2>Nuestra Misión</h2>
        <p>
          La misión fundamental de la Universidad es constante búsqueda de la verdad
          mediante investigación, la conservación y la comunicación del saber para el
          bien de la sociedad. La Universidad Católica participa en esta misión
          aportando sus características específicas y su finalidad.
        </p>
      </section>
  
      <section class="seccion_index">
        <h2>Nuestra Visión</h2>
        <p>
          Somos universidad católica en salida, que desde su identidad investiga
          éticamente, forma integralmente profesionales de calidad y brinda educación
          para la vida, interactuando socialmente en internacionalización, con
          responsabilidad social ambiental, aportando agentes de cambio humanistas
          para el desarrollo sostenible de la humanidad.
        </p>
      </section>
  
      <section class="seccion_index">
        <h2>Identidad Católica</h2>
        <p>
          La Universidad Católica Boliviana “San Pablo”, al haber nacido en el seno
          de la Iglesia, posee la esencia de la Identidad Católica que le permite
          participar como obra evangelizadora, mediante la formación profesional,
          investigación y la interacción con su sociedad, basándose en la fe y la
          visión cristiana. En ese sentido, la Identidad Católica de la U.C.B. puede
          resumir en lo que San Juan Pablo II expresó oportunamente: “Una universidad
          está llamada a dar una contribución específica a la Iglesia y a la sociedad
          con la alta cualidad científica de sus investigaciones, con un profundo
          estudio de los problemas y con un adecuado sentido de la historia, junto
          con la preocupación de demostrar el significado completo de la persona
          humana regenerada en Cristo, favoreciendo así el entero desarrollo de la
          persona”.
        </p>
      </section>
  
      <section class="seccion_index">
        <h2>Navega por nuestro sitio por:</h2>
        <div class="btn_sitios">
          <div>
            <h3 class="titulos_botones">Malla Curricular</h3>
            <a href="https://lpz.ucb.edu.bo/wp-content/uploads/2023/12/CPO-2024.pdf" target="_blank">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmDCJgP8hdaMKmArKRSInm2eUpAKmbLI9cEimt_pAAs-gGwfwQ" 
                   alt="Malla Curricular" height="300" width="300" />
            </a>
          </div>
          <div>
            <h3 class="titulos_botones">Información de la carrera</h3>
            <a href="https://lpz.ucb.edu.bo/wp-content/uploads/2024/07/CPO-21x145-Virtual_compressed.pdf" target="_blank">
              <img src="https://images.squarespace-cdn.com/content/v1/5d53ffd56636c10001f8edf7/1566406301516-2FLHPNC7SHJZBHRFOUTR/Yearbook+icon.JPG" 
                   alt="Actividades" height="300" width="300" />
            </a>
          </div>
        </div>
        <div class="btn_sitios">
          <div>
            <h3 class="titulos_botones">Docentes</h3>
            <a href="URL_DE_DOCENTES" target="_blank">
              <img src="https://www.channeldynamics.com.au/wp-content/uploads/2019/10/Training-Icon.png" 
                   alt="Docentes" height="300" width="300" />
            </a>
          </div>
          <div>
            <h3 class="titulos_botones">Sociedad Científica</h3>
            <a href="URL_DE_SOCIEDAD_CIENTIFICA" target="_blank">
              <img src="https://www.kindpng.com/picc/m/645-6457767_5-people-icon-png-clipart-png-download-group.png" 
                   alt="Sociedad Científica" height="300" width="300" />
            </a>
          </div>
        </div>
      </section>
  
      <footer>
        <p>&copy; 2024 Universidad. Todos los derechos reservados.</p>
      </footer>
    </div>
  </template>
  
  <script>
  export default {
    name: 'MyIndex',
    data() {
      return {
        usuario: "",
        password: "",
        error: false,
        error_msg: "",
      };
    },
    methods: {
      login() {
        // Implementar la lógica de inicio de sesión aquí
      },
      register() {
        // Redirigir al usuario a la página de registro
      },
      authWithGoogle() {
        // Implementar la lógica de autenticación con Google
      }
    }
  }
  </script>
  
  <style scoped>
  /* RESET Y ESTILOS GENERALES */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  body {
    background-color: #f9f9f9; /* Color de fondo suave */
    font-family: 'Arial', sans-serif;
    color: #333;
    line-height: 1.6;
  }
  
  /* TÍTULOS */
  h1 {
    color: #f9f9f9;
    text-align: center;
    margin: 15px 0; /* Espaciado uniforme para los encabezados */
  }
  
  h2, h3 {
    color: #003366;
    text-align: center;
    margin: 15px 0; /* Espaciado uniforme para los encabezados */
  }
  
  /* CABECERA Y NAVEGACIÓN */
  header {
    background-color: #003366; /* Azul oscuro */
    color: white;
    padding: 15px 20px; /* Ajusta el padding para mayor comodidad */
    width: 100%;
    position: relative;
    z-index: 1000; /* Asegura que el header esté en la parte superior */
  }
  
  nav {
    text-align: center;
    padding: 15px 0;
  }
  
  nav a {
    color: #003366;
    text-decoration: none;
    margin: 0 15px;
    padding: 10px 15px; /* Espaciado dentro de los enlaces */
    border-radius: 5px; /* Bordes redondeados */
    transition: background-color 0.3s, color 0.3s; /* Transiciones suaves */
  }
  
  nav a:hover {
    background-color: rgba(255, 255, 255, 0.2); /* Fondo semi-transparente en hover */
  }
  
  /* SECCIONES */
  section {
    padding: 20px;
    margin: 20px 0; /* Espaciado alrededor de las secciones */
    background-color: #fff; /* Fondo blanco para secciones */
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra suave */
  }
  
  /* IMÁGENES Y BOTONES */
  .btn_sitios {
    display: flex;
    justify-content: space-around; /* Espacio uniforme entre botones */
    margin-top: 20px; /* Espaciado superior */
  }
  
  .titulos_botones {
    text-align: center; /* Centrar títulos de botones */
  }
  
  img {
    max-width: 100%; /* Responsividad para imágenes */
    height: auto;
    border-radius: 8px; /* Bordes redondeados para imágenes */
  }
  
  /* PIE DE PÁGINA */
  footer {
    text-align: center;
    padding: 20px 0; /* Espaciado vertical para el footer */
    background-color: #003366; /* Fondo azul oscuro */
    color: white;
    position: relative;
  }
  </style>
  
  



  