<template>
    <div class="relative">
      <div @click="toggle" class="cursor-pointer">
        <slot name="default"></slot>
      </div>
      <div v-if="open" class="absolute -left-44 md:-left-14 mt-2 border border-gray-200 md:mt-2 bg-white shadow rounded z-10">
        <slot name="dropdown"></slot>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        open: false,
      };
    },
    methods: {
      toggle() {
        this.open = !this.open;
      },
    },
  };
  </script>
  