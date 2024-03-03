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
  <h1>API EVENTS:</h1>
  <ul>
    <div v-for="event in events">
      <h3>
        {{ event.name }}
      </h3>
      <ul>
        <li>
          {{ event.description }}
          <br>
          {{ event.location }}
          <br>
          {{ event.date }}
        </li>
      </ul>
    </div>
  </ul>
</template>

<style scoped></style>
