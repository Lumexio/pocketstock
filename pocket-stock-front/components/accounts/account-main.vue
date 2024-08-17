<template>
  <div>
    <v-row style="gap: 1rem; margin: 1rem;">
      <v-card>
        <v-card-title>
          <h2>Detalles de cuenta</h2>
        </v-card-title>
        <v-card-text>
          <v-text-field variant="outlined" label="Nuevo nombre" v-model="newUserDetails.name"></v-text-field>
          <v-text-field variant="outlined" label="Contraseña actual" v-model="newUserDetails.current_password"
            type="password"></v-text-field>
          <v-text-field variant="outlined" label="Nueva contraseña" v-model="newUserDetails.password"
            type="password"></v-text-field>
        </v-card-text>
        <v-card-actions style="display: flex; flex-direction: row; justify-content: flex-end;">
          <v-btn variant="tonal" color="primary" :loading="loading" click="handleEditAccount">Guardar cambios</v-btn>
        </v-card-actions>
      </v-card>
      <v-card class="fixed-height-card">
        <v-card-title>
          <h2>Sesión</h2>
        </v-card-title>
        <v-card-actions>
          <v-btn variant="tonal" color="danger" @click="handleLogout" :loading="loading">Cerrar
            sesión</v-btn>
        </v-card-actions>
      </v-card>
    </v-row>
  </div>
</template>

<script setup>



const store = useStore();
const router = useRouter();
const snackbar = useSnackbar();
let password = ref('');
let confirmPassword = ref('');
let newUserDetails = ref({

  name: '',
  current_password: '',
  password: '',
});
let loading = ref(false);
const config = useRuntimeConfig();




const logout = useMutation({
  mutationFn: async () => {
    const response = await fetch(`${config.public.baseUrl}/api/logout`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'Authorization': `Bearer ${store.isAuthenticated}`,
      },
      credentials: 'include',
    });


    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  },
  onSuccess: () => {
    store.logout();
    snackbar.add({
      type: 'success',
      text: 'Sesión cerrada correctamente',
    });
    router.push({ path: '/login' }).then(() => {
      loading.value = false;
    })
  },
  onError: (error) => {
    console.error('Failed to logout:', error);
    snackbar.add({
      type: 'error',
      text: 'Se ha producido un error al cerrar sesión',
    });
    loading.value = false;
  },
});

const editAccount = useMutation({
  mutationFn: async () => {
    const response = await fetch(`${config.public.baseUrl}/api/users/${store.getUserDetails.id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'Authorization': `Bearer ${store.isAuthenticated}`,
      },
      credentials: 'include',
      body: JSON.stringify(newUserDetails.value),
    });

    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  },
  onSuccess: (data) => {
    store.setUserDetails(data);
    snackbar.add({
      type: 'success',
      text: 'Cuenta actualizada correctamente',
    });
    loading.value = false;
    newUserDetails.value = {
      id: store.getUserDetails.id,
      name: '',
      password: '',
    };
    password.value = '';
    confirmPassword.value = '';
  },
  onError: (error) => {
    console.error('Failed to update account:', error);
    snackbar.add({
      type: 'error',
      text: 'Se ha producido un error al actualizar la cuenta',
    });
    loading.value = false;
  },
});

function handleEditAccount() {
  loading.value = true;
  editAccount.mutate();
}

function handleLogout() {
  loading.value = true;
  logout.mutate();
}
</script>

<style scoped>
.fixed-height-card {
  flex: 0 1 auto;
  height: 10rem;
  overflow: hidden;
}
</style>