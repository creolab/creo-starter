<script setup lang="ts">
import { computed } from 'vue';

interface Props {
    user: {
        id: number;
        first_name: string;
        last_name: string;
        email: string;
        avatar_url?: string;
        has_avatar?: boolean;
    };
    size?: 'small' | 'medium' | 'large';
    showName?: boolean;
    class?: string;
}

const props = withDefaults(defineProps<Props>(), {
    size: 'medium',
    showName: false,
    class: '',
});

const sizeClasses = computed(() => {
    switch (props.size) {
        case 'small':
            return 'w-8 h-8 text-xs';
        case 'large':
            return 'w-16 h-16 text-lg';
        default:
            return 'w-10 h-10 text-sm';
    }
});

const avatarUrl = computed(() => {
    if (props.user.has_avatar && props.user.avatar_url) {
        return props.user.avatar_url;
    }

    // Generate default avatar from initials
    const initials =
        props.user.first_name +
        ' ' +
        props.user.last_name
            .split(' ')
            .map((word) => word.charAt(0).toUpperCase())
            .slice(0, 2)
            .join('');

    const size = props.size === 'small' ? 50 : props.size === 'large' ? 150 : 100;

    return `https://ui-avatars.com/api/?name=${initials}&background=random&color=fff&size=${size}`;
});

const initials = computed(() => {
    return (
        props.user.first_name +
        ' ' +
        props.user.last_name
            .split(' ')
            .map((word) => word.charAt(0).toUpperCase())
            .slice(0, 2)
            .join('')
    );
});
</script>

<template>
    <div :class="['flex items-center gap-3', props.class]">
        <div :class="['flex items-center justify-center overflow-hidden rounded-full border-2 border-border bg-muted', sizeClasses]">
            <img
                v-if="user.has_avatar && user.avatar_url"
                :src="avatarUrl"
                :alt="`${user.first_name} ${user.last_name}'s avatar`"
                class="h-full w-full object-cover"
                @error="(e) => ((e.target as HTMLImageElement).style.display = 'none')"
            />
            <img v-else :src="avatarUrl" :alt="`${user.first_name} ${user.last_name}'s avatar`" class="h-full w-full object-cover" />
        </div>

        <div v-if="showName" class="min-w-0 flex-1">
            <p class="truncate text-sm font-medium text-foreground">
                {{ user.first_name + ' ' + user.last_name }}
            </p>
            <p class="truncate text-xs text-muted-foreground">
                {{ user.email }}
            </p>
        </div>
    </div>
</template>
