<script setup lang="ts">
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { Badge } from '@/components/ui/badge';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Separator } from '@/components/ui/separator';
import { Bell, CreditCard, MessageSquare, Settings, ShoppingBag, UserPlus } from 'lucide-vue-next';

const activities = [
    {
        id: 1,
        user: 'Sarah Chen',
        action: 'joined the platform',
        time: '2 minutes ago',
        avatar: null,
        initials: 'SC',
        type: 'user',
        icon: UserPlus,
        color: 'bg-blue-500 dark:bg-blue-400',
    },
    {
        id: 2,
        user: 'Marcus Rodriguez',
        action: 'made a purchase',
        time: '5 minutes ago',
        avatar: null,
        initials: 'MR',
        type: 'purchase',
        icon: ShoppingBag,
        color: 'bg-green-500 dark:bg-green-400',
    },
    {
        id: 3,
        user: 'Alex Thompson',
        action: 'updated payment method',
        time: '10 minutes ago',
        avatar: null,
        initials: 'AT',
        type: 'payment',
        icon: CreditCard,
        color: 'bg-purple-500 dark:bg-purple-400',
    },
    {
        id: 4,
        user: 'Emily Davis',
        action: 'sent a message',
        time: '15 minutes ago',
        avatar: null,
        initials: 'ED',
        type: 'message',
        icon: MessageSquare,
        color: 'bg-orange-500 dark:bg-orange-400',
    },
    {
        id: 5,
        user: 'David Wilson',
        action: 'changed settings',
        time: '1 hour ago',
        avatar: null,
        initials: 'DW',
        type: 'settings',
        icon: Settings,
        color: 'bg-gray-500 dark:bg-gray-400',
    },
];
</script>

<template>
    <Card>
        <CardHeader>
            <CardTitle class="flex items-center gap-2">
                <Bell class="h-5 w-5" />
                Recent Activity
            </CardTitle>
            <CardDescription>Latest activities from your users and system</CardDescription>
        </CardHeader>
        <CardContent class="space-y-4">
            <div v-for="(activity, index) in activities" :key="activity.id" class="flex items-start space-x-4">
                <Avatar class="h-9 w-9">
                    <AvatarImage v-if="activity.avatar" :src="activity.avatar" :alt="activity.user" />
                    <AvatarFallback class="text-xs">{{ activity.initials }}</AvatarFallback>
                </Avatar>
                <div class="flex-1 space-y-1">
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-medium">{{ activity.user }}</span>
                        <Badge variant="secondary" class="text-xs">
                            <component :is="activity.icon" class="mr-1 h-3 w-3" />
                            {{ activity.action }}
                        </Badge>
                    </div>
                    <p class="text-xs text-muted-foreground">{{ activity.time }}</p>
                </div>
                <div class="flex items-center">
                    <div :class="`h-2 w-2 rounded-full ${activity.color}`"></div>
                </div>
            </div>
            <Separator />
            <div class="text-center">
                <button class="text-sm text-muted-foreground transition-colors hover:text-foreground">View all activities</button>
            </div>
        </CardContent>
    </Card>
</template>
