<template>
  <index />
  <login />
</template>

<script>
import index from './components/index.vue'
import login from './components/login.vue'
export default {
  name: 'App',
  components: {
    index,
    login
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>