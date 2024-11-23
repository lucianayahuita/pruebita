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
    </nav>
  </div>
  <div class="calendar-container">
    <!-- Sección del calendario -->
    <div class="calendar-widget">
      <div class="current-day">
        <h1>{{ currentDay }}</h1>
        <p>{{ currentWeekday }}</p>
        <p>Eventos actuales:</p>
        <ul>
          <li v-for="event in currentEvents" :key="event.id">
            {{ event.title }} - {{ formatDate(event.start) }}
          </li>
        </ul>
        <button @click="toggleForm" class="btn-create">Crear Evento</button>
      </div>
      <div class="calendar">
        <h1>Calendario</h1>
        <v-calendar
          v-model="selectedDate"
          :attributes="calendarAttributes"
          is-expanded
          class="custom-calendar"
        ></v-calendar>
      </div>
    </div>

    <!-- Formulario para crear un evento -->
    <div v-if="showForm" class="event-form">
      <h2>Crear Nueva Actividad</h2>
      <form @submit.prevent="addEvent">
        <div class="form-group">
          <label for="title">Nombre de la Actividad:</label>
          <input v-model="newEvent.title" type="text" id="title" required />
        </div>
        <div class="form-group">
          <label for="date">Fecha de la Actividad:</label>
          <input v-model="newEvent.date" type="date" id="date" required />
        </div>
        <div class="form-group">
          <label for="time">Hora de la Actividad:</label>
          <input v-model="newEvent.time" type="time" id="time" required />
        </div>
        <div class="form-group">
          <label for="location">Lugar de la Actividad:</label>
          <input v-model="newEvent.location" type="text" id="location" required />
        </div>
        <button type="submit" class="btn-submit">Guardar Evento</button>
      </form>
    </div>

    <!-- Tarjetas de eventos -->
    <div class="event-cards">
      <h2>Actividades Programadas</h2>
      <div class="event-cards-container">
        <div v-for="event in events" :key="event.id" class="event-card">
          <img
            class="event-image"
            src="https://cdn-icons-png.flaticon.com/512/2921/2921222.png"
            alt="Evento"
          />
          <h3 class="event-date">{{ formatDate(event.start) }}</h3>
          <h3>{{ event.title }}</h3>
          <p><strong>Hora:</strong> {{ formatTime(event.start) }}</p>
          <p><strong>Lugar:</strong> {{ event.location }}</p>
          <button @click="deleteEvent(event.id)" class="btn-complete">
            Eliminar
          </button>
        </div>
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
import "v-calendar/dist/style.css";

export default {
  name: "ActividadesPage",
  data() {
    return {
      selectedDate: new Date(),
      showForm: false,
      newEvent: {
        title: "",
        date: "",
        time: "",
        location: "",
      },
      events: [],
    };
  },
  computed: {
    currentDay() {
      return new Date(this.selectedDate).toLocaleDateString("es-ES", {
        day: "2-digit",
        month: "long",
        year: "numeric",
      });
    },
    currentWeekday() {
      return new Date(this.selectedDate).toLocaleDateString("es-ES", {
        weekday: "long",
      });
    },
    currentEvents() {
      return this.events.filter((event) =>
        event.start.startsWith(this.selectedDate.toISOString().split("T")[0])
      );
    },
    calendarAttributes() {
      return this.events.map((event) => ({
        dates: event.start.split("T")[0],
        customData: event,
        style: { backgroundColor: "#ffcccb", color: "#000" },
      }));
    },
  },
  methods: {
    async fetchEvents() {
      try {
        const response = await axios.get(
          "http://localhost/proyecto/login/backend/API/actividadAPI.php"
        );
        console.log("Respuesta de la API:", response.data);

        if (response.status === 200 && Array.isArray(response.data)) {
          this.events = response.data.map((actividad) => ({
            id: actividad.id_actividad,
            title: actividad.nombre_actividad,
            start: `${actividad.fecha_actividad}T${actividad.hora_actividad}`,
            end: `${actividad.fecha_actividad}T${actividad.hora_actividad}`,
            location: actividad.lugar_actividad,
          }));
        } else {
          console.error(
            "La respuesta no es válida o no contiene un array:",
            response.data
          );
        }
      } catch (error) {
        console.error("Error en la solicitud GET:", error);
      }
    },
    async addEvent() {
      if (
        !this.newEvent.title ||
        !this.newEvent.date ||
        !this.newEvent.time ||
        !this.newEvent.location
      ) {
        alert("Por favor, completa todos los campos antes de guardar.");
        return;
      }

      try {
        const newEvent = new FormData();
        newEvent.append("nombre_actividad", this.newEvent.title);
        newEvent.append("fecha_actividad", this.newEvent.date);
        newEvent.append("hora_actividad", this.newEvent.time);
        newEvent.append("lugar_actividad", this.newEvent.location);

        const response = await axios.post(
          "http://localhost/proyecto/login/backend/API/actividadAPI.php",
          newEvent,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        );

        if (response.data.message === "Actividad registrada correctamente") {
          alert("Evento guardado con éxito");
          this.fetchEvents(); // Recarga la lista de eventos
          this.newEvent = { title: "", date: "", time: "", location: "" };
          this.showForm = false;
        } else {
          console.error("Error al guardar la actividad:", response.data.message);
        }
      } catch (error) {
        console.error("Error en la solicitud POST:", error);
      }
    },
    async deleteEvent(eventId) {
      try {
        const response = await axios.delete(
          "http://localhost/proyecto/login/backend/API/actividadAPI.php",
          {
            data: JSON.stringify({ id_actividad: eventId }),
            headers: {
              "Content-Type": "application/json",
            },
          }
        );
        if (response.data.message === "Actividad eliminada exitosamente") {
          alert("Actividad eliminada");
          this.fetchEvents();
        } else {
          console.error("Error al eliminar la actividad:", response.data.message);
        }
      } catch (error) {
        console.error("Error en la solicitud DELETE:", error);
      }
    },
    formatDate(dateTime) {
      const date = new Date(dateTime);
      return date.toLocaleDateString("es-ES", {
        day: "2-digit",
        month: "long",
        year: "numeric",
      });
    },
    formatTime(dateTime) {
      const date = new Date(dateTime);
      return date.toLocaleTimeString("es-ES", {
        hour: "2-digit",
        minute: "2-digit",
      });
    },
    toggleForm() {
      this.showForm = !this.showForm;
    },
  },
  mounted() {
    this.fetchEvents();
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
/* Estilos Globales */
.custom-calendar {
  width: 400px;
  height: 300px;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 30px;
  padding: 40px;
}

.vc-toolbar {
  background-color: blue !important; /* Cambia el color de la barra */
  color: white !important; /* Cambia el color del texto */
}

.calendar-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  padding: 20px;
  background-color: #f7f8fa;
}

.calendar-widget {
  display: flex;
  gap: 20px;
  background-color: white;
  padding: 20px;
  border-radius: 15px;
  width: 800px;
  height: 400px;
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.current-day {
  background-color: #fa8736;
  color: white;
  padding: 20px;
  border-radius: 15px;
  text-align: center;
  flex: 1;
}

.event-cards {
  margin-top: 20px;
  width: 100%;
  max-width: 800px;
}

.event-cards-container {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  justify-content: center; /* Centra las tarjetas horizontalmente */
}

.event-card {
  background-color: #5283ea;
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 15px;
  margin-bottom: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 200px; /* Tamaño fijo para las tarjetas */
}

.btn-complete {
  background-color: #fa3e3e;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
  margin-top: 10px;
}

.btn-complete:hover {
  background-color: #d32f2f;
}


.event-card .event-image {
  width: 150px;
  height: 150px;
  margin-bottom: 10px;
}

.event-date {
  font-size: 1.3em;
  color: white;
  text-align: center;
  font-weight: bold;
  margin-top: 10px;
}

.event-form {
  margin-top: 20px;
  background-color: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  width: 500px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
}

input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.btn-create {
  background-color: white;
  color: #37a7db;
  border: none;
  border-radius: 10px;
  padding: 10px 20px;
  font-weight: bold;
  cursor: pointer;
}

.btn-submit {
  background-color: orange;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
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
