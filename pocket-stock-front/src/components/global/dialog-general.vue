<template>
 <v-dialog content-class="elevation-0" max-width="40rem" persistent v-model="dialog">
  <v-card :dark="$store.getters.hasdarkflag">
   <v-card-title>
    <slot name="title"></slot>
   </v-card-title>
   <v-card-text class="text-left">
    <slot name="text"></slot>
    <slot name="alert"></slot>
   </v-card-text>
   <v-card-actions class="ma-2"><v-btn @click="onClose">{{ cancel }}</v-btn>
    <v-spacer></v-spacer>
    <slot name="buttons"></slot>
   </v-card-actions>
  </v-card>
 </v-dialog>
</template>
<script>
export default {
 name: "dialog-general",
 props: {
  dialogConfirmation: {
   type: Boolean,
   default: false,
  },
  cancel: {
   type: String,
   default: "Cancelar",
  },
 },
 data() {
  return {
   dialog: false,
  };
 },
 watch: {
  dialogConfirmation(val) {
   this.dialog = val;
  },
 },

 methods: {
  onClose() {
   this.$emit("update:dialogConfirmation", false);
  },
 },
};
</script>
