<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-white">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="ml-auto max-w-3xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-300">
                        <p class="text-lg">Hello,
                       {{ $page.props.auth.user.name }}, you're logged in!
                       </p>
                       <p class="text-white font-bold">Welcome in Hair Space! </p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>