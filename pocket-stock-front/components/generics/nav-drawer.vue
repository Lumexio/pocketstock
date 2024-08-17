<template>
  <v-app-bar app>
    <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
    <v-toolbar-title>
      <BrandTitle />

    </v-toolbar-title>
    <v-spacer></v-spacer>
    <v-btn @click='accountHandler' prepend-icon="mdi-account" elevation="2">Cuenta</v-btn>
  </v-app-bar>
  <v-navigation-drawer app v-model="drawer">
    <v-list>
      <v-list-item :append-icon="item.icon" v-for="item in items" :key="item.title" :to="item.to">
        <v-list-item-title>{{ item.title }}</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>
<script setup>
const router = useRouter()
const props = defineProps({
  items: Array,
});

let drawer = ref(false);
function accountHandler() {
  router.push('/account');
}
</script>