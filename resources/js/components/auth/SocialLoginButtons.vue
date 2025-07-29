<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Separator } from '@/components/ui/separator';
import { Chrome, Facebook, Github } from 'lucide-vue-next';

const handleGoogleLogin = () => {
    window.location.href = route('auth.google');
};

const handleFacebookLogin = () => {
    window.location.href = route('auth.facebook');
};

const handleGithubLogin = () => {
    window.location.href = route('auth.github');
};
</script>

<template>
    <div class="space-y-4">
        <!-- Divider -->
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <Separator class="w-full" />
            </div>
            <div class="relative flex justify-center text-xs uppercase">
                <span class="bg-background px-2 text-muted-foreground">Or continue with</span>
            </div>
        </div>

        <!-- Social Login Buttons -->
        <div class="grid gap-3 md:grid-cols-3">
            <!-- Google -->
            <Button variant="outline" class="w-full" @click="handleGoogleLogin">
                <Chrome class="mr-2 h-4 w-4" />
                Google
            </Button>

            <!-- Facebook -->
            <Button variant="outline" class="w-full" @click="handleFacebookLogin">
                <Facebook class="mr-2 h-4 w-4" />
                Facebook
            </Button>

            <!-- GitHub -->
            <Button variant="outline" class="w-full" @click="handleGithubLogin">
                <Github class="mr-2 h-4 w-4" />
                GitHub
            </Button>
        </div>
    </div>
</template>
