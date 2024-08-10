<template>
  <div>
    <v-row>
      <v-col sm="6" md="10" class="size-table">
        <!-- <tablaProducts :key="count" /> -->
        <tablaProducts />
      </v-col>
      <v-col cols="1">
        <creacionlist />
      </v-col>
    </v-row>
  </div>
</template>

<script>
import tablaProducts from "../components/table-lists/tabla-products.vue";
import creacionlist from "../components/global/creacion.vue";
//import store from "@/store";
export default {
  name: "artículos",

  components: { tablaProducts, creacionlist },
  data: () => ({}),
  methods: {
    /*para definir metodos*/
  },
  created() {
    /*para ejecutar lo que yo quiera automaticamente*/
  },
  //  count() {
  //   return store.getters.counter;
  // },
  // hasrol() {
  //   return store.getters.hasrol;
  // },
};
</script>

<style scoped>
.size-table {
  max-width: 90%;
}
</style>