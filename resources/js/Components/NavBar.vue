<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <nav class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex flex-shrink-0 items-center">
                    <Link href="/">
                        <ApplicationLogo />
                    </Link>
                </div>
                <div class="flex items-center">
                    <ResponsiveNavLink
                        :href="route('logout')"
                        method="post"
                        as="button"
                    >
                        Log Out
                    </ResponsiveNavLink>
                </div>
            </div>
        </div>
    </nav>
</template>
