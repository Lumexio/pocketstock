<template >
  <!--
  En esta tarjeta se encuentra el listado de componentes para crear todos los elementos
  dentro del sistema.
-->
  <v-card class="list-card">
    <v-row>
      <v-col align-self="end" cols="2">
        <v-row>
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 'a']"
                @shortkey="dialogarticulo = !dialogarticulo"
                color="primary"
                text
                @click.native="dialogarticulo = !dialogarticulo"
                v-bind="attrs"
                v-on="on"
              >
                Artículos
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+a</code>
          </v-tooltip>
        </v-row>
        <v-row>
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 'c']"
                @shortkey="dialogcategoria = !dialogcategoria"
                color="primary"
                text
                @click="dialogcategoria = !dialogcategoria"
                v-bind="attrs"
                v-on="on"
              >
                Categoría
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+c</code>
          </v-tooltip>
        </v-row>
        <v-row>
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 'm']"
                @shortkey="dialogmarca = !dialogmarca"
                color="primary"
                text
                @click="dialogmarca = !dialogmarca"
                v-bind="attrs"
                v-on="on"
              >
                Marca
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+m</code>
          </v-tooltip>
        </v-row>
        <v-row>
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 't']"
                @shortkey="dialogtipo = !dialogtipo"
                color="primary"
                text
                @click="dialogtipo = !dialogtipo"
                v-bind="attrs"
                v-on="on"
              >
                Tipo
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+t</code>
          </v-tooltip>
        </v-row>
        <v-row>
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 'p']"
                @shortkey="dialogproveedor = !dialogproveedor"
                color="primary"
                text
                @click="dialogproveedor = !dialogproveedor"
                v-bind="attrs"
                v-on="on"
              >
                Proveedor
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+p</code>
          </v-tooltip>
        </v-row>
        <!--<v-row>
          <v-btn color="primary" text @click="dialogstatus = !dialogstatus">
            Status
          </v-btn>
        </v-row>-->

        <v-row><v-subheader>Ubicación</v-subheader></v-row>
        <v-row>
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 'r']"
                @shortkey="dialograck = !dialograck"
                color="primary"
                text
                @click="dialograck = !dialograck"
                v-bind="attrs"
                v-on="on"
              >
                Rack
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+r</code>
          </v-tooltip>
        </v-row>
        <v-row>
          <v-tooltip open-delay="500" left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-shortkey="['ctrl', 'shift', 'e']"
                @shortkey="dialogtravesaño = !dialogtravesaño"
                color="primary"
                text
                @click="dialogtravesaño = !dialogtravesaño"
                v-bind="attrs"
                v-on="on"
              >
                Travesaño
              </v-btn>
            </template>
            <code>abrir y cerrar:ctrl+shift+e</code>
          </v-tooltip>
        </v-row>
      </v-col>
    </v-row>

    <creararticulo
      :key="count"
      :parentdialog="dialogarticulo"
      @dialogFromChild="syncFromArticulo($event)"
    />
    <crearcategoria
      :parentdialog="dialogcategoria"
      v-on:dialogFromChild="syncFromCategoria($event)"
    />
    <crearmarca
      :parentdialog="dialogmarca"
      v-on:dialogFromChild="syncFromMarca($event)"
    />
    <creartipo
      :parentdialog="dialogtipo"
      v-on:dialogFromChild="syncFromTipo($event)"
    />
    <crearproveedor
      :parentdialog="dialogproveedor"
      v-on:dialogFromChild="syncFromProveedor($event)"
    />
    <!--<crearstatus
      :parentdialog="dialogstatus"
      v-on:dialogFromChild="syncFromStatus($event)"
     
    />-->

    <crearrack
      :parentdialog="dialograck"
      v-on:dialogFromChild="syncFromRack($event)"
    />
    <creartravesaño
      :parentdialog="dialogtravesaño"
      v-on:dialogFromChild="syncFromTravesaño($event)"
    />
  </v-card>
</template>

<script>
  import creararticulo from "../cruds/creararticulos.vue";
  import crearcategoria from "../cruds/crearcategoria.vue";
  import crearmarca from "../cruds/crearmarca.vue";
  import creartipo from "../cruds/creartipo.vue";
  import crearproveedor from "../cruds/crearproveedor.vue";

  //import crearstatus from "../cruds/crearstatus.vue";

  import crearrack from "../cruds/crearrack.vue";
  import creartravesaño from "../cruds/creartravesaño.vue";
  import store from "@/store";

  export default {
    name: "crearlist",

    components: {
      creararticulo,
      crearcategoria,
      crearmarca,
      creartipo,
      crearproveedor,
      //crearstatus,
      crearrack,
      creartravesaño,
    },
    computed: {
      count() {
        return store.getters.counter;
      },
    },
    methods: {
      syncFromArticulo(updatedDialog) {
        this.dialogarticulo = updatedDialog;
      },
      syncFromCategoria(updatedDialog) {
        this.dialogcategoria = updatedDialog;
      },
      syncFromMarca(updatedDialog) {
        this.dialogmarca = updatedDialog;
      },
      syncFromTipo(updatedDialog) {
        this.dialogtipo = updatedDialog;
      },
      syncFromProveedor(updatedDialog) {
        this.dialogproveedor = updatedDialog;
      },
      /*syncFromStatus(updatedDialog) {
                                                                                                                          this.dialogstatus = updatedDialog;
                                                                                                                        },*/
      syncFromRack(updatedDialog) {
        this.dialograck = updatedDialog;
      },
      syncFromTravesaño(updatedDialog) {
        this.dialogtravesaño = updatedDialog;
      },
    },
    data: () => ({
      dialogarticulo: false,
      dialogcategoria: false,
      dialogmarca: false,
      dialogtipo: false,
      dialogproveedor: false,
      //dialogstatus: false,
      dialograck: false,
      dialogtravesaño: false,
    }),
  };
</script>
<style scoped>
  .list-card {
    display: flex;
    align-content: center;
    justify-content: center;
    padding: 1em;

    width: 7rem;
    height: 22em;
  }
</style>