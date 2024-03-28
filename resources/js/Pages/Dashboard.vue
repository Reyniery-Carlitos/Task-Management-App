<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import DashboardSection from '@/components/admin/DashboardSection.vue';
</script>


<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <dashboard-section />
    </AuthenticatedLayout>
</template>
