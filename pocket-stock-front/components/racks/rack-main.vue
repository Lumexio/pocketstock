<template>
  <generic-table-crud :title="title" :columns="columns" :endpoint="endpoint" :formFields="formFields"
    :mockData="mockData" />
</template>

<script>

export default {
  name: 'RackMain',
  data() {
    return {
      title: 'Rack',
      columns: [
        { id: 0, key: 'id', title: 'ID' },
        { id: 1, key: 'name', title: 'Name' },
      ],
      endpoint: '/api/racks',
      formFields: [
        { key: 'name', label: 'Nombre', value: '', rules: [v => !!v || 'Name is required'] },
        { key: 'description', label: 'Descripción', value: '', rules: [v => !!v || 'Description is required'] },
      ],
      mockData: [
        { id: 1, name: 'Rack 1', description: 'Description 1' },
        { id: 2, name: 'Rack 2', description: 'Description 2' },
      ],
    }
  },
}
</script>
