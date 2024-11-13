import { createApp } from 'vue';
import App from './App.vue';
import router from './router'; // Importar el router
import VCalendar from 'v-calendar';
import 'v-calendar/dist/style.css'; // No olvides importar los estilos
createApp(App)
  .use(router) // Usar el router en la aplicación
  .use(VCalendar) 
  .mount('#app');
