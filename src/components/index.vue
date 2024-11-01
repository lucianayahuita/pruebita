<template>
    <div>
      <nav>
        <a href="#UCB" class="menu">UCB</a>
        <a href="#Formación" class="menu">Formación</a>
        <a href="#Noticias" class="menu">Noticias</a>
        <a href="#sociedad-cientifica" class="menu">Sociedad Científica</a>
        <a href="#UCB Internacional" class="menu">UCB Internacional</a>
        <a href="login.vue" target="_blank" class="menu">Login</a>
      </nav>
      <header>
        <h1 id="titulo">Ciencias Políticas y Relaciones Internacionales</h1>
      </header>
  
      <main>
        <section class="seccion_index">
          <h2>¿Qué es la carrera?</h2>
          <p>Conjunto estructurado de capacidades prácticas y teóricas para contribuir positiva y eficazmente a la solución de los problemas políticos, sociales y de gobiernos...</p>
        </section>
        
        <section class="seccion_index">
          <h2>¿Qué significa ser Cientista Político/a?</h2>
          <p>El cientista político o cientista política es un/a profesional que comprende la política, las relaciones de poder y sus implicancias...</p>
        </section>
        
        <section class="seccion_index">
          <h2>Nuestra Misión</h2>
          <p>La misión fundamental de la Universidad es constante búsqueda de la verdad mediante investigación, la conservación y la comunicación del saber...</p>
        </section>
        
        <section class="seccion_index">
          <h2>Nuestra Visión</h2>
          <p>Somos universidad católica en salida, que desde su identidad investiga éticamente...</p>
        </section>
        
        <section class="seccion_index">
          <h2>Identidad Católica</h2>
          <p>La Universidad Católica Boliviana “San Pablo”, al haber nacido en el seno de la Iglesia, posee la esencia de la Identidad Católica...</p>
        </section>
        
        <section class="seccion_index">
          <h2>Navega por nuestro sitio:</h2>
          <div class="btn_sitios">
            <div>
              <h3 class="titulos_botones">Malla Curricular</h3>
              <a href="https://lpz.ucb.edu.bo/wp-content/uploads/2023/12/CPO-2024.pdf" target="_blank">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmDCJgP8hdaMKmArKRSInm2eUpAKmbLI9cEimt_pAAs-gGwfwQ" alt="Malla Curricular" height="300" width="300">
              </a>
            </div>
            <div>
              <h3 class="titulos_botones">Actividades</h3>
              <a href="URL_DE_ACTIVIDADES" target="_blank">
                <img src="https://images.squarespace-cdn.com/content/v1/5d53ffd56636c10001f8edf7/1566406301516-2FLHPNC7SHJZBHRFOUTR/Yearbook+icon.JPG" alt="Actividades" height="300" width="300">
              </a>
            </div>
          </div>
          <div class="btn_sitios">
            <div>
              <h3 class="titulos_botones">Docentes</h3>
              <a href="URL_DE_DOCENTES" target="_blank">
                <img src="https://www.channeldynamics.com.au/wp-content/uploads/2019/10/Training-Icon.png" alt="Docentes" height="300" width="300">
              </a> 
            </div>
            <div>
              <h3 class="titulos_botones">Sociedad Científica</h3>
              <a href="URL_DE_SOCIEDAD_CIENTIFICA" target="_blank">
                <img src="https://www.kindpng.com/picc/m/645-6457767_5-people-icon-png-clipart-png-download-group.png" alt="Sociedad Científica" height="300" width="300">
              </a>
            </div>
          </div>
        </section>
      </main>
  
      <footer>
        <p>© 2024 Universidad. Todos los derechos reservados.</p>
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
  };
  </script>
  
  <style scoped>
    /* Reset y estilos globales */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    #titulo {
      color:#f9f9f9;
      font-family: Arial, Helvetica, sans-serif;
    }
    body {
        background-color: #f9f9f9;
        font-family: 'Arial', sans-serif;
        color: #333;
        line-height: 1.6;
    }

    h1, h2, h3 {
        color: #003366;
        text-align: center;
        margin: 15px 0;
    }
    
    /* Cabecera y navegación */
    header {
        background-color: #003366;
        color: #fff;
        padding: 20px 0;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    
    nav {
        text-align: center;
        padding: 15px 0;
        background-color: #005bb5;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        margin: 0 15px;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
        font-weight: bold;
    }

    nav a:hover {
        background-color: #FFCC00;
        color: #003366;
    }
    
    /* Secciones */
    .seccion_index {
        padding: 25px;
        margin: 25px auto;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        max-width: 1200px;
    }

    /* Botones de secciones */
    .btn_sitios {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 20px;
    }

    .btn_sitios div {
        flex: 1 1 250px;
        text-align: center;
        margin: 10px;
        padding: 15px;
        background-color: #e6f2ff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn_sitios div:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .titulos_botones {
        margin-bottom: 10px;
        font-size: 1.3rem;
        color: #003366;
        font-weight: bold;
    }
    
    /* Pie de página */
    footer {
        background-color: #003366;
        color: #FFCC00;
        padding: 15px 0;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
        box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Responsividad */
    @media (max-width: 768px) {
        nav a {
            display: block;
            margin: 10px auto;
        }
        
        .seccion_index {
            padding: 20px;
            margin: 15px;
        }
        
        .btn_sitios div {
            flex: 1 1 100%;
            margin: 15px 0;
        }
    }
</style>