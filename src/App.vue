<template>

  <div id="app">
    <!-- Elementos comunes opcionales (como un encabezado o pie de página) -->
    <!-- Contenedor principal para cargar vistas dinámicamente -->
    <router-view />
  </div>
  
</template>

<script>
export default {
  name: 'App',
};
</script>

<style>
/* Estilos globales */
body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f9f9f9;
  color: #333;
}
</style>
