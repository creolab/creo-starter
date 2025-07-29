<script setup lang="ts">
import { Card, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { CheckCircle, Rocket, Shield, Sparkles, Users, Zap } from 'lucide-vue-next';

const features = [
    {
        icon: Zap,
        title: 'Lightning Fast',
        description: 'Built with Vite and optimized for speed. Hot reload, instant builds, and blazing fast development.',
    },
    {
        icon: Shield,
        title: 'Production Ready',
        description: 'Laravel backend with authentication, authorization, and all the security features you need.',
    },
    {
        icon: Sparkles,
        title: 'Beautiful UI',
        description: 'shadcn-vue components with Tailwind v4. Consistent, accessible, and customizable design system.',
    },
    {
        icon: Users,
        title: 'Team Friendly',
        description: 'TypeScript, ESLint, Prettier, and consistent code formatting. Perfect for team collaboration.',
    },
    {
        icon: Rocket,
        title: 'Deploy Anywhere',
        description: 'Optimized for Vercel, Netlify, or any hosting platform. One-command deployment.',
    },
    {
        icon: CheckCircle,
        title: 'Well Tested',
        description: 'Comprehensive test suite with Pest PHP. Confident refactoring and reliable deployments.',
    },
];
</script>

<template>
    <section id="features" class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Everything you need to build amazing apps</h2>
                <p class="mt-4 text-lg text-muted-foreground">Packed with modern tools and components to accelerate your development</p>
            </div>

            <div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <Card
                    v-for="feature in features"
                    :key="feature.title"
                    class="group border-0 bg-gradient-to-br from-background to-muted/20 shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl"
                >
                    <CardHeader>
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10 text-primary">
                            <component :is="feature.icon" class="h-6 w-6" />
                        </div>
                        <CardTitle class="text-xl">{{ feature.title }}</CardTitle>
                        <CardDescription>{{ feature.description }}</CardDescription>
                    </CardHeader>
                </Card>
            </div>
        </div>
    </section>
</template>
