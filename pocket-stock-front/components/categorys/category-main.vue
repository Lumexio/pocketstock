<template>
  <generic-table-crud :title="title" :columns="columns" :endpoint="endpoint" :formFields="formFields" />
</template>

<script>

export default {
  name: 'CategoryMain',
  data() {
    return {
      title: 'Categoria',
      columns: [
        { id: 0, key: 'id', title: 'ID' },
        { id: 1, key: 'name', title: 'Name' },
      ],
      endpoint: '/api/categories',
      formFields: [
        { key: 'name', label: 'Nombre', value: '', rules: [v => !!v || 'Name is required'] },
        { key: 'description', label: 'Descripción', value: '', rules: [v => !!v || 'Description is required'] },
      ],
    }
  },
}
</script>
