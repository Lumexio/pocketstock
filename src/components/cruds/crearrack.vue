<template>
  <v-dialog
    content-class="elevation-0"
    v-model="parentdialog"
    max-width="20rem"
    persistent
  >
    <v-card class="cont-card" v-on:keyup.enter="submit()" elevation="1">
      <v-toolbar light flat>
        <v-btn icon color="dark" @click="onClose">
          <v-icon> mdi-close </v-icon>
        </v-btn>
        <v-toolbar-title>Crear rack</v-toolbar-title>
      </v-toolbar>
      <v-row>
        <v-col sm="6" md="12" lx="13">
          <v-text-field
            v-model="rack"
            :counter="10"
            label="Rack"
            required
          ></v-text-field>
        </v-col>
      </v-row>
      <v-btn color="green" class="mr-4" @click="submit" text> Guardar </v-btn>
      <v-btn @click="clear" text> Limpiar </v-btn>
    </v-card>
  </v-dialog>
</template>

<script>
  import axios from "axios";
  import store from "@/store";
  axios.defaults.withCredentials = true;
  axios.defaults.baseURL = "http://127.0.0.1:8000/";
  export default {
    name: "crearrack",
    props: {
      parentdialog: { type: Boolean },
    } /*data de llegado de componente padre creacion*/,
    data: () => ({
      rack: "",
    }),

    methods: {
      onClose() {
        /*Envia parametro de cierre a componente creación*/
        store.commit("increment", 1);
        store.commit("setsuccess", false); //para resetear el valor de la notificion en una nueva entrada
        store.commit("setdanger", false);
      },
      submit() {
        store.commit("setsuccess", false); //para resetear el valor de la notificion en una nueva entrada
        store.commit("setdanger", false);
        let enviar_rack = {
          nombre_rack: this.rack,
        };

        axios
          .post("api/rack", enviar_rack)
          .then((response) => {
            if (response.statusText === "Created") {
              this.rack = "";
              store.commit("setsuccess", true);
            }
          })
          .catch((e) => {
            console.log(e.message);
            store.commit("setdanger", true);
          });
      },

      clear() {
        this.rack = "";
      },
    },
  };
</script>

<style scoped>
  .cont-card {
    padding: 1rem;
  }
</style>