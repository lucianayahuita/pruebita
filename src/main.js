import { createApp } from 'vue';
import App from './App.vue';
import router from './router'; // Importar el router

createApp(App)
  .use(router) // Usar el router en la aplicación
  .mount('#app');
