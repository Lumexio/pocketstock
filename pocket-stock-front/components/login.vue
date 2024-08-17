<script setup>

const store = useStore();
const router = useRouter();
const snackbar = useSnackbar();
let pack = ref({ password: '', name: '' });
let isLoading = ref(false);

const clean = () => {
 pack.value.password = '';
 pack.value.name = '';
};
const config = useRuntimeConfig();
const loginMutation = useMutation({
 mutationFn: async () => {
  const csrfResponse = await fetch(`${config.public.baseUrl}/sanctum/csrf-cookie`, {
   credentials: 'include',
  });
  if (!csrfResponse.ok) {
   throw new Error('Network response was not ok');
  }



  const loginResponse = await fetch(`${config.public.baseUrl}/api/login`, {
   method: 'POST',
   headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
   },
   credentials: 'include',
   body: JSON.stringify(pack.value),
  });


  if (!loginResponse.ok) {
   throw new Error('Network response was not ok');
  }
  const data = await loginResponse.json();
  return data;
 },
 onSuccess: (data) => {

  store.setBearerToken(data.token);
  store.setRole(data?.user?.rol_id);
  store.setUserDetails(data?.user);
  snackbar.add({
   type: 'success',
   text: 'Sesión iniciada correctamente'
  })
  router.push({ path: '/' }).then(() => {
   isLoading.value = false;
  });
 },
 onError: (error) => {
  isLoading.value = false;
  console.error('Login failed:', error);
  snackbar.add({
   type: 'error',
   text: 'Se ha producido un error al iniciar sesión'
  })
 },
});

const login = () => {
 isLoading.value = true;
 loginMutation.mutate();
};
</script>


<template>
 <v-card max-width="30rem" min-width="12rem">
  <v-card-title><brand-title /></v-card-title>
  <v-card-text>
   <v-text-field variant="outlined" v-model="pack.name" label="nombre de usuario" type="name"></v-text-field>
   <v-text-field variant="outlined" v-model="pack.password" label="Contraseña" type="password"></v-text-field>
  </v-card-text>
  <v-card-actions class="flex justify-end gap-4">
   <v-btn color="info" variant="tonal" @click="clean" append-icon="mdi-eraser">Limpiar
   </v-btn>
   <v-btn @click="login" color="primary" variant="tonal" append-icon="mdi-login" :loading="isLoading">Iniciar
    sesión
   </v-btn>
  </v-card-actions>
 </v-card>
</template>