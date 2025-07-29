<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { ChevronRight } from 'lucide-vue-next';
</script>

<template>
    <section class="py-24">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Ready to build something amazing?</h2>
            <p class="mt-4 text-lg text-muted-foreground">Start your next project with the perfect foundation. Get up and running in minutes.</p>
            <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                <Button size="lg" class="group">
                    Start Building
                    <ChevronRight class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" />
                </Button>
                <Button variant="outline" size="lg"> Learn More </Button>
            </div>
        </div>
    </section>
</template>
