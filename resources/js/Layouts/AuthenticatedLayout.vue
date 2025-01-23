<template>
  <div class="relative w-full h-full">
    <aside class="m-4 lg:flex-shrink-0 absolute right-0 top-0">
      <MainMenu />
    </aside>

    <main class="flex-1 px-4 py-8 ml-0 lg:ml-80">
      <slot />
    </main>
  </div>
</template>

<script>
import MainMenu from "@/Shared/MainMenu.vue";

export default {
  components: {
    MainMenu,
  },
  props: {
    auth: Object,
  },
};
</script>

<style scoped>
/* Add custom styles if needed */
</style>
