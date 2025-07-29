<script setup lang="ts">
import { Badge } from '@/components/ui/badge';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Progress } from '@/components/ui/progress';
import { AlertCircle, CheckCircle, Clock, Database, Globe, Server, Shield, Wifi } from 'lucide-vue-next';

const systemStatus = [
    {
        name: 'Web Server',
        status: 'operational',
        uptime: '99.9%',
        response: '45ms',
        icon: Server,
        progress: 99,
        color: 'text-green-600 dark:text-green-400',
        bgColor: 'bg-green-100 dark:bg-green-900/30',
    },
    {
        name: 'Database',
        status: 'operational',
        uptime: '99.8%',
        response: '12ms',
        icon: Database,
        progress: 98,
        color: 'text-green-600 dark:text-green-400',
        bgColor: 'bg-green-100 dark:bg-green-900/30',
    },
    {
        name: 'CDN',
        status: 'operational',
        uptime: '99.7%',
        response: '8ms',
        icon: Globe,
        progress: 97,
        color: 'text-green-600 dark:text-green-400',
        bgColor: 'bg-green-100 dark:bg-green-900/30',
    },
    {
        name: 'Security',
        status: 'operational',
        uptime: '100%',
        response: '2ms',
        icon: Shield,
        progress: 100,
        color: 'text-green-600 dark:text-green-400',
        bgColor: 'bg-green-100 dark:bg-green-900/30',
    },
    {
        name: 'API Gateway',
        status: 'degraded',
        uptime: '95.2%',
        response: '120ms',
        icon: Wifi,
        progress: 85,
        color: 'text-yellow-600 dark:text-yellow-400',
        bgColor: 'bg-yellow-100 dark:bg-yellow-900/30',
    },
    {
        name: 'Cache Layer',
        status: 'maintenance',
        uptime: '0%',
        response: 'N/A',
        icon: Clock,
        progress: 0,
        color: 'text-blue-600 dark:text-blue-400',
        bgColor: 'bg-blue-100 dark:bg-blue-900/30',
    },
];
</script>

<template>
    <Card>
        <CardHeader>
            <CardTitle class="flex items-center gap-2">
                <Server class="h-5 w-5" />
                System Status
            </CardTitle>
            <CardDescription>Real-time status of all system components</CardDescription>
        </CardHeader>
        <CardContent class="space-y-4">
            <div v-for="system in systemStatus" :key="system.name" class="space-y-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div :class="`h-8 w-8 rounded-lg ${system.bgColor} flex items-center justify-center`">
                            <component :is="system.icon" class="h-4 w-4" :class="system.color" />
                        </div>
                        <div>
                            <div class="font-medium">{{ system.name }}</div>
                            <div class="text-xs text-muted-foreground">Response: {{ system.response }} | Uptime: {{ system.uptime }}</div>
                        </div>
                    </div>
                    <Badge
                        :variant="system.status === 'operational' ? 'default' : system.status === 'degraded' ? 'secondary' : 'outline'"
                        class="text-xs"
                    >
                        <component :is="system.status === 'operational' ? CheckCircle : AlertCircle" class="mr-1 h-3 w-3" />
                        {{ system.status }}
                    </Badge>
                </div>
                <Progress :value="system.progress" class="h-2" />
            </div>

            <div class="border-t pt-4">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-muted-foreground">Overall System Health</span>
                    <span class="font-medium text-green-600 dark:text-green-400">98.2%</span>
                </div>
            </div>
        </CardContent>
    </Card>
</template>
