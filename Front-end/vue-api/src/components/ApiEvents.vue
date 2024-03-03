<script>
import axios from "axios";

export default {
  name: "ApiEvents",

  data() {
    return {
      events: [],
    };
  },

  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/v1/events")
      .then((res) => {
        const data = res.data;
        if (data.status == "success") {
          this.events = data.events;
        }
      })
      .catch((err) => {
        console.err(err);
      });
  },
};
</script>

<template>

<h1 class="text-center">Elenco eventi</h1>
<div class="ms_height overflow-scroll">
  <div v-for="event in events">
    <div class="card w-50 mx-auto my-2">
      <div class="card-header">
        <h2>{{ event.name }}</h2>
      </div>
      <div class="card-body">
        <p class="card-text"><strong>Descrizione: </strong>{{ event.description }}</p>
        <span class="card-text d-block"><strong>Luogo: </strong>{{ event.location }}</span>
        <span class="card-text d-block"><strong>Data Evento: </strong>{{ event.date }}</span>
      </div>
    </div>
  </div>
</div>


</template>

<style scoped>

h1 {
  height: 60px;
  border-bottom: 1px solid black;
  border-radius: 5%;
}

.ms_height {
  height: calc(100vh - 68px);
}
</style>
