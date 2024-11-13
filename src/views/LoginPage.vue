<template>
  <body>
    <div class="container">
    <div class="blueBg">
      <div class="box signin">
        <h2>¿Eres director de carrera?</h2>
        <button @click="toggleForm('signin')" class="signinBtn">Si</button>
      </div>
      <div class="box signup">
        <h2>¿Eres docente?</h2>
        <button @click="toggleForm('signup')" class="signupBtn">Si</button>
      </div>
    </div>
    <div :class="['formBx', { active: isSignupActive }]">
      <div class="form signinForm">
        <form action="../../php/phpLogin/loginTutor.php" method="post">
          <h3>Director de carrera</h3>
          <input type="text" placeholder="Usuario" name="ciTut">
          <input type="password" placeholder="Contraseña" name="codTut">
          <input type="submit" value="Ingresar">
          <a href="../../html/index/indexManEsc.html" class="forgot">Volver a la página PRINCIPAL</a>
        </form>
      </div>
      <div class="form signupForm">
        <form action="../../php/phpLogin/loginPatrocinado.php" method="post">
          <h3>Docente</h3>
          <input type="number" placeholder="Usuario" name="ciPat">
          <input type="password" placeholder="Contraseña" name="idPatrocinado">
          <input type="submit" value="Ingresar">
          <a href="src\views\IndexPage.vue" class="forgot">Volver a la página PRINCIPAL</a>
        </form>
      </div>
    </div>
  </div>
  </body>
</template>

<script>
export default {
  name: 'LoginPage',
  data() {
    return {
      isSignupActive: false,
    };
  },
  methods: {
    toggleForm(formType) {
      this.isSignupActive = formType === 'signup';
    },
  },
};
</script>
<style scoped>
body
{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #0078b7;
    transition: 0.5s;
}
body.active
{
    background: #cc0001;

}
.container
{
    position: relative;
    width: 800px;
    height: 500px;
    margin: 20px;
}
.blueBg
{
    position: absolute;
    top: 40px;
    width: 100%;
    height: 420px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 5px 45px rgba(0,0,0,0.15);
}
.blueBg .box
{
    position: relative;
    width: 50%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.blueBg .box h2
{
    color: #fff;
    font-size: 1.2em;
    font-weight: 500;
    margin-bottom: 10px;
}
.blueBg .box button
{
    cursor: pointer;
    padding: 10px 20px;
    background: #fff;
    color: #333;
    font-size: 16px;
    font-weight: 500;
    border: none;
}
.formBx
{
    position: absolute;
    top: 0;
    left: 0;
    width: 50%;
    height: 100%;
    background: #fff;
    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 5px 45px rgba(0,0,0,0.25);
    transition: 0.5s ease-in-out;
    overflow: hidden;
}
.formBx.active
{
    left: 50%;
}

.formBx .form
{
    position: absolute;
    left: 0;
    width: 100%;
    padding: 50px;
    transition: 0.5s;
}
.formBx .signinForm
{
    transition-delay: 0.25s;
}
.formBx.active .signinForm
{
    left: -100%;
    transition-delay: 0s;
}
.formBx .signupForm
{
    left: 100%;
    transition-delay: 0s;
}
.formBx.active .signupForm
{
    left: 0;
}
.formBx .form form
{
    width: 100%;
    display: flex;
    flex-direction: column;
}
.formBx .form form h3
{
    font-size: 1.5em;
    color: #333;
    margin-bottom: 20px;
    font-weight: 500;
}
.formBx .form form input
{
    width: 70%;
    margin-bottom: 20px;
    padding: 10px;
    outline: none;
    font-size: 16px;
    border: 1px solid #333;
}
.formBx .form form input[type="submit"]
{
    background: #0078b7;
    border: none;
    color: #fff;
    max-width: 100px;
    cursor: pointer;
}
.formBx.active .signupForm input[type="submit"]
{
    background: #cc0001;
}
.formBx .form form .forgot
{
    color: #333;
}

@media (max-width: 991px)
{
    .container
    {
        max-width: 400px;
        height: 650px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .container .blueBg
    {
        top: 0;
        height: 100%;
    }
    .formBx
    {
        width: 100%;
        height: 500px;
        top: 0;
        box-shadow: none;
    }
    .blueBg .box
    {
        position: absolute;
        width: 100%;
        height: 150px;
        bottom: 0;
    }
    .box.signin
    {
        top: 0;
    }
    .formBx.active
    {
        left: 0;
        top: 150px;
    }
}
</style>