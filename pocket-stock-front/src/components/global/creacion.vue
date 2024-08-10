<template >
  <!--
  En esta tarjeta se encuentra el listado de componentes para crear todos los elementos
  dentro del sistema.
-->
  <div style="width: 64%" class="pa-3">
    <v-row>
      <v-col align-self="end">
        <v-row class="ma-2">
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 'a']"
                @shortkey="dialogproduct = !dialogproduct"
                elevation="0"
                dark
                @click="dialogproduct = true"
                v-bind="attrs"
                v-on="on"
                rounded
              >
                <v-icon left large>mdi-plus</v-icon>
                Artículos
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+a</code>
          </v-tooltip>
        </v-row>
        <v-row class="ma-2">
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 'c']"
                @shortkey="dialogcategory = !dialogcategory"
                elevation="0"
                dark
                @click="dialogcategory = true"
                v-bind="attrs"
                v-on="on"
                rounded
              >
                <v-icon left large>mdi-plus</v-icon>
                Categoría
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+c</code>
          </v-tooltip>
        </v-row>
        <v-row class="ma-2">
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 'm']"
                @shortkey="dialogmarca = !dialogmarca"
                elevation="0"
                dark
                @click="dialogmarca = true"
                v-bind="attrs"
                v-on="on"
                rounded
              >
                <v-icon left large>mdi-plus</v-icon>
                Marca
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+m</code>
          </v-tooltip>
        </v-row>
        <v-row class="ma-2">
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 't']"
                @shortkey="dialogtipo = !dialogtipo"
                elevation="0"
                dark
                @click="dialogtipo = true"
                v-bind="attrs"
                v-on="on"
                rounded
              >
                <v-icon left large>mdi-plus</v-icon>
                Tipo
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+t</code>
          </v-tooltip>
        </v-row>
        <v-row class="ma-2">
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 'p']"
                @shortkey="dialogproveedor = !dialogproveedor"
                elevation="0"
                dark
                @click="dialogproveedor = true"
                v-bind="attrs"
                v-on="on"
                rounded
              >
                <v-icon left large>mdi-plus</v-icon>
                Proveedor
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+p</code>
          </v-tooltip>
        </v-row>
        <!--<v-row class="ma-2">
          <v-btn elevation="0"
                dark  @click="dialogstatus = !dialogstatus">
            Status
          </v-btn>
        </v-row>-->

        <v-row class="ma-2"><v-subheader>Ubicación</v-subheader></v-row>
        <v-row class="ma-2">
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 'r']"
                @shortkey="dialograck = !dialograck"
                elevation="0"
                dark
                @click="dialograck = true"
                v-bind="attrs"
                v-on="on"
                rounded
              >
                <v-icon left large>mdi-plus</v-icon>
                Rack
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+r</code>
          </v-tooltip>
        </v-row>
        <v-row class="ma-2">
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 'e']"
                @shortkey="dialogcrossbar = !dialogcrossbar"
                elevation="0"
                dark
                @click="dialogcrossbar = true"
                v-bind="attrs"
                v-on="on"
                rounded
              >
                <v-icon left large>mdi-plus</v-icon>
                Crossbar
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+e</code>
          </v-tooltip>
        </v-row>
      </v-col>
    </v-row>

    <crearproduct :key="count" :dialogproduct.sync="dialogproduct" />
    <crearcategory :dialogcategory.sync="dialogcategory" />
    <crearmarca :dialogmarca.sync="dialogmarca" />
    <creartipo :dialogtipo.sync="dialogtipo" />
    <crearproveedor :dialogproveedor.sync="dialogproveedor" />
    <!--<crearstatus
      :parentdialog="dialogstatus"
      v-on:dialogFromChild="syncFromStatus($event)"
     
    />-->

    <crearrack :dialograck.sync="dialograck" />
    <crearcrossbar :dialogcrossbar.sync="dialogcrossbar" />
  </div>
</template>

<script>
import crearproduct from "../cruds/crearproducts.vue";
import crearcategory from "../cruds/crearcategory.vue";
import crearmarca from "../cruds/crearmarca.vue";
import creartipo from "../cruds/creartipo.vue";
import crearproveedor from "../cruds/crearproveedor.vue";

//import crearstatus from "../cruds/crearstatus.vue";

import crearrack from "../cruds/crearrack.vue";
import crearcrossbar from "../cruds/crearcrossbar.vue";
import store from "@/store";

export default {
  name: "crearlist",

  components: {
    crearproduct,
    crearcategory,
    crearmarca,
    creartipo,
    crearproveedor,
    //crearstatus,
    crearrack,
    crearcrossbar,
  },
  computed: {
    count() {
      return store.getters.counter;
    },
  },

  data: () => ({
    dialogproduct: false,
    dialogcategory: false,
    dialogmarca: false,
    dialogtipo: false,
    dialogproveedor: false,
    //dialogstatus: false,
    dialograck: false,
    dialogcrossbar: false,
  }),
};
</script>
<style scoped>
</style>