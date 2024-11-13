<template>
  <div>
    <h1>Calendario de Actividades</h1>
    <v-calendar
      v-model="selectedDate"
      :events="events"
      is-expanded
    ></v-calendar>

    <div>
      <h3>Fecha seleccionada: {{ selectedDate }}</h3>
    </div>

    <!-- Formulario para agregar eventos -->
    <div>
      <h3>Agregar nueva actividad</h3>
      <form @submit.prevent="addEvent">
        <input v-model="newEvent.title" placeholder="Título" required />
        <input type="datetime-local" v-model="newEvent.start" required />
        <input type="datetime-local" v-model="newEvent.end" required />
        <button type="submit">Agregar</button>
      </form>
    </div>

    <div>
      <h3>Eventos:</h3>
      <ul>
        <li v-for="event in events" :key="event.id">
          <strong>{{ event.title }}</strong> ({{ event.start }})
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ActividadesPage',
  data() {
    return {
      selectedDate: null,
      newEvent: {
        title: '',
        start: '',
        end: '',
      },
      events: [
        {
          id: 1,
          title: 'Reunión de equipo',
          start: '2024-11-15T10:00:00',
          end: '2024-11-15T11:00:00',
        },
      ],
    };
  },
  methods: {
    addEvent() {
      const newEvent = {
        id: Date.now(),
        title: this.newEvent.title,
        start: this.newEvent.start,
        end: this.newEvent.end,
      };
      this.events.push(newEvent);
      // Limpiar el formulario
      this.newEvent = { title: '', start: '', end: '' };
    },
  },
};
</script>

<style scoped>
/* Estilos para el formulario */
input {
  margin: 5px;
  padding: 10px;
  width: 200px;
}
button {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}
</style>
