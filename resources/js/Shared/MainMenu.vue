<template>
    <nav>
      <ul>
        <li>
          <Link href="/dashboard" class="block py-2 px-4 text-white hover:bg-indigo-700 rounded">Dashboard</Link>
        </li>
        <li>
          <Link href="/appointments" class="block py-2 px-4 text-white hover:bg-indigo-700 rounded">Appointments</Link>
        </li>
        <li>
          <Link href="/barbers" class="block py-2 px-4 text-white hover:bg-indigo-700 rounded">Barbers</Link>
        </li>
        <li>
          <Link href="/settings" class="block py-2 px-4 text-white hover:bg-indigo-700 rounded">Settings</Link>
        </li>
      </ul>
    </nav>
  </template>
  
  <script>
  import { Link } from "@inertiajs/vue3";
  
  export default {
    components: {
      Link,
    },
  };
  </script>
  
  <style scoped>
  /* Add styles if necessary */
  </style>
  