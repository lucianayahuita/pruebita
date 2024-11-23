
import { createRouter, createWebHistory } from 'vue-router';

// Importación de componentes desde las vistas
import IndexPage from '@/views/IndexPage.vue'; 
import ActividadesPage from '@/views/ActividadesPage.vue';
import NoticiasPage from '@/views/NoticiasPage.vue';
import RepositorioPage from '@/views/RepositorioPage.vue'; // Corregir el nombre del archivo aquí
import SociedadCientifica from '@/views/SociedadCientifica.vue';
import Personal_Docente from '@/views/Personal_Docente.vue';
import LoginPage from '@/views/LoginPage.vue';


const routes = [
  { path: '/', name: 'IndexPage', component: IndexPage },
  { path: '/ActividadesPage', name: 'ActividadesPage', component: ActividadesPage },
  { 
    path: '/FormacionPage', 
    name: 'FormacionPage', 
    beforeEnter() {
      // Redirigir a la URL externa
      window.location.href = 'https://lpz.ucb.edu.bo/derecho-y-ciencias-politicas/';
    }
  },
  { path: '/NoticiasPage', name: 'NoticiasPage', component: NoticiasPage },
  { path: '/RepositorioPage', name: 'RepositorioPage', component: RepositorioPage },
  { path: '/SociedadCientifica', name: 'SociedadCientifica', component: SociedadCientifica },
  { path: '/Personal_Docente', name: 'Personal_Docente', component: Personal_Docente },
  { path: '/LoginPage', name: 'LoginPage', component: LoginPage },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes, // tus rutas definidas
});

export default router;

