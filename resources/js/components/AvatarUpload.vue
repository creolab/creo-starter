<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import UserAvatar from '@/components/UserAvatar.vue';
import type { AppPageProps } from '@/types';
import { router, usePage } from '@inertiajs/vue3';
import { AlertCircle, Upload, X } from 'lucide-vue-next';
import { computed, ref } from 'vue';
import { toast } from 'vue-sonner';

interface Props {
    user: {
        id: number;
        first_name: string;
        last_name: string;
        email: string;
        avatar_url?: string;
        has_avatar?: boolean;
    };
}

const props = defineProps<Props>();
const page = usePage<AppPageProps>();

const fileInput = ref<HTMLInputElement>();
const isUploading = ref(false);

// Get flash messages from Inertia
const successMessage = computed(() => page.props.flash?.success);
const errorMessage = computed(() => page.props.errors?.avatar);

// Use the current user from auth instead of props for real-time updates
const currentUser = computed(() => page.props.auth.user);

const handleFileSelect = (event: Event) => {
    const target = event.target as HTMLInputElement;
    const file = target.files?.[0];

    if (file) {
        uploadAvatar(file);
    }
};

const uploadAvatar = async (file: File) => {
    isUploading.value = true;

    const formData = new FormData();
    formData.append('avatar', file);

    router.post(route('avatar.store'), formData, {
        preserveScroll: true,
        only: ['auth', 'flash', 'errors'],
        onFinish: () => {
            isUploading.value = false;
            if (fileInput.value) {
                fileInput.value.value = '';
            }
            // Show success or error toast based on response
            const flash = page.props.flash;
            const errors = page.props.errors;
            if (flash && flash.success) {
                toast.success(flash.success);
            } else if (errors && errors.avatar) {
                toast.error(errors.avatar);
            }
        },
    });
};

const removeAvatar = async () => {
    isUploading.value = true;

    router.delete(route('avatar.destroy'), {
        preserveScroll: true,
        only: ['auth', 'flash', 'errors'],
        onFinish: () => {
            isUploading.value = false;
            // Show success toast
            const flash = page.props.flash;
            if (flash && flash.success) {
                toast.success(flash.success);
            }
        },
    });
};

const triggerFileInput = () => {
    fileInput.value?.click();
};
</script>

<template>
    <div class="space-y-4">
        <div class="flex items-center space-x-4">
            <UserAvatar :user="currentUser" size="large" />

            <div class="space-y-2">
                <div class="flex space-x-2">
                    <Button @click="triggerFileInput" :disabled="isUploading" size="sm">
                        <Upload class="mr-2 h-4 w-4" />
                        {{ isUploading ? 'Uploading...' : 'Upload Photo' }}
                    </Button>

                    <Button v-if="currentUser.has_avatar" @click="removeAvatar" :disabled="isUploading" variant="outline" size="sm">
                        <X class="mr-2 h-4 w-4" />
                        Remove
                    </Button>
                </div>

                <p class="text-sm text-muted-foreground">Upload a new avatar. JPEG, PNG, GIF, or WebP. Max size 2MB.</p>
            </div>
        </div>

        <!-- Success Message -->
        <div v-if="successMessage" class="flex items-center space-x-2 text-sm text-green-600 dark:text-green-400">
            <div class="flex h-4 w-4 items-center justify-center rounded-full bg-green-100 dark:bg-green-900">
                <div class="h-2 w-2 rounded-full bg-green-600 dark:bg-green-400"></div>
            </div>
            <span>{{ successMessage }}</span>
        </div>

        <!-- Error Message -->
        <div v-if="errorMessage" class="flex items-center space-x-2 text-sm text-destructive">
            <AlertCircle class="h-4 w-4" />
            <span>{{ errorMessage }}</span>
        </div>

        <!-- Hidden file input -->
        <input ref="fileInput" type="file" accept="image/jpeg,image/png,image/gif,image/webp" @change="handleFileSelect" class="hidden" />
    </div>
</template>
