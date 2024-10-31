<template>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <div class="wrapper">
        <h1 id="h1" class="text-center">Inicio de sesión</h1>
        <div class="formContent">
            <form v-on:submit.prevent="login">
                <div class="form-group">
                    <input type="text" id="login" class="form-control mb-2" placeholder="Usuario" v-model="usuario" required>
                    <input type="password" id="password" class="form-control mb-2" placeholder="Contraseña" v-model="password" required>
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                </div>
            </form>
            <div id="acciones" class="mt-3">
                <button @click="register" class="btn btn-secondary btn-block">Crear cuenta</button>
                <button @click="authWithGoogle" class="btn btn-danger btn-block">Iniciar sesión con Google</button>
            </div>
            <p v-if="error" class="text-danger">{{ error_msg }}</p>
        </div>
    </div>
  </body>
  </html>
</template>

<script>
export default {
  name: 'MyComponent',
  data() {
    return {
      usuario: "",
      password: "",
      error: false,
      error_msg: "",
    };
  },
  methods: {
    login() {
      // Implementar la lógica de inicio de sesión aquí
    },
    register() {
      // Redirigir al usuario a la página de registro
    },
    authWithGoogle() {
      // Implementar la lógica de autenticación con Google
    }
  }
}
</script>

<style scoped>
body {
  margin: 0;
  background-color: #EDA82B;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  max-width: 450px;
  background-color: #EDA82B;
}

.formContent {
  width: 100%;
  padding: 80px;
  box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
  background-color: white;
  border-radius: 8px;
}

.form-group {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.form-control {
  width: 100%;
  max-width: 300px;
}

.btn-group {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
}
.mt-3{
  
}
h1 {
  color: white;
  margin-bottom: 20px;
}

</style>
