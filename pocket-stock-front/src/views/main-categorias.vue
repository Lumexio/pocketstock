<template>
  <div>
    <v-row>
      <v-col sm="10" md="10">
        <tablacategory />
      </v-col>
      <v-col sm="1" md="2">
        <creacionlist />
      </v-col>
    </v-row>
  </div>
</template>

<script>
  import tablacategory from "../components/table-lists/tabla-category.vue";
  import creacionlist from "../components/global/creacion-category.vue";
  export default {
    name: "categorys",
    components: { tablacategory, creacionlist },
  };
</script>

<style scoped>
</style>