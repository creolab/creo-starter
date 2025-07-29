<script setup lang="ts">
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { FlipWords } from '@/components/ui/flip-words';
import { ParticlesBg } from '@/components/ui/particles-bg';
import { RainbowButton } from '@/components/ui/rainbow-button';
import { useColorMode } from '@vueuse/core';
import { ArrowRight, Sparkles } from 'lucide-vue-next';

import { computed } from 'vue';

const colorMode = useColorMode();
const isDark = computed(() => colorMode.value === 'dark');
</script>

<template>
    <section class="relative overflow-hidden bg-gradient-to-br from-background via-background to-muted/20">
        <ParticlesBg class="absolute inset-0" :quantity="125" :ease="150" :color="isDark ? '#FFF' : '#000'" :staticity="10" refresh />

        <div class="bg-grid-white/[0.02] absolute inset-0 bg-[size:60px_60px]" />
        <div class="relative mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <Badge variant="secondary" class="mb-4 inline-flex items-center gap-2 px-3 py-1">
                    <Sparkles class="h-3 w-3" />
                    Now with shadcn-vue components
                </Badge>

                <h1
                    class="mx-auto max-w-4xl bg-gradient-to-r from-foreground to-foreground/50 bg-clip-text text-4xl font-semibold tracking-tight text-transparent sm:text-6xl lg:text-7xl"
                >
                    Build
                    <FlipWords :words="['beautiful', 'fast', 'simple']" :duration="3000" class="inline-block font-bold" />
                    apps
                    <span class="block text-primary">faster than ever</span>
                </h1>

                <p class="mx-auto mt-6 max-w-2xl text-lg text-muted-foreground sm:text-xl">
                    A modern Laravel + Vue.js starter kit with shadcn-vue components, Tailwind v4, and everything you need to ship your next project.
                </p>

                <div class="mt-10 flex flex-col items-center justify-center gap-4 p-0 sm:flex-row">
                    <RainbowButton :speed="10" class="h-auto p-0">
                        <a href="#" class="flex items-center rounded-xl bg-gray-800 px-8 py-2 text-sm text-white">
                            Get Started
                            <ArrowRight class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" />
                        </a>
                    </RainbowButton>
                    <Button variant="outline" size="lg"> View Documentation </Button>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.bg-grid-white {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='32' height='32' fill='none' stroke='rgb(15 23 42 / 0.04)'%3e%3cpath d='m0 .5h32m-32 0v32'/%3e%3c/svg%3e");
}
</style>
