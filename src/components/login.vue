<template>
    <!DOCTYPE html>
    <html lang="en">
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina de Registro</title>
        <link rel="stylesheet" href="estilos.css"> 
    </head>
    <body>
        <form action="" method="POST" id="form">
            <div class="form">
                <h1>Registro</h1>
                <div class="grupo"> 
                    <input type="text" name="nombre" id="nombre">
                    <span class="barra"></span>
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="grupo"> 
                    <input type="email" name="email" id="email">
                    <span class="barra"></span>
                    <label for="email">Email:</label>
                </div>
                <div class="grupo"> 
                    <input type="password" name="password" id="password">
                    <span class="barra"></span>
                    <label for="password">Contraseña:</label>
                </div>
                <button type="submit">Registrarte</button>
                <p class="warnings" id="warnings"></p>
            </div>
        </form>
    </body>
    </html>
</template>

<script>
export default {
  name: "LoginForm",
  methods: {
    validateForm() {
      const nombre = document.getElementById("nombre");
      const email = document.getElementById("email");
      const password = document.getElementById("password");
      const parrafo = document.getElementById("warnings");
      let warnings = "";
      let entrar = false;
      let regexEmail = /^\w+([.-]?\w+)@\w+([.-]?\w+)(\.\w{2,3})+$/;

      parrafo.innerHTML = "";

      if (nombre.value.length < 6) {
        warnings += "El nombre no es válido <br>";
        entrar = true;
      }
      if (!regexEmail.test(email.value)) {
        warnings += "El Email no es válido <br>";
        entrar = true;
      }
      if (password.value.length < 8) {
        warnings += "La contraseña no es válida <br>";
        entrar = true;
      }

      parrafo.innerHTML = entrar ? warnings : "Enviado con éxito!";
    },
  },
};
</script>

<style scoped>
    body {
        background: #005AA7;
        background: -webkit-linear-gradient(to right, #FFFDE4, #005AA7);
        background: linear-gradient(to right, #FFFDE4, #005AA7);
        height: 100vh; 
        margin: 0; 
        display: flex;
        justify-content: center;
        align-items: center;
    }

    h1 {
        text-align: center;
        font-weight: 700;
    }

    form {
        background: #FFF;
        padding: 40px 20px;
        box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        width: 100%;
        max-width: 300px;
    }

    .form {
        width: 100%;
        margin: auto;
    }

    form .grupo {
        position: relative;
        margin: 45px 0;
    }

    input {
        background: none;
        color: #5e5d5d;
        font-size: 18px;
        padding: 10px 5px;
        display: block;
        width: 100%;
        border: none;
        border-bottom: 1px solid #ccc;
    }

    input:focus {
        outline: none;
        color: #333;
    }

    label {
        color: #999;
        font-size: 16px;
        position: absolute;
        bottom: 10px;
        left: 5px;
        transition: 0.5s ease-in-out all;
        pointer-events: none;
    }

    input:focus ~ label,
    input:valid ~ label {
        top: -20px;
        font-size: 12px;
        color: #2196f3;
    }
    .barra{
        position: relative;
        display: block;
        width: 100%;
    }
    .barra::before{
        content: "";
        height: 2px;
        width: 0%;
        bottom: 0;
        position: absolute;
        background: linear-gradient(to right, #FFFDE4, #005AA7);
        transition: 0.3s ease width;
        left: 0;

    }

    input:focus~.barra::before {
        width: 100%;
    }

    button{
        font-family: 'roboto';
        background: #005AA7;
        background: -webkit-linear-gradient(to right, #FFFDE4, #005AA7);
        background: linear-gradient(to right, #FFFDE4, #005AA7);
        border: none;
        display: block;
        width: 80%;
        margin: 10px auto;
        height: 40px;
        color: #FFF;
        font-size: 16px;
        cursor: pointer;
    }
    @media screen and (max-width:500px){
        form{
            width: 80%;
        }
    }
    .warnings{
        width: 200px;
        text-align: center;
        margin: auto;
        color: #005AA7;
        padding-top: 20px;
    }
</style>