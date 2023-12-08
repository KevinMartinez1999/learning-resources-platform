<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ResourceForm from '@/Components/ResourceForm.vue';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div>
                        <h2 class="m-6 font-semibold text-xl text-gray-800 leading-tight">Añadir un nuevo recurso</h2>
                    </div>
                    <ResourceForm></ResourceForm>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
