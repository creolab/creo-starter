<script setup lang="ts">
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { ArrowRight, Sparkles } from 'lucide-vue-next';
</script>

<template>
    <section class="relative overflow-hidden bg-gradient-to-br from-background via-background to-muted/20">
        <div class="bg-grid-white/[0.02] absolute inset-0 bg-[size:60px_60px]" />
        <div class="relative mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <Badge variant="secondary" class="mb-4 inline-flex items-center gap-2 px-3 py-1">
                    <Sparkles class="h-3 w-3" />
                    Now with shadcn-vue components
                </Badge>

                <h1
                    class="mx-auto max-w-4xl bg-gradient-to-r from-foreground to-foreground/70 bg-clip-text text-4xl font-bold tracking-tight text-transparent sm:text-6xl lg:text-7xl"
                >
                    Build beautiful apps
                    <span class="block text-primary">faster than ever</span>
                </h1>

                <p class="mx-auto mt-6 max-w-2xl text-lg text-muted-foreground sm:text-xl">
                    A modern Laravel + Vue.js starter kit with shadcn-vue components, Tailwind v4, and everything you need to ship your next project.
                </p>

                <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <Button size="lg" class="group">
                        Get Started
                        <ArrowRight class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" />
                    </Button>
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
