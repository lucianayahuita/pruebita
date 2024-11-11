
import { createRouter, createWebHistory } from 'vue-router';

// Importación de componentes desde las vistas
import IndexPage from '@/views/IndexPage.vue'; 
import UCBPage from '@/views/UCBPage.vue';
import FormacionPage from '@/views/FormacionPage.vue';
import NoticiasPage from '@/views/NoticiasPage.vue';
import RepositorioPage from '@/views/RepositorioPage.vue'; // Corregir el nombre del archivo aquí
import SociedadCientifica from '@/views/SociedadCientifica.vue';
import UCBinternacional from '@/views/UCBinternacional.vue';
import LoginPage from '@/views/LoginPage.vue';


const routes = [
  { path: '/', name: 'IndexPage', component: IndexPage },
  { path: '/UCBPage', name: 'UCBPage', component: UCBPage },
  { path: '/FormacionPage', name: 'FormacionPage', component: FormacionPage },
  { path: '/NoticiasPage', name: 'NoticiasPage', component: NoticiasPage },
  { path: '/RepositorioPage', name: 'RepositorioPage', component: RepositorioPage },
  { path: '/SociedadCientifica', name: 'SociedadCientifica', component: SociedadCientifica },
  { path: '/UCBinternacional', name: 'UCBInternacional', component: UCBinternacional },
  { path: '/LoginPage', name: 'LoginPage', component: LoginPage },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes, // tus rutas definidas
});

export default router;

