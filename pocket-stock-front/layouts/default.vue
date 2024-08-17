<template>
 <v-responsive>
  <v-app>
   <nav-drawer :items="list" />
   <v-main>
    <slot />
   </v-main>
  </v-app>
 </v-responsive>
</template>
<script setup>
const store = useStore();
let list = ref(null);

const listAdmin = ref([
 { title: 'Home', icon: 'mdi-home', to: '/' },
 { title: "Usuarios", icon: "mdi-account-multiple", to: "/user" },
 { title: "Productos", icon: "mdi-package-variant-closed", to: "/products" },
 { title: "Categorias", icon: "mdi-folder-multiple", to: "/category" },
]);
const listUser = ref([
 { title: 'home', icon: 'mdi-home', to: '/' },
 { title: "Productos", icon: "mdi-package-variant-closed", to: "/products" },
 { title: "Categorias", icon: "mdi-folder-multiple", to: "/category" },
]);

store.hasRole == 1 ? list = listAdmin : list = listUser;
</script>