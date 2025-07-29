<script setup lang="ts">
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Head } from '@inertiajs/vue3';
import { ArrowRight, CheckCircle, ChevronRight, Quote, Rocket, Shield, Sparkles, Star, Users, Zap } from 'lucide-vue-next';
</script>

<template>
    <Head title="Homepage">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <div class="min-h-screen bg-background">
        <!-- Hero Section -->
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
                        A modern Laravel + Vue.js starter kit with shadcn-vue components, Tailwind v4, and everything you need to ship your next
                        project.
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

        <!-- Features Section -->
        <section class="py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Everything you need to build amazing apps</h2>
                    <p class="mt-4 text-lg text-muted-foreground">Packed with modern tools and components to accelerate your development</p>
                </div>

                <div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <Card
                        class="group border-0 bg-gradient-to-br from-background to-muted/20 shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl"
                    >
                        <CardHeader>
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10 text-primary">
                                <Zap class="h-6 w-6" />
                            </div>
                            <CardTitle class="text-xl">Lightning Fast</CardTitle>
                            <CardDescription>
                                Built with Vite and optimized for speed. Hot reload, instant builds, and blazing fast development.
                            </CardDescription>
                        </CardHeader>
                    </Card>

                    <Card
                        class="group border-0 bg-gradient-to-br from-background to-muted/20 shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl"
                    >
                        <CardHeader>
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10 text-primary">
                                <Shield class="h-6 w-6" />
                            </div>
                            <CardTitle class="text-xl">Production Ready</CardTitle>
                            <CardDescription>
                                Laravel backend with authentication, authorization, and all the security features you need.
                            </CardDescription>
                        </CardHeader>
                    </Card>

                    <Card
                        class="group border-0 bg-gradient-to-br from-background to-muted/20 shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl"
                    >
                        <CardHeader>
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10 text-primary">
                                <Sparkles class="h-6 w-6" />
                            </div>
                            <CardTitle class="text-xl">Beautiful UI</CardTitle>
                            <CardDescription>
                                shadcn-vue components with Tailwind v4. Consistent, accessible, and customizable design system.
                            </CardDescription>
                        </CardHeader>
                    </Card>

                    <Card
                        class="group border-0 bg-gradient-to-br from-background to-muted/20 shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl"
                    >
                        <CardHeader>
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10 text-primary">
                                <Users class="h-6 w-6" />
                            </div>
                            <CardTitle class="text-xl">Team Friendly</CardTitle>
                            <CardDescription>
                                TypeScript, ESLint, Prettier, and consistent code formatting. Perfect for team collaboration.
                            </CardDescription>
                        </CardHeader>
                    </Card>

                    <Card
                        class="group border-0 bg-gradient-to-br from-background to-muted/20 shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl"
                    >
                        <CardHeader>
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10 text-primary">
                                <Rocket class="h-6 w-6" />
                            </div>
                            <CardTitle class="text-xl">Deploy Anywhere</CardTitle>
                            <CardDescription> Optimized for Vercel, Netlify, or any hosting platform. One-command deployment. </CardDescription>
                        </CardHeader>
                    </Card>

                    <Card
                        class="group border-0 bg-gradient-to-br from-background to-muted/20 shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl"
                    >
                        <CardHeader>
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10 text-primary">
                                <CheckCircle class="h-6 w-6" />
                            </div>
                            <CardTitle class="text-xl">Well Tested</CardTitle>
                            <CardDescription>
                                Comprehensive test suite with Pest PHP. Confident refactoring and reliable deployments.
                            </CardDescription>
                        </CardHeader>
                    </Card>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="bg-muted/30 py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Loved by developers worldwide</h2>
                    <p class="mt-4 text-lg text-muted-foreground">See what others are saying about their experience</p>
                </div>

                <div class="mt-16 grid gap-8 lg:grid-cols-3">
                    <Card class="border-0 bg-background/50 shadow-lg backdrop-blur-sm">
                        <CardContent class="p-6">
                            <div class="mb-4 flex items-center gap-1">
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                            </div>
                            <Quote class="mb-4 h-8 w-8 text-muted-foreground/30" />
                            <p class="mb-4 text-muted-foreground">
                                "This starter kit saved me weeks of setup time. The shadcn-vue components are beautiful and the Laravel integration is
                                seamless."
                            </p>
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-primary to-primary/70" />
                                <div>
                                    <p class="font-semibold">Sarah Chen</p>
                                    <p class="text-sm text-muted-foreground">Full Stack Developer</p>
                                </div>
                            </div>
                        </CardContent>
                    </Card>

                    <Card class="border-0 bg-background/50 shadow-lg backdrop-blur-sm">
                        <CardContent class="p-6">
                            <div class="mb-4 flex items-center gap-1">
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                            </div>
                            <Quote class="mb-4 h-8 w-8 text-muted-foreground/30" />
                            <p class="mb-4 text-muted-foreground">
                                "The TypeScript setup is perfect, and the component library is exactly what I needed. Highly recommended for any
                                Vue.js project."
                            </p>
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-primary to-primary/70" />
                                <div>
                                    <p class="font-semibold">Marcus Rodriguez</p>
                                    <p class="text-sm text-muted-foreground">Frontend Lead</p>
                                </div>
                            </div>
                        </CardContent>
                    </Card>

                    <Card class="border-0 bg-background/50 shadow-lg backdrop-blur-sm">
                        <CardContent class="p-6">
                            <div class="mb-4 flex items-center gap-1">
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                                <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                            </div>
                            <Quote class="mb-4 h-8 w-8 text-muted-foreground/30" />
                            <p class="mb-4 text-muted-foreground">
                                "Tailwind v4 with shadcn-vue is a game-changer. The development experience is incredible and the final product looks
                                professional."
                            </p>
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-primary to-primary/70" />
                                <div>
                                    <p class="font-semibold">Alex Thompson</p>
                                    <p class="text-sm text-muted-foreground">UI/UX Designer</p>
                                </div>
                            </div>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
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
    </div>
</template>

<style scoped>
.bg-grid-white {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='32' height='32' fill='none' stroke='rgb(15 23 42 / 0.04)'%3e%3cpath d='m0 .5h32m-32 0v32'/%3e%3c/svg%3e");
}
</style>
