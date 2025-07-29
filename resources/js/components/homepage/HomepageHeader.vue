<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { useAppearance } from '@/composables/useAppearance';
import { Link, usePage } from '@inertiajs/vue3';
import { Monitor, Moon, Sparkles, Sun } from 'lucide-vue-next';
import { computed } from 'vue';

const page = usePage();
const auth = computed(() => page.props.auth);
const { appearance, updateAppearance } = useAppearance();

const tabs = [
    { value: 'light', Icon: Sun, label: 'Light' },
    { value: 'dark', Icon: Moon, label: 'Dark' },
    { value: 'system', Icon: Monitor, label: 'System' },
] as const;

// Get the current appearance icon
const currentAppearanceIcon = computed(() => {
    const currentTab = tabs.find((tab) => tab.value === appearance.value);
    return currentTab?.Icon || Monitor;
});
</script>

<template>
    <header class="sticky top-0 z-50 w-full border-b border-border/40 bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60">
        <div class="container mx-auto flex h-16 items-center justify-between px-4">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <div class="flex items-center space-x-2">
                    <Sparkles class="h-8 w-8 rounded-lg bg-gradient-to-br from-primary to-primary/70 p-1.5 text-white" />
                    <span class="text-xl font-bold">Creo</span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="hidden items-center space-x-6 md:flex">
                <a href="#features" class="text-sm font-medium text-muted-foreground transition-colors hover:text-foreground"> Features </a>
                <a href="#testimonials" class="text-sm font-medium text-muted-foreground transition-colors hover:text-foreground"> Testimonials </a>
            </nav>

            <!-- Right side: Appearance switch and Auth link -->
            <div class="flex items-center space-x-4">
                <!-- Appearance Switch Dropdown -->
                <DropdownMenu>
                    <DropdownMenuTrigger as-child>
                        <Button variant="ghost" size="icon" class="h-9 w-9">
                            <component :is="currentAppearanceIcon" class="h-4 w-4" />
                            <span class="sr-only">Toggle appearance</span>
                        </Button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="end">
                        <DropdownMenuItem @click="updateAppearance('light')" class="flex items-center gap-2">
                            <Sun class="h-4 w-4" />
                            <span>Light</span>
                        </DropdownMenuItem>
                        <DropdownMenuItem @click="updateAppearance('dark')" class="flex items-center gap-2">
                            <Moon class="h-4 w-4" />
                            <span>Dark</span>
                        </DropdownMenuItem>
                        <DropdownMenuItem @click="updateAppearance('system')" class="flex items-center gap-2">
                            <Monitor class="h-4 w-4" />
                            <span>System</span>
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>

                <!-- Auth Link -->
                <Link
                    :href="auth.user ? '/dashboard' : '/login'"
                    class="inline-flex h-9 items-center justify-center rounded-md border border-input bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:outline-none disabled:pointer-events-none disabled:opacity-50"
                >
                    {{ auth.user ? 'Dashboard' : 'Login' }}
                </Link>
            </div>
        </div>
    </header>
</template>
