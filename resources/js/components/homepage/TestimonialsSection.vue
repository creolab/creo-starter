<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card';
import { Quote, Star } from 'lucide-vue-next';

const testimonials = [
    {
        quote: 'This starter kit saved me weeks of setup time. The shadcn-vue components are beautiful and the Laravel integration is seamless.',
        author: 'Sarah Chen',
        role: 'Full Stack Developer',
    },
    {
        quote: 'The TypeScript setup is perfect, and the component library is exactly what I needed. Highly recommended for any Vue.js project.',
        author: 'Marcus Rodriguez',
        role: 'Frontend Lead',
    },
    {
        quote: 'Tailwind v4 with shadcn-vue is a game-changer. The development experience is incredible and the final product looks professional.',
        author: 'Alex Thompson',
        role: 'UI/UX Designer',
    },
];
</script>

<template>
    <section id="testimonials" class="bg-muted/30 py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Loved by developers worldwide</h2>
                <p class="mt-4 text-lg text-muted-foreground">See what others are saying about their experience</p>
            </div>

            <div class="mt-16 grid gap-8 lg:grid-cols-3">
                <Card v-for="testimonial in testimonials" :key="testimonial.author" class="border-0 bg-background/50 shadow-lg backdrop-blur-sm">
                    <CardContent class="p-6">
                        <div class="mb-4 flex items-center gap-1">
                            <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                            <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                            <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                            <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                            <Star class="h-4 w-4 fill-yellow-400 text-yellow-400" />
                        </div>
                        <Quote class="mb-4 h-8 w-8 text-muted-foreground/30" />
                        <p class="mb-4 text-muted-foreground">{{ testimonial.quote }}</p>
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-primary to-primary/70" />
                            <div>
                                <p class="font-semibold">{{ testimonial.author }}</p>
                                <p class="text-sm text-muted-foreground">{{ testimonial.role }}</p>
                            </div>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </div>
    </section>
</template>
