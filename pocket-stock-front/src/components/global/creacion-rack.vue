<template>
  <!--
  En esta tarjeta se encuentra el listado de componentes para crear todos los elementos
  dentro del sistema.
-->
  <div style="inline-size: 64%" class="pa-3">
    <v-row>
      <v-col align-self="end" cols="2">
        <v-row>
          <v-btn v-shortkey="['ctrl', 'shift', 'r']" @shortkey="dialograck = !dialograck" elevation="0" dark rounded
            @click="dialograck = true">
            <v-icon left large dark>mdi-plus</v-icon>
            Rack
          </v-btn>
        </v-row>
      </v-col>
    </v-row>

    <crearrack :dialograck.sync="dialograck" />
  </div>
</template>

<script>
import crearrack from "../cruds/crear_rack.vue";

export default {
  name: "creacion-rack",

  components: {
    crearrack,
  },
  methods: {},
  data: () => ({
    dialograck: false,
  }),
};
</script>
<style scoped>
.list-card {
  display: flex;
  align-content: center;
  justify-content: center;
  padding: 1em;

  inline-size: 7rem;
  block-size: 3em;
}
</style>