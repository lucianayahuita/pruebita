<template>
  <div id="app">
    <!-- Mostrar el contenido de las rutas en un 'router-view' -->
    <router-view :is-authorized="isAuthorizedUser"></router-view> <!-- Pasar la autorización al router-view -->
    <!-- Icono de modo oscuro que se puede pulsar -->
    <i class="bi bi-brightness-high-fill" id="toggleDark" @click="toggleDarkMode"></i>
  </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      isAuthorizedUser: false,  // Variable que controla si el usuario está autorizado
    };
  },
  mounted() {
    // Verificar si el usuario está autorizado al montar el componente
    this.checkAuthorization(); 

    // Al montar el componente, verificar si el modo oscuro está activo en localStorage
    if (localStorage.getItem('darkMode') === 'true') {
      document.body.classList.add('dark-mode');  // Aplicar el modo oscuro
    }
  },
  methods: {
    // Método para verificar la autorización del usuario
    checkAuthorization() {
      const isAuthorized = localStorage.getItem("isAuthorizedUser");

      // Solo autorizados "carlos" o "mdiez" podrán acceder
      if (isAuthorized === "carlos" || isAuthorized === "mdiez") {
        this.isAuthorizedUser = true;  // Si el usuario es "carlos" o "mdiez", es autorizado
      } else {
        this.isAuthorizedUser = false; // Si no es válido, no se autoriza
        localStorage.removeItem('isAuthorizedUser');  // Limpiar cualquier valor previo
      }
    },

    toggleDarkMode() {
      // Comprobar si el modo oscuro está activado
      const isDarkMode = document.body.classList.contains('dark-mode');
      if (isDarkMode) {
        document.body.classList.remove('dark-mode');  // Desactivar modo oscuro
        localStorage.setItem('darkMode', 'false');  // Guardar el estado
      } else {
        document.body.classList.add('dark-mode');  // Activar modo oscuro
        localStorage.setItem('darkMode', 'true');  // Guardar el estado
      }
    }
  }
};
</script>

<style>
/* Estilos globales */
@import 'font-awesome/css/font-awesome.min.css';
body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f9f9f9;
  color: #333;
}

body.dark-mode {
  background-color: #121212;  /* Fondo oscuro para todo el body */
  color: #ffffff;  /* Texto blanco en todo el body */
}

body.dark-mode nav {
  background-color: #1a1a1a; /* Fondo oscuro para el nav */
}

body.dark-mode nav a {
  color: #ffffff; /* Enlaces blancos en el nav */
}

body.dark-mode .split-section {
  background-color: #333333; /* Fondo oscuro para las secciones */
}

body.dark-mode .card-section {
  background-color: #222222; /* Fondo oscuro para las tarjetas */
}

body.dark-mode .footer-content {
  background-color: #222222; /* Fondo oscuro para el footer */
}

body.dark-mode .interactive-card-section {
  background-color: #222222; /* Fondo oscuro para las secciones interactivas */
}

body.dark-mode .card-grid .card {
  background-color: #293737;  /* Fondo oscuro para las tarjetas */
}

body.dark-mode .card-content {
  color: white;  /* Texto blanco dentro de las tarjetas */
}

body.dark-mode #toggleDark {
  color: #ffd700;  /* Cambiar el color del ícono de modo oscuro en el modo oscuro */
}
</style>

