<template>
  <div class="tabla" id="app">
    <v-row>
      <v-col cols="12" sm="6" md="4">
        <v-text-field
          v-model="search"
          label="Buscar actividad"
          class="mx-4"
          id="onsearch"
        ></v-text-field>
      </v-col>
    </v-row>
    <v-app id="inspire">
      <v-progress-linear
        height="6"
        indeterminate
        color="cyan"
        :active="cargando"
      ></v-progress-linear>
      <v-data-table
        id="tabla"
        :headers="headers"
        :items="activitylogArray"
        :expanded.sync="expanded"
        sort-by="accion"
        class="elevation-1"
        :search="search"
        show-expand
        :custom-filter="filterOnlyCapsText.toUpperCase"
      >
        <template v-slot:top>
          <v-toolbar flat>
            <v-toolbar-title>Tabla historial</v-toolbar-title>
            <v-divider class="mx-4" inset vertical></v-divider>
            <v-spacer></v-spacer>
          </v-toolbar>
        </template>
        <template v-slot:no-data>
          <span>Datos no disponibles.</span>
        </template>
        <template v-slot:expanded-item="{ headers, item }">
          <td :colspan="headers.length">
            <v-row v-if="item.properties.old != undefined">
              <v-col col="2">
                <b> Datos viejos: </b>
              </v-col>
              <v-col col="2">
                <span v-if="item.properties.old.nombre_articulo != undefined">
                  nombre: {{ item.properties.old.nombre_articulo }}
                </span>
                <span v-if="item.properties.old.name != undefined">
                  nombre: {{ item.properties.old.name }}
                </span>
              </v-col>
              <v-col col="2">
                <span v-if="item.properties.old.cantidad_articulo != undefined">
                  rol:{{ item.properties.old.cantidad_articulo }}</span
                >
                <span v-if="item.properties.old.rol_id != undefined">
                  rol:{{ item.properties.old.rol_id }}</span
                >
              </v-col>
            </v-row>
            <v-row v-if="item.properties.attributes != undefined">
              <v-col col="2">
                <b> Datos actuales: </b>
              </v-col>
              <v-col col="2">
                <span
                  v-if="item.properties.attributes.nombre_articulo != undefined"
                >
                  nombre: {{ item.properties.attributes.nombre_articulo }}
                </span>
                <span v-if="item.properties.attributes.name != undefined">
                  nombre: {{ item.properties.attributes.name }}
                </span>
              </v-col>
              <v-col col="2">
                <span
                  v-if="
                    item.properties.attributes.cantidad_articulo != undefined
                  "
                >
                  rol:{{ item.properties.attributes.cantidad_articulo }}</span
                >
                <span v-if="item.properties.attributes.rol_id != undefined">
                  rol:{{ item.properties.attributes.rol_id }}</span
                >
              </v-col>
            </v-row>
          </td>
        </template>
      </v-data-table>
    </v-app>
  </div>
</template>

<script>
import { getActivitylog } from "@/api/activitylog.js";

export default {
  name: "tabla-activitylog",
  data: () => ({
    search: "",
    cargando: true,
    expanded: [],
    headers: [
      {
        text: "Actividad",
        align: "start",
        sortable: false,
        value: "accion",
      },
      {
        text: "Responsable",
        align: "start",
        sortable: false,
        value: "causername",
      },
      {
        text: "Creado en",
        align: "start",
        sortable: false,
        value: "createdat",
      },
      {
        text: "Actualizado en",
        align: "start",
        sortable: false,
        value: "updatedat",
      },
      { text: "Descripción", align: "start", value: "data-table-expand" },
    ],

    activitylogArray: [],
  }),
  mounted() {
    this.onFocus();
    // window.Echo.channel("activitylog").listen("activitylogCreated", (e) => {
    //   this.activitylogArray = e.activitylog;
    // });
    getActivitylog(this.activitylogArray)
      .then((response) => {
        if (response.stats === 200) {
          this.cargando = false;
        }
      })
      .catch((e) => {
        console.log(e);
        this.cargando = true;
      });
  },
  methods: {
    onFocus() {
      let stext = document.getElementById("onsearch");
      stext;
      stext = addEventListener("keydown", (e) => {
        if (e.altKey) {
          document.getElementById("onsearch").focus();
        }
      });
    },
    filterOnlyCapsText(value, search) {
      return (
        value != null &&
        search != null &&
        typeof value === "string" &&
        value.toString().toLocaleUpperCase().indexOf(search) !== -1
      );
    },
  },
};
</script>

<style scoped>
#tabla {
  width: 100%;
}
.tabla {
  width: 100%;
}
</style>