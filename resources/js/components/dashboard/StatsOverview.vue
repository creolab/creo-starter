<script setup lang="ts">
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { ArrowDownRight, ArrowUpRight, DollarSign, ShoppingCart, TrendingUp, Users } from 'lucide-vue-next';

const stats = [
    {
        title: 'Total Revenue',
        value: '$45,231.89',
        description: '+20.1% from last month',
        icon: DollarSign,
        trend: 'up',
        color: 'text-green-600 dark:text-green-400',
    },
    {
        title: 'Subscriptions',
        value: '+2350',
        description: '+180.1% from last month',
        icon: Users,
        trend: 'up',
        color: 'text-blue-600 dark:text-blue-400',
    },
    {
        title: 'Sales',
        value: '+12,234',
        description: '+19% from last month',
        icon: ShoppingCart,
        trend: 'up',
        color: 'text-purple-600 dark:text-purple-400',
    },
    {
        title: 'Active Now',
        value: '+573',
        description: '+201 since last hour',
        icon: TrendingUp,
        trend: 'down',
        color: 'text-orange-600 dark:text-orange-400',
    },
];
</script>

<template>
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
        <Card v-for="stat in stats" :key="stat.title" class="group transition-shadow hover:shadow-lg">
            <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                <CardTitle class="text-sm font-medium">{{ stat.title }}</CardTitle>
                <component :is="stat.icon" class="h-4 w-4 text-muted-foreground" />
            </CardHeader>
            <CardContent>
                <div class="text-2xl font-bold">{{ stat.value }}</div>
                <p class="mt-1 flex items-center gap-1 text-xs text-muted-foreground">
                    <component
                        :is="stat.trend === 'up' ? ArrowUpRight : ArrowDownRight"
                        class="h-3 w-3"
                        :class="stat.trend === 'up' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'"
                    />
                    {{ stat.description }}
                </p>
            </CardContent>
        </Card>
    </div>
</template>
