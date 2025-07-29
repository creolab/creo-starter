<script setup lang="ts">
import { QuickActions, RecentActivity, StatsOverview, SystemStatus } from '@/components/dashboard';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-6 p-6">
            <!-- Stats Overview -->
            <div>
                <h2 class="mb-4 text-2xl font-bold tracking-tight">Overview</h2>
                <StatsOverview />
            </div>

            <!-- Main Content Grid -->
            <div class="xxl:grid-cols-3 grid gap-6 md:grid-cols-2">
                <RecentActivity />

                <SystemStatus />

                <QuickActions class="col-span-2" />
            </div>
        </div>
    </AppLayout>
</template>
