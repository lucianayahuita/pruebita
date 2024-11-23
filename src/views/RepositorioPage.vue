<template>
  <div>
    <nav>
      <div class="imgnav">
        <!-- Uso de la ruta relativa correcta para Vue.js -->
        <img src="@/assets/CPO - H2.png" alt="Logo" height="100" width="140" />
      </div>
      <router-link to="/IndexPage" class="menu">Inicio</router-link>
      <router-link to="/ActividadesPage" class="menu">Actividades</router-link>
      <router-link to="/FormacionPage" class="menu">Postgrado</router-link>
      <router-link to="/NoticiasPage" class="menu">Noticias</router-link>
      <router-link to="/RepositorioPage" class="menu">Publicaciones</router-link>
      <router-link to="/sociedadCientifica" class="menu">Sociedad Científica</router-link>
      <router-link to="/Personal_Docente" class="menu">Personal Docente</router-link>
      <router-link to="/LoginPage" class="menu">Login</router-link>
    </nav>

    <!-- Pestañas para alternar entre Tesis y Revistas -->
    <div class="tab-container">
      <button @click="currentTab = 'tesis'" :class="{ active: currentTab === 'tesis' }">Tesis</button>
      <button @click="currentTab = 'revistas'" :class="{ active: currentTab === 'revistas' }">Revistas</button>
    </div>

    <!-- Gestión de Tesis -->
    <div v-if="currentTab === 'tesis'" class="tesis-container">
      <h1>Repositorio de Tesis</h1>
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
              <a :href="tesis.tesis" target="_blank" download class="download-link">Descargar</a>
            </td>
            <td>
              <button @click="deleteTesis(tesis.id_tesis)" class="btn-delete">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>

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

    <!-- Gestión de Revistas -->
    <div v-if="currentTab === 'revistas'" class="revistas-container">
      <h1>Repositorio de Revistas</h1>
      <table class="tesis-table">
        <thead>
          <tr>
            <th>Número</th>
            <th>Tema</th>
            <th>Fecha de Publicación</th>
            <th>Revista (PDF)</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="revista in revistaList" :key="revista.id_revista">
            <td>{{ revista.numero }}</td>
            <td>{{ revista.tema_revista }}</td>
            <td>{{ revista.fecha_publicacion_revista }}</td>
            <td>
              <a :href="revista.revista" target="_blank" download class="download-link">Descargar</a>
            </td>
            <td>
              <button @click="deleteRevista(revista.id_revista)" class="btn-delete">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>

      <h2>Registrar Revista</h2>
      <form @submit.prevent="addRevista" enctype="multipart/form-data">
        <div class="form-group">
          <label for="numero">Número:</label>
          <input v-model="newRevista.numero" type="text" id="numero" required />
        </div>
        <div class="form-group">
          <label for="tema">Tema:</label>
          <input v-model="newRevista.tema" type="text" id="tema" required />
        </div>
        <div class="form-group">
          <label for="archivo">Archivo (PDF):</label>
          <input ref="revistaFile" type="file" id="archivo" accept="application/pdf" required />
        </div>
        <button type="submit" class="btn-submit">Registrar Revista</button>
      </form>
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
</template>

<script>
import axios from "axios";

export default {
  name: "RepositorioPage",
  data() {
    return {
      currentTab: "tesis", // Para alternar entre Tesis y Revistas
      tesisList: [],
      revistaList: [],
      newTesis: { titulo: "", fecha: "", autor: "" },
      newRevista: { numero: "", tema: "" },
    };
  },
  methods: {
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
    async fetchRevistas() {
      try {
        const response = await axios.get("http://localhost/proyecto/login/backend/API/revistaAPI.php");
        if (response.status === 200) {
          this.revistaList = response.data;
        } else {
          console.error("Error al cargar las revistas:", response.data.message);
        }
      } catch (error) {
        console.error("Error en la solicitud GET:", error);
      }
    },
    async addRevista() {
      const formData = new FormData();
      formData.append("numero", this.newRevista.numero);
      formData.append("tema_revista", this.newRevista.tema);
      if (this.$refs.revistaFile.files && this.$refs.revistaFile.files.length > 0) {
        formData.append("revista", this.$refs.revistaFile.files[0]);
      } else {
        alert("Por favor, selecciona un archivo PDF.");
        return;
      }

      try {
        const response = await axios.post("http://localhost/proyecto/login/backend/API/revistaAPI.php", formData, {
          headers: { "Content-Type": "multipart/form-data" },
        });
        if (response.data.message === "Revista registrada correctamente") {
          alert("Revista registrada con éxito");
          this.fetchRevistas(); // Recarga la lista de revistas
          this.newRevista = { numero: "", tema: "" }; // Resetea los campos
          this.$refs.revistaFile.value = null; // Limpia el input file
        } else {
          console.error("Error al registrar la revista:", response.data.message);
        }
      } catch (error) {
        console.error("Error en la solicitud POST:", error);
      }
    },
    async deleteRevista(id) {
      try {
        const response = await axios.delete("http://localhost/proyecto/login/backend/API/revistaAPI.php", {
          data: JSON.stringify({ id_revista: id }),
          headers: { "Content-Type": "application/json" },
        });
        if (response.data.message === "Revista eliminada exitosamente") {
          alert("Revista eliminada con éxito");
          this.fetchRevistas(); // Recarga la lista de revistas
        } else {
          console.error("Error al eliminar la revista:", response.data.message);
        }
      } catch (error) {
        console.error("Error en la solicitud DELETE:", error);
      }
    },
  },
  mounted() {
    this.fetchTesis();
    this.fetchRevistas();
  },
};
</script>


<style>
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

