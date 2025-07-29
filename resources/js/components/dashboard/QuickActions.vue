<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { BarChart3, Download, FileText, MessageSquare, Plus, Settings, Upload } from 'lucide-vue-next';

const actions = [
    {
        title: 'Add User',
        description: 'Create a new user account',
        icon: Plus,
        variant: 'outline' as const,
        color: 'bg-blue-500 dark:bg-blue-600',
    },
    {
        title: 'Generate Report',
        description: 'Create a new analytics report',
        icon: FileText,
        variant: 'outline' as const,
        color: 'bg-green-500 dark:bg-green-600',
    },
    {
        title: 'View Analytics',
        description: 'Check your performance metrics',
        icon: BarChart3,
        variant: 'outline' as const,
        color: 'bg-purple-500 dark:bg-purple-600',
    },
    {
        title: 'Send Message',
        description: 'Contact your team members',
        icon: MessageSquare,
        variant: 'outline' as const,
        color: 'bg-orange-500 dark:bg-orange-600',
    },
    {
        title: 'Import Data',
        description: 'Upload data from external sources',
        icon: Upload,
        variant: 'outline' as const,
        color: 'bg-indigo-500 dark:bg-indigo-600',
    },
    {
        title: 'Export Data',
        description: 'Download your data as CSV',
        icon: Download,
        variant: 'outline' as const,
        color: 'bg-teal-500 dark:bg-teal-600',
    },
];
</script>

<template>
    <Card>
        <CardHeader>
            <CardTitle class="flex items-center gap-2">
                <Settings class="h-5 w-5" />
                Quick Actions
            </CardTitle>
            <CardDescription>Common actions to help you get things done faster</CardDescription>
        </CardHeader>
        <CardContent>
            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                <Button
                    v-for="action in actions"
                    :key="action.title"
                    :variant="action.variant"
                    class="flex h-auto flex-col items-start gap-2 p-4 text-left transition-colors hover:bg-accent/50"
                >
                    <div class="flex items-center gap-2">
                        <div :class="`h-8 w-8 rounded-lg ${action.color} flex items-center justify-center`">
                            <component :is="action.icon" class="h-4 w-4 text-white" />
                        </div>
                        <div>
                            <div class="font-medium">{{ action.title }}</div>
                            <div class="text-xs text-muted-foreground">{{ action.description }}</div>
                        </div>
                    </div>
                </Button>
            </div>
        </CardContent>
    </Card>
</template>
