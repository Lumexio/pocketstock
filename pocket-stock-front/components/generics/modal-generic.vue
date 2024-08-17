<script setup>

import { ref, watch, watchEffect, defineProps, defineExpose, onMounted } from 'vue';
import { useGenericFetchQueries } from '~/api/generic-fetch-querys';

let isOpen = ref(false);
let visible = ref(false);
let valueItem = ref(null);
let props = defineProps({
  title: String,
  formFields: Array,
  mode: String,
  item: Object,
  relations: Array,
});

let relationData = ref({});

async function fetchRelationData() {

  //sometimes i dont need to fetch relation data
  if (!props?.relations) {
    return;
  }

  const promises = props?.relations.map(async (relation) => {
    const { fetchQuery } = useGenericFetchQueries(relation.endpoint);
    const data = await fetchQuery.refetch();

    return { key: relation.key, data: data.data.map(item => ({ id: item.id, name: item.name })) };
  });

  const results = await Promise.all(promises);
  results.forEach((result) => {

    relationData.value[result.key] = result.data;
  });
}


onMounted(() => {
  fetchRelationData();
});

watchEffect(() => {
  valueItem.value = { ...props.item };
  if (props.mode === 'edit') {
    props.formFields.forEach((field) => {

      if (field.selector === true) {
        field.value = props.item[field.fk]
      } else {

        field.ispassword == true ? field.value = '' : field.value = props.item[field.key];


      }

    });
  } else if (props.mode === 'create') {
    props.formFields.forEach((field) => {
      field.value = '';
    });
  }
});

watch(
  () => props.formFields,
  (newFields) => {

    newFields.forEach((field) => {

      if (field.selector) {
        valueItem.value[field.fk] = field.value;
      } else {
        valueItem.value[field.key] = field.value;
      }

    });

  },
  { deep: true }
);

function handleOpen() {
  isOpen.value = true;
}

const handleClose = () => {
  isOpen.value = false;
};

defineExpose({
  handleOpen,
  handleClose,
  valueItem,
  isOpen
});
</script>

<template>
  <v-dialog v-model="isOpen" max-width="500">
    <v-card>
      <v-card-title>{{ props.title }}</v-card-title>
      <v-card-text v-if="props.mode !== 'delete'">
        <v-row v-for="input in props.formFields" :key="input.key">
          <v-col cols="12">

            <v-select v-if="input.selector" :items="relationData[input.fk] || []" :label="input.label" item-title="name"
              item-value="id" variant="outlined" v-model="input.value"></v-select>
            <v-text-field v-else-if="input.ispassword" :append-inner-icon="visible ? 'mdi-eye-off' : 'mdi-eye'"
              :type="visible ? 'text' : 'password'" :placeholder="input.placeholder"
              prepend-inner-icon="mdi-lock-outline" variant="outlined" v-model="input.value" :label="input.label"
              :rules="input.rules" @click:append-inner="visible = !visible"></v-text-field>
            <v-text-field v-else v-model="input.value" :label="input.label" :rules="input.rules" :type="input.type"
              variant="outlined"></v-text-field>
          </v-col>
        </v-row>
      </v-card-text>
      <v-card-text v-else>
        Quieres eliminar este registro?
      </v-card-text>
      <v-card-actions class="flex justify-end gap-4">
        <v-spacer></v-spacer>
        <v-btn @click="handleClose" variant="tonal" color="info">Cerrar</v-btn>
        <slot name="buttonAction"></slot>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>