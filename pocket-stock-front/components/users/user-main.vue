<template>
  <generic-table-crud :title="title" :columns="columns" :endpoint="endpoint" :formFields="formFields"
    :relations="relations" />
</template>

<script>

export default {
  name: 'UserMain',
  data() {
    return {
      title: 'User',
      columns: [
        { id: 0, key: 'id', title: 'ID' },
        { id: 1, key: 'name', title: 'Name' },
        { id: 1, key: 'rol_name', title: 'Rol' },
      ],
      endpoint: '/api/users',
      relations: [
        { key: 'rol_id', endpoint: '/api/rols' },
      ],
      formFields: [
        { key: 'name', label: 'Nombre', value: '', rules: [v => !!v || 'Name is required'], selector: false },

        { key: 'password', label: 'Contraseña', value: '', rules: [v => !!v || 'Contraseña requerida'], selector: false, ispassword: true, placeholder: 'Inglesar nueva contraseña' },
        { key: 'rol_name', fk: 'rol_id', label: 'Rol', value: '', selector: true },
      ],

    }
  },
}
</script>
