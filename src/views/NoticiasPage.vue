<template>
  <body>
    <div>
    <!-- Filtro de Categorías -->
    <div class="container-category">
      <input type="radio" id="TODOS" value="TODOS" name="category" checked />
      <label for="TODOS">Todos</label>

      <input type="radio" id="CONFERENCIAS" value="CONFERENCIAS" name="category" />
      <label for="CONFERENCIAS">CONFERENCIAS</label>

      <input type="radio" id="SEMINARIOS" value="SEMINARIOS" name="category" />
      <label for="SEMINARIOS">SEMINARIOS</label>

      <input type="radio" id="GRADUACIONES" value="GRADUACIONES" name="category" />
      <label for="GRADUACIONES">GRADUACIONES</label>

      <input type="radio" id="VISITAS" value="VISITAS" name="category" />
      <label for="VISITAS">VISITAS</label>

      <input type="radio" id="PUBLICACIONES" value="PUBLICACIONES" name="category" />
      <label for="PUBLICACIONES">PUBLICACIONES</label>
    </div>

    <!-- Contenedor de publicaciones -->
    <div class="container-post">
      <div class="posts">
        <div 
          v-for="post in posts" 
          :key="post.id" 
          class="post" 
          :data-category="post.category"
        >
          <div class="ctn-img">
            <img :src="require('@/assets/gatoprueba.jpg')" alt="Imagen noticia" />
          </div>
          <h2>{{ post.title }}</h2>
          <span>{{ post.date }}</span>
          <ul class="ctn-tag">
            <li v-for="tag in post.tags" :key="tag">{{ tag }}</li>
          </ul>
          <p v-if="!post.showFullContent">{{ post.shortContent }}</p>
          <p v-else>{{ post.fullContent }}</p>
          <button @click="toggleContent(post)">
            {{ post.showFullContent ? 'Leer menos' : 'Leer más' }}
          </button>
        </div>
      </div>

      <!-- Formulario de Nueva Noticia (solo para usuarios autorizados) -->
      <div v-if="isAuthorizedUser" class="new-post-form">
        <h2>Ingresar Nueva Noticia</h2>
        <form @submit.prevent="submitNews" class="form-container">
          <div class="form-group">
            <label for="title">Título:</label>
            <input v-model="newPost.title" type="text" id="title" class="form-control" required />
          </div>

          <div class="form-group">
            <label for="content">Contenido:</label>
            <textarea v-model="newPost.content" id="content" rows="5" class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label for="category">Categoría:</label>
            <select v-model="newPost.category" id="category" class="form-control">
              <option value="CONFERENCIAS">CONFERENCIAS</option>
              <option value="SEMINARIOS">SEMINARIOS</option>
              <option value="GRADUACIONES">GRADUACIONES</option>
              <option value="VISITAS">VISITAS</option>
              <option value="PUBLICACIONES">PUBLICACIONES</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Publicar Noticia</button>
        </form>
      </div>
    </div>
  </div>
  </body>
</template>

<script>
export default {
  name: 'NoticiasPage',
  data() {
    return {
      isAuthorizedUser: true, // Cambia a "false" si el usuario no tiene permisos de administrador
      posts: [
        {
          id: 1,
          title: "Cómo crear una página web tipo blog",
          image: require("@/assets/gatoprueba.jpg"), // Carga de imagen de assets
          date: "26 febrero 2020 - 1:32 am",
          tags: ["HTML", "CSS", "JS"],
          category: "CSS",
          shortContent: "Este es un resumen corto de la noticia.",
          fullContent: "Este es el contenido completo de la noticia. Aquí puedes poner todo el detalle del artículo que desees mostrar.",
          showFullContent: false, // Controla si el contenido completo se muestra o no
        },
        {
          id: 2,
          title: "Cómo hacer un slider de comparación de imágenes",
          image: require("@/assets/gatoprueba.jpg"),
          date: "26 febrero 2020 - 1:32 am",
          tags: ["HTML"],
          category: "HTML",
          shortContent: "En este artículo veremos cómo hacer un slider comparativo de imágenes.",
          fullContent: "Aquí viene todo el detalle de cómo hacer un slider de comparación de imágenes paso a paso. Agrega la implementación de HTML, CSS, y JavaScript.",
          showFullContent: false,
        },
      ],
      newPost: {
        title: "",
        content: "",
        category: "HTML",
      },
    };
  },
  methods: {
    toggleContent(post) {
      post.showFullContent = !post.showFullContent;
    },
    submitNews() {
      const newPostData = {
        id: this.posts.length + 1,
        title: this.newPost.title,
        content: this.newPost.content,
        category: this.newPost.category,
        date: new Date().toLocaleString(),
        tags: [this.newPost.category],
        shortContent: this.newPost.content.substring(0, 100), // Resumen corto de la noticia
        fullContent: this.newPost.content,
        showFullContent: false,
        image: require('@/assets/gatoprueba.jpg'), // Imagen por defecto
      };

      // Agregar la nueva noticia a la lista de noticias
      this.posts.unshift(newPostData);

      // Limpiar formulario
      this.newPost = { title: "", content: "", category: "HTML" };
    },
  },
};
</script>

<style scoped>
/* Establecer fondo blanco para toda la página */
body {
  background-color: rgba(216, 175, 175, 0.815); /* Cambia el fondo de la página a blanco */
  font-family: 'Arial', sans-serif; /* Puedes ajustar la tipografía */
  margin: 0;
  padding: 0;
}

/* Filtro de categorías */
input[type="radio"] {
  display: none;
}

.container-category {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  margin-top: 20px;
}

.container-category label {
  padding: 6px 40px;
  margin: 10px;
  font-size: 20px;
  background: #e2e2e2;
  border-radius: 5px;
  cursor: pointer;
}

.container-category label:hover {
  opacity: 0.8;
}

/* Sistema de filtrado */
[value="TODOS"]:checked ~ .posts .post[data-category] {
  display: block;
}

[value="HTML"]:checked ~ .posts .post:not([data-category~="HTML"]),
[value="CSS"]:checked ~ .posts .post:not([data-category~="CSS"]),
[value="JS"]:checked ~ .posts .post:not([data-category~="JS"]),
[value="PHP"]:checked ~ .posts .post:not([data-category~="PHP"]),
[value="NODEJS"]:checked ~ .posts .post:not([data-category~="NODEJS"]),
[value="VUE"]:checked ~ .posts .post:not([data-category~="VUE"]) {
  display: none;
}

[value="TODOS"]:checked ~ .container-category [for="TODOS"],
[value="HTML"]:checked ~ .container-category [for="HTML"],
[value="CSS"]:checked ~ .container-category [for="CSS"],
[value="JS"]:checked ~ .container-category [for="JS"],
[value="PHP"]:checked ~ .container-category [for="PHP"],
[value="NODEJS"]:checked ~ .container-category [for="NODEJS"],
[value="VUE"]:checked ~ .container-category [for="VUE"] {
  background: #46a2fd;
  color: #fff;
}

/* Estilos de publicaciones */
.container-post {
  max-width: 1200px;
  margin: 0 auto; /* Centra el contenedor */
  padding: 20px;
}

.posts {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 20px;
  justify-items: center; /* Centra los elementos dentro del grid */
}

.posts .post {
  background: #fff;
  box-shadow: 0 0 20px -20px black;
  border-radius: 6px;
  padding-bottom: 20px;
  display: flex;
  flex-direction: column;
  height: 100%;
  max-width: 300px; /* Establece un tamaño máximo para las publicaciones */
  overflow: hidden;
}

.ctn-img img {
  max-width: 100%;
  height: auto;
  border-radius: 6px 6px 0 0;
}

h2 {
  padding: 10px;
}

.ctn-tag {
  margin: 10px 0;
  display: flex;
  gap: 10px;
}

.ctn-tag li {
  background: #f0f0f0;
  border-radius: 5px;
  padding: 3px 10px;
}

button {
  margin-top: 10px;
  background: #46a2fd;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background: #3578e5;
}

/* Formulario de nueva noticia */
.form-container {
  max-width: 600px;
  margin: 20px auto;
  padding: 20px;
  background: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  font-weight: bold;
}

.form-control {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-control:focus {
  border-color: #46a2fd;
  outline: none;
}

.btn-primary {
  background-color: #46a2fd;
  border-color: #46a2fd;
  color: white;
  padding: 10px 20px;
  font-size: 16px;
  border-radius: 4px;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #3578e5;
  border-color: #3578e5;
}

.post button {
  padding: 10px 6px; /* Reduce el padding para que el botón sea más pequeño */
  font-size: 14px;   /* Disminuye el tamaño de la fuente */
  border-radius: 60px; /* Mantén un borde redondeado moderado */
  background-color: #46a2fd;
  color: white;
  border: none;
  cursor: pointer;
}

.post button:hover {
  background-color: #3578e5; /* Cambia el color del botón al pasar el mouse */
}

</style>
