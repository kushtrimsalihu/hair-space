<template>
    <div>
      <h1 class="text-2xl font-bold mb-4">Head Barber Dashboard</h1>
      <div class="grid grid-cols-2 gap-4">
        <div class="bg-white p-4 rounded shadow">
          <h2 class="text-xl font-semibold">Total Earnings</h2>
          <p class="text-2xl font-bold mt-2">${{ earnings }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
          <h2 class="text-xl font-semibold">Recent Appointments</h2>
          <ul>
            <li v-for="appointment in appointments" :key="appointment.id">
              {{ appointment.client.name }} - {{ appointment.service.name }} on {{ appointment.date }} (${{ appointment.price }})
            </li>
          </ul>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      appointments: Array,
      earnings: Number,
    },
  };
  </script>
  