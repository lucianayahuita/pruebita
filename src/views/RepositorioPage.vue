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
    <div class="logout-button-container">
      <button v-if="isAuthorizedUser" @click="logout" class="btn btn-secondary">Cerrar sesión</button>
    </div>
    
    <div v-if="currentTab === 'tesis'" class="tesis-container">
      <h1>Repositorio de Tesis</h1>

      <!-- Buscador -->
      <div class="form-group">
        <input 
          type="text" 
          v-model="searchTerm" 
          @input="filterTesis" 
          placeholder="Buscar por título o autor..." 
        />
      </div>

      <!-- Tabla de Tesis Filtradas -->
      <h2>Resultados de Búsqueda</h2>
      <table class="tesis-table">
        <thead>
          <tr>
            <th>Título</th>
            <th>Fecha de Publicación</th>
            <th>Autor</th>
            <th>Tesis (PDF)</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="tesis in filteredTesis" :key="tesis.id_tesis">
            <td>{{ tesis.titulo_tesis }}</td>
            <td>{{ tesis.fecha_publicacion_tesis }}</td>
            <td>{{ tesis.autor_tesis }}</td>
            <td>
              <button @click="viewPDF(tesis.tesis)">Ver tesis</button>
            </td>
            <td>
              <button v-if="isAuthorizedUser" @click="deleteTesis(tesis.id_tesis)" class="btn-delete">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Tabla de Todas las Tesis (si no se filtra) -->
      <h2>Todas las Tesis</h2>
      <table class="tesis-table">
        <thead>
          <tr>
            <th>Título</th>
            <th>Fecha de Publicación</th>
            <th>Autor</th>
            <th>Tesis (PDF)</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="tesis in tesisList" :key="tesis.id_tesis">
            <td>{{ tesis.titulo_tesis }}</td>
            <td>{{ tesis.fecha_publicacion_tesis }}</td>
            <td>{{ tesis.autor_tesis }}</td>
            <td>
              <button @click="viewPDF(tesis.tesis)">Ver tesis</button>
            </td>
            <td>
              <button v-if="isAuthorizedUser" @click="deleteTesis(tesis.id_tesis)" class="btn-delete">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Si se selecciona una tesis para ver, mostrar el iframe -->
      <div v-if="selectedTesis" class="pdf-viewer">
        <iframe 
          :src="selectedTesis + '#view=FitH&zoom=100&embedded=true'" 
          width="100%" 
          height="1100" 
          frameborder="0"
          style="border: none;">
        </iframe>
        <button @click="closeViewer" class="btn-close">Cerrar Vista</button>
      </div>

      <!-- Formulario de registro de tesis (solo si el usuario está autenticado) -->
      <div v-if="isAuthorizedUser" class="form-container">
        <h2>Registrar Tesis</h2>
        <form @submit.prevent="addTesis" enctype="multipart/form-data">
          <div class="form-group">
            <label for="titulo">Título:</label>
            <input v-model="newTesis.titulo" type="text" id="titulo" required />
          </div>
          <div class="form-group">
            <label for="fecha">Fecha de Publicación:</label>
            <input v-model="newTesis.fecha" type="date" id="fecha" required />
          </div>
          <div class="form-group">
            <label for="autor">Autor:</label>
            <input v-model="newTesis.autor" type="text" id="autor" required />
          </div>
          <div class="form-group">
            <label for="archivo">Archivo (PDF):</label>
            <input ref="tesisFile" type="file" id="archivo" accept="application/pdf" required />
          </div>
          <button type="submit" class="btn-submit">Registrar Tesis</button>
        </form>
      </div>
      <div v-else>
        <p>Por favor, inicia sesión para registrar una nueva tesis.</p>
      </div>
    </div>

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
import axios from "axios";
import Swal from "sweetalert2";

export default {
  name: "RepositorioPage",
  data() {
    return {
      currentTab: "tesis", // Para alternar entre Tesis y Revistas
      tesisList: [],
      newTesis: { titulo: "", fecha: "", autor: "" },
      selectedTesis: null, // Variable para almacenar la tesis seleccionada
      searchTerm: "", // Término de búsqueda
      isAuthorizedUser: false, // Variable para verificar si el usuario está autorizado
    };
  },
  methods: {
    // Método para cargar tesis
    async fetchTesis() {
      try {
        const response = await axios.get("http://localhost/proyecto/login/backend/API/tesisAPI.php");
        if (response.status === 200) {
          this.tesisList = response.data;
        } else {
          console.error("Error al cargar las tesis:", response.data.message);
        }
      } catch (error) {
        console.error("Error en la solicitud GET:", error);
      }
    },
    // Verificar si el usuario está autorizado (simulando con localStorage)
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
    // Método para visualizar PDF de tesis o revista
    viewPDF(pdfUrl) {
      this.selectedTesis = pdfUrl + '#view=FitH&zoom=100&embedded=true';
    },
    // Método para cerrar el visor de PDF
    closeViewer() {
      this.selectedTesis = null;
    },
    filterTesis() {
      const searchTerm = this.searchTerm.toLowerCase(); // Convertir a minúsculas para búsqueda sin distinción de mayúsculas
      if (searchTerm === "") {
        // Si el campo de búsqueda está vacío, no se filtra nada, se muestra todo
        this.filteredTesis = this.tesisList;
      } else {
        // Filtrar las tesis que contienen el término de búsqueda en el título o autor
        this.filteredTesis = this.tesisList.filter(tesis => 
          tesis.titulo_tesis.toLowerCase().includes(searchTerm) || 
          tesis.autor_tesis.toLowerCase().includes(searchTerm)
        );
      }
    },
    async addTesis() {
      const formData = new FormData();
      formData.append("titulo_tesis", this.newTesis.titulo);
      formData.append("fecha_publicacion_tesis", this.newTesis.fecha);
      formData.append("autor_tesis", this.newTesis.autor);

      if (this.$refs.tesisFile.files && this.$refs.tesisFile.files.length > 0) {
        formData.append("tesis", this.$refs.tesisFile.files[0]);
      } else {
        alert("Por favor, selecciona un archivo PDF.");
        return;
      }

      try {
        const response = await axios.post("http://localhost/proyecto/login/backend/API/tesisAPI.php", formData, {
          headers: { "Content-Type": "multipart/form-data" }
        });

        if (response.data.message === "Tesis registrada correctamente") {
          alert("Tesis registrada con éxito");
          this.fetchTesis();
          this.newTesis = { titulo: "", fecha: "", autor: "" };
          this.$refs.tesisFile.value = null;
        } else {
          console.error("Error al registrar la tesis:", response.data.message);
        }
      } catch (error) {
        console.error("Error en la solicitud POST:", error);
      }
    },
    async deleteTesis(id_tesis) {
      try {
        const response = await axios.delete("http://localhost/proyecto/login/backend/API/tesisAPI.php", {
          data: { id_tesis }, // Asegúrate de enviar los datos correctamente
        });

        if (response.data.message === "Tesis eliminada exitosamente") {
          Swal.fire({
            icon: "success",
            title: "¡Eliminada!",
            text: "La tesis fue eliminada con éxito.",
            confirmButtonText: "Aceptar",
          });
          this.fetchTesis(); // Recarga las tesis
        } else {
          console.error("Error al eliminar la tesis:", response.data.message);
        }
      } catch (error) {
        console.error("Error al intentar eliminar la tesis:", error);
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "No se pudo eliminar la tesis.",
          confirmButtonText: "Aceptar",
        });
      }
    },
    toggleDarkMode() {
      this.darkMode = !this.darkMode;
      document.body.classList.toggle("dark-mode", this.darkMode);
    }
  },

  mounted() {
    this.fetchTesis();
    this.checkAuthorization(); // Verificar si el usuario está autenticado al montar el componente
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
/* Modo oscuro para las tablas */
body.dark-mode .tesis-table {
  background-color: #333333; /* Fondo oscuro para la tabla */
  color: #ffffff;  /* Texto blanco para la tabla */
}

body.dark-mode .tesis-table th,
body.dark-mode .tesis-table td {
  border: 1px solid #555555;  /* Borde más oscuro para las celdas */
}

body.dark-mode .tesis-table th {
  background-color: #444444; /* Fondo más oscuro para los encabezados */
}

body.dark-mode .tesis-table td {
  background-color: #222222; /* Fondo más oscuro para las filas */
}

body.dark-mode .tesis-table a {
  color: #ffd700;  /* Color de los enlaces en modo oscuro */
}

body.dark-mode .tesis-table a:hover {
  text-decoration: underline;
}
/* Modo oscuro para el formulario */
body.dark-mode .form-container {
  background-color: #2c2c2c; /* Fondo oscuro para el contenedor del formulario */
  color: white; /* Color de texto blanco para los formularios */
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Agregar sombra para el formulario */
}
body.dark-mode .form-container .form {
  background-color: #2c2c2c;
}
body.dark-mode .form-group label {
  color: black; /* Color blanco para las etiquetas */
}

body.dark-mode .form-group input[type="text"],
body.dark-mode .form-group input[type="date"],
body.dark-mode .form-group input[type="file"] {
  color: white; /* Color de texto blanco dentro de los campos */
  border: 1px solid #555555; /* Borde más oscuro para los campos */
}

body.dark-mode .form-group input[type="text"]:focus,
body.dark-mode .form-group input[type="date"]:focus,
body.dark-mode .form-group input[type="file"]:focus {
  background-color: #666666; /* Fondo más claro para los campos cuando estén en foco */
  border-color: #ffd700; /* Borde dorado cuando el campo está enfocado */
}

body.dark-mode .btn-submit {
  background-color: #003366; /* Fondo del botón más oscuro */
  color: white; /* Texto blanco en los botones */
  border: none;
  cursor: pointer;
}

body.dark-mode .btn-submit:hover {
  background-color: #0059b3; /* Cambio de color cuando el botón está en hover */
}

body.dark-mode .btn-delete {
  background-color: #e74c3c; /* Fondo rojo para el botón de eliminar */
  color: white; /* Texto blanco en el botón de eliminar */
}

body.dark-mode .btn-delete:hover {
  background-color: #c0392b; /* Cambio de color cuando el botón de eliminar está en hover */
}

body.dark-mode .footer-column h3,
body.dark-mode .footer-column ul li a {
  color: #ffffff; /* Color de los textos en el footer en modo oscuro */
}

/* Otros ajustes para elementos interactivos */
body.dark-mode #toggleDark {
  color: #ffd700; /* Cambiar el color del ícono cuando se está en modo oscuro */
}
/* Estilos para las pestañas */
.tab-container {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.tab-container button {
  background-color: #f0f0f0;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px 20px;
  margin: 0 5px;
  cursor: pointer;
  font-weight: bold;
  transition: background-color 0.3s, color 0.3s;
}

.tab-container button:hover {
  background-color: #ddd;
}

.tab-container button.active {
  background-color: #003366;
  color: white;
}

/* Estilos generales */
.tesis-container,
.revistas-container {
  padding: 20px;
}

.tesis-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.tesis-table th,
.tesis-table td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: center;
}

.tesis-table th {
  background-color: #003366;
  color: white;
}

.tesis-table td {
  background-color: #f9f9f9;
}

.download-link {
  color: #003366;
  text-decoration: none;
}

.download-link:hover {
  text-decoration: underline;
}

/* Estilos del formulario */
.form-container {
  padding: 20px;
  margin-top: 30px;
  background-color: #f7f7f7;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
input[type="file"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.btn-submit {
  background-color: #003366;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.btn-submit:hover {
  background-color: #0059b3;
}

.btn-delete {
  background-color: #e74c3c;
  color: white;
  padding: 8px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.btn-delete:hover {
  background-color: #c0392b;
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

