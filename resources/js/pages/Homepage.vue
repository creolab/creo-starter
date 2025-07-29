<script setup lang="ts">
import { CTASection, FeaturesSection, HeroSection, HomepageHeader, TestimonialsSection } from '@/components/homepage';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Homepage">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <div class="min-h-screen bg-background">
        <HomepageHeader />
        <HeroSection />
        <FeaturesSection />
        <TestimonialsSection />
        <CTASection />
    </div>
</template>

<style scoped>
.bg-grid-white {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='32' height='32' fill='none' stroke='rgb(15 23 42 / 0.04)'%3e%3cpath d='m0 .5h32m-32 0v32'/%3e%3c/svg%3e");
}
</style>
