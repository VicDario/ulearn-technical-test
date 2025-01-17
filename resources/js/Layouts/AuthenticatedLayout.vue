<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import NavBar from '@/Components/NavBar.vue';
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <NavBar />

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
