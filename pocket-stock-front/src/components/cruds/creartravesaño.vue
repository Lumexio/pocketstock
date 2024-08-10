<template>
  <v-dialog
    content-class="elevation-0"
    v-model="dialogcrossbar"
    max-width="28rem"
    persistent
  >
    <v-card v-on:keyup.enter="submit()" class="cont-card" elevation="2">
      <v-toolbar light flat>
        <v-btn
          v-shortkey="['esc']"
          icon
          color="dark"
          @shortkey="onClose"
          @click="onClose"
        >
          <v-icon> mdi-close </v-icon>
        </v-btn>
        <v-toolbar-title>Crear crossbar</v-toolbar-title>
      </v-toolbar>
      <v-row>
        <v-col sm="6" md="12" lx="13">
          <v-text-field
            v-model="name"
            :counter="10"
            type="number"
            label="Crossbar"
            required
          ></v-text-field>
        </v-col>
      </v-row>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="grey darken-2" @click="clear" outlined> Limpiar </v-btn>
        <v-btn color="yellow darken-2" class="mr-4" @click="submit" outlined>
          Guardar crossbar</v-btn
        >
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
  import store from "@/store";
  import { postTravesano } from "@/api/travesanos.js";

  export default {
    name: "crearmarca",
    props: {
      dialogcrossbar: { default: false },
    } /*data de llegado de componente padre creacion*/,
    data: () => ({
      name: null,
    }),

    methods: {
      onClose() {
        /*Envia parametro de cierre a componente creación*/
        this.$emit("update:dialogcrossbar", false);
      },
      submit() {
        store.commit("setsuccess", false); //para resetear el valor de la notificion en una nueva entrada
        store.commit("setdanger", false);
        let enviar_crossbar = {
          name: this.name,
        };
        const formdata = new FormData();
        formdata.append("name", this.name);
        postTravesano(enviar_crossbar);
        this.clear();
      },

      clear() {
        this.name = null;
      },
    },
  };
</script>

<style scoped>
  .cont-card {
    padding: 1rem;
  }
</style>