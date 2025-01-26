<template>
   <Head title="Dashboard" />
   <AuthenticatedLayout>
    <div class="p-6">
        <!-- Header Section -->
        <div class="grid gap-4 mb-6">
            <div class="col-12 md:col-6">
                <Card class="p-card">
                    <template #title>
                        <span class="text-2xl font-bold text-primary">Appointments Overview</span>
                    </template>
                    <template #content>
                        <div class="grid">
                            <div class="col-6">
                                <p class="text-sm text-secondary">Total Appointments</p>
                                <p class="text-lg font-bold">{{ appointments.length }}</p>
                            </div>
                            <div class="col-6">
                                <p class="text-sm text-secondary">Total Revenue</p>
                                <p class="text-lg font-bold ">${{ totalRevenue }}</p>
                            </div>
                        </div>
                    </template>
                </Card>
            </div>
        </div>

        <!-- Appointments Table -->
        <DataTable :value="appointments" paginator :rows="10" responsive-layout="stack">
            <Column field="date" header="Date" :body="formatDate" />
            <Column field="time" header="Time" />
            <Column field="service.name" header="Service" />
            <Column field="barber.name" header="Barber" />
            <Column field="status" header="Status" class="capitalize" />
            <Column field="service.price" header="Price" :body="formatPrice" />
            <Column header="Actions">
                <template #body="slotProps">
                    <Button label="Details" icon="pi pi-info-circle"
                        class="p-button-rounded p-button-info p-button-text" @click="viewDetails(slotProps.data)" />
                </template>
            </Column>
        </DataTable>


        <!-- Modal/Details for Appointment (Optional) -->
        <Dialog v-model:visible="showDetails" header="Appointment Details" :style="{ width: '50vw' }">
            <div>
                <p><strong>Service:</strong> {{ selectedAppointment.service.name }}</p>
                <p><strong>Barber:</strong> {{ selectedAppointment.barber.name }}</p>
                <p><strong>Date:</strong> {{ selectedAppointment.date }}</p>
                <p><strong>Time:</strong> {{ selectedAppointment.time }}</p>
                <p class="capitalize"><strong>Status:</strong> {{ selectedAppointment.status }}</p>
                <p><strong>Price:</strong> ${{ selectedAppointment.service.price }}</p>
            </div>
        </Dialog>
    </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Card from "primevue/card";
import Button from "primevue/button";
import Dialog from "primevue/dialog";

export default {
    components: {
        DataTable,
        Column,
        Card,
        Button,
        Dialog,
        AuthenticatedLayout,
        Head,
    },
    props: {
        appointments: Array,
        user: Object,
    },
    computed: {
        totalRevenue() {
            // Filter completed appointments
            const completedAppointments = this.appointments.filter(
                (appointment) => appointment.status === "completed"
            );

            // Calculate total revenue from completed appointments
            const total = completedAppointments.reduce((sum, appointment) => {
                const price = parseFloat(appointment.service.price);
                return sum + (isNaN(price) ? 0 : price);
            }, 0);

            return total.toFixed(2);
        }
    },
    methods: {
        viewDetails(row) {

            this.selectedAppointment = row;
            this.showDetails = true;
        },
        formatDate(row) {
            const options = { year: "numeric", month: "short", day: "numeric" };
            return new Date(row.date).toLocaleDateString(undefined, options);
        },
        formatPrice(row) {
            return `$${parseFloat(row.price).toFixed(3)}`;
        },
    },
    data() {
        return {
            showDetails: false,
            selectedAppointment: {},
        };
    },
};
</script>