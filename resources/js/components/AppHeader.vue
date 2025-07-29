<script setup lang="ts">
import AppLogo from '@/components/AppLogo.vue';
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { Button } from '@/components/ui/button';
import { DropdownMenu, DropdownMenuContent, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { NavigationMenu, NavigationMenuItem, NavigationMenuList, navigationMenuTriggerStyle } from '@/components/ui/navigation-menu';
import { Sheet, SheetContent, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { Tooltip, TooltipContent, TooltipProvider, TooltipTrigger } from '@/components/ui/tooltip';
import UserMenuContent from '@/components/UserMenuContent.vue';
import { getInitials } from '@/composables/useInitials';
import type { BreadcrumbItem, NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { BookOpen, Folder, LayoutGrid, Menu, Search } from 'lucide-vue-next';
import { computed } from 'vue';

interface Props {
    breadcrumbs?: BreadcrumbItem[];
}

const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const page = usePage();
const auth = computed(() => page.props.auth);

const fullName = computed(() => {
    if (auth.value?.user) {
        return `${auth.value.user.first_name} ${auth.value.user.last_name}`;
    }
    return '';
});

const isCurrentRoute = computed(() => (url: string) => page.url === url);

const activeItemStyles = computed(
    () => (url: string) => (isCurrentRoute.value(url) ? 'text-neutral-900 dark:bg-neutral-800 dark:text-neutral-100' : ''),
);

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
];

const rightNavItems: NavItem[] = [
    {
        title: 'Repository',
        href: 'https://github.com/laravel/vue-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs',
        icon: BookOpen,
    },
];
</script>

<template>
    <header class="sticky top-0 z-40 border-b bg-background">
        <div class="h-16 px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Mobile menu trigger -->
                <div class="flex items-center lg:hidden">
                    <Sheet>
                        <SheetTrigger as-child>
                            <Button variant="ghost" size="sm" class="mr-2 -ml-2 h-12 w-12 p-0">
                                <Menu class="h-6 w-6" />
                                <span class="sr-only">Toggle navigation menu</span>
                            </Button>
                        </SheetTrigger>
                        <SheetContent side="left" class="pr-0">
                            <SheetHeader class="space-y-0 text-left">
                                <SheetTitle class="flex items-center">
                                    <AppLogo />
                                </SheetTitle>
                            </SheetHeader>
                            <div class="my-4 h-[calc(100vh-8rem)] pb-10 pl-6">
                                <div class="flex h-full flex-col justify-between">
                                    <div>
                                        <div class="space-y-1">
                                            <Link
                                                v-for="item in mainNavItems"
                                                :key="item.href"
                                                :href="item.href"
                                                :class="[
                                                    'flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary',
                                                    activeItemStyles(item.href),
                                                ]"
                                            >
                                                <component :is="item.icon" class="h-4 w-4" />
                                                {{ item.title }}
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </SheetContent>
                    </Sheet>
                </div>

                <!-- Logo -->
                <div class="flex items-center gap-2 lg:gap-4">
                    <div class="hidden lg:block">
                        <AppLogo />
                    </div>
                    <div class="block lg:hidden">
                        <AppLogoIcon />
                    </div>
                </div>

                <!-- Navigation -->
                <NavigationMenu class="hidden lg:flex">
                    <NavigationMenuList>
                        <NavigationMenuItem v-for="item in mainNavItems" :key="item.href">
                            <Link :href="item.href" :class="[navigationMenuTriggerStyle(), activeItemStyles(item.href)]">
                                <component :is="item.icon" class="mr-2 h-4 w-4" />
                                {{ item.title }}
                            </Link>
                        </NavigationMenuItem>
                    </NavigationMenuList>
                </NavigationMenu>

                <!-- Breadcrumbs for smaller screens -->
                <div class="hidden min-w-0 flex-1 md:block lg:hidden">
                    <Breadcrumbs v-if="breadcrumbs.length > 0" :breadcrumbs="breadcrumbs" />
                </div>

                <!-- Right side -->
                <div class="flex items-center gap-2">
                    <!-- Search -->
                    <TooltipProvider>
                        <Tooltip>
                            <TooltipTrigger as-child>
                                <Button variant="ghost" size="icon" class="h-10 w-10">
                                    <Search class="h-4 w-4" />
                                    <span class="sr-only">Search</span>
                                </Button>
                            </TooltipTrigger>
                            <TooltipContent>
                                <p>Search</p>
                            </TooltipContent>
                        </Tooltip>
                    </TooltipProvider>

                    <!-- External links -->
                    <div class="hidden items-center gap-2 sm:flex">
                        <TooltipProvider>
                            <Tooltip v-for="item in rightNavItems" :key="item.href">
                                <TooltipTrigger as-child>
                                    <Button variant="ghost" size="icon" class="h-10 w-10" as-child>
                                        <Link :href="item.href" target="_blank" rel="noopener noreferrer">
                                            <component :is="item.icon" class="h-4 w-4" />
                                            <span class="sr-only">{{ item.title }}</span>
                                        </Link>
                                    </Button>
                                </TooltipTrigger>
                                <TooltipContent>
                                    <p>{{ item.title }}</p>
                                </TooltipContent>
                            </Tooltip>
                        </TooltipProvider>
                    </div>

                    <!-- User menu -->
                    <DropdownMenu>
                        <DropdownMenuTrigger as-child>
                            <Button
                                variant="ghost"
                                size="icon"
                                class="relative size-10 w-auto rounded-full p-1 focus-within:ring-2 focus-within:ring-primary"
                            >
                                <Avatar class="size-8 overflow-hidden rounded-full">
                                    <AvatarImage v-if="auth.user.avatar_url" :src="auth.user.avatar_url" :alt="fullName" />
                                    <AvatarFallback class="rounded-lg bg-neutral-200 font-semibold text-black dark:bg-neutral-700 dark:text-white">
                                        {{ getInitials(fullName) }}
                                    </AvatarFallback>
                                </Avatar>
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent class="w-[--radix-dropdown-menu-trigger-width] min-w-56" align="end">
                            <UserMenuContent :user="auth.user" />
                        </DropdownMenuContent>
                    </DropdownMenu>
                </div>
            </div>
        </div>

        <!-- Breadcrumbs for larger screens -->
        <div class="hidden border-t px-4 py-3 sm:px-6 lg:block lg:px-8">
            <Breadcrumbs v-if="breadcrumbs.length > 0" :breadcrumbs="breadcrumbs" />
        </div>
    </header>
</template>
