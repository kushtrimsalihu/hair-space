<template>
  <MainMenu class="pt-4 px-4 float-right h-4" />
  <div class="flex flex-col md:flex-row w-full sm:justify-between md:overflow-hidden">
    <div class="sm:w-64 md:flex-shrink-0">
    </div>
      <div class="px-4 p-8 md:flex-1 flex-shrink md:overflow-y-auto">
      <slot />
    </div>
  </div>
</template>

<script>
import MainMenu from "@/Shared/MainMenu.vue";
import Button from "primevue/button";

export default {
  components: {
    MainMenu,
    Button
  },
  props: {
    auth: Object,
  },
};
</script>

<style scoped>
/* Add necessary styles here */
</style>
