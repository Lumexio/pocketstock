<template>
  <div class="tabla" id="app">
    <v-row>
      <v-col cols="12" sm="6" md="4">
        <v-text-field
          v-model="search"
          label="Buscar travesaños"
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
        :items="TravesanoArray"
        sort-by="cantidad_articulo"
        class="elevation-1"
        :search="search"
        :custom-filter="filterOnlyCapsText.toUpperCase"
      >
        <template v-slot:top>
          <v-toolbar flat>
            <v-toolbar-title>Tabla travesaño</v-toolbar-title>
            <v-divider class="mx-4" inset vertical></v-divider>
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="500px">
              <v-card>
                <v-card-title>
                  <h1 class="headline">{{ formTitle }}</h1>
                </v-card-title>

                <v-card-text>
                  <v-container>
                    <v-row>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.nombre_travesano"
                          label="Nombre"
                        ></v-text-field>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-card-text>

                <v-card-actions v-on:keyup.enter="save">
                  <v-spacer></v-spacer>
                  <v-btn color="blue darken-1" text @click="close">
                    Cancelar
                  </v-btn>
                  <v-btn color="blue darken-1" text @click="save">
                    Guardar
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>
            <v-dialog v-model="dialogDelete" max-width="500px">
              <v-card>
                <v-card-title class="headline"
                  >¿Estas seguro de querer eliminarlo?</v-card-title
                >
                <v-card-actions v-on:keyup.enter="deleteItemConfirm">
                  <v-spacer></v-spacer>
                  <v-btn color="blue darken-1" text @click="closeDelete"
                    >Cancelar</v-btn
                  >
                  <v-btn color="blue darken-1" text @click="deleteItemConfirm"
                    >Aceptar</v-btn
                  >
                  <v-spacer></v-spacer>
                </v-card-actions>
              </v-card>
            </v-dialog>
          </v-toolbar>
        </template>
        <template v-slot:[`item.actions`]="{ item }">
          <v-icon small class="mr-2" @click="editItem(item)">
            mdi-pencil
          </v-icon>
          <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>
        </template>
        <template v-slot:no-data>
          <span>Datos no disponibles.</span>
        </template>
      </v-data-table>
    </v-app>
  </div>
</template>

<script>
  import axios from "axios";

  //axios.defaults.withCredentials = true;
  axios.defaults.baseURL = "http://127.0.0.1:8000/";
  export default {
    nombre: "tabla-travesano",
    data: () => ({
      dialog: false,
      dialogDelete: false,
      search: "",
      cargando: true,
      headers: [
        {
          text: "Travesaño",
          align: "start",
          sortable: false,
          value: "nombre_travesano",
        },

        { text: "Acciones", value: "actions", sortable: false },
      ],

      TravesanoArray: [],

      editedIndex: -1,
      editedItem: {
        id: "",
        nombre_travesano: "",
      },
      defaultItem: {
        id: "",
        nombre_travesano: "",
      },
    }),
    mounted() {
      this.onFocus();
      window.Echo.channel("travesanos").listen("travesañoCreated", (e) => {
        this.TravesanoArray = e.travesanos;
      });
      axios
        .get("api/travesano")
        .then((response) => {
          let travesano = response.data;

          travesano.forEach((element) => {
            let datos = {
              id: element.id,
              nombre_travesano: element.nombre_travesano,
            };
            if (!datos) return;
            this.TravesanoArray.push(datos);
          });
          this.cargando = false;
        })
        .catch((error) => console.log(error));
    },

    computed: {
      formTitle() {
        return this.editedIndex === -1 ? "New Item" : "Editar travesano";
      },
    },

    watch: {
      dialog(val) {
        val || this.close();
      },
      dialogDelete(val) {
        val || this.closeDelete();
      },
    },

    created() {},

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

      editItem(item) {
        this.editedIndex = this.TravesanoArray.indexOf(item);
        this.editedItem = Object.assign({}, item);

        this.dialog = true;
      },

      deleteItem(item) {
        this.editedIndex = this.TravesanoArray.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.dialogDelete = true;

        let id = this.editedItem.id;
        console.log("delete working:", id);
        axios.delete("api/travesano/" + id).catch((error) => console.log(error));
      },

      deleteItemConfirm() {
        this.TravesanoArray.splice(this.editedIndex, 1);
        this.closeDelete();
      },

      close() {
        this.dialog = false;
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem);
          this.editedIndex = -1;
        });
      },

      closeDelete() {
        this.dialogDelete = false;
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem);
          this.editedIndex = -1;
        });
      },

      save() {
        if (this.editedIndex > -1) {
          Object.assign(this.TravesanoArray[this.editedIndex], this.editedItem);
          let send = this.editedItem;
          let url = "api/travesano/";
          url = url + send.id;
          url = `${url}?${"nombre_travesano=" + send.nombre_travesano}`;
          axios
            .put(url)
            .then((response) => {
              response;
            })
            .catch((error) => console.log(error));
        } else {
          this.TravesanoArray.push(this.editedItem);
        }
        this.close();
      },
    },
  };
</script>

<style scoped>
  #tabla {
    width: 60rem;
  }
  .tabla {
    width: 60rem;
  }
</style>