<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps<{
    laravelVersion: string;
}>();

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Ulern - Prueba Técnica" />
    <div class="flex min-h-screen flex-col">
        <main class="flex flex-grow flex-col items-center justify-center p-4">
            <div class="mb-8 text-center">
                <h1 class="mb-4 text-3xl font-bold">Ulern - Prueba Técnica</h1>
                <p>
                    Hola, Soy Víctor Fernández y esta es mi prueba técnica para
                    Ulern
                </p>
                <div class="mt-4 flex justify-center space-x-4">
                    <Link
                        :href="route('login')"
                        class="rounded bg-blue-500 px-4 py-2 font-bold text-white transition duration-300 hover:bg-blue-600"
                    >
                        Iniciar Sesión
                    </Link>
                    <Link
                        :href="route('register')"
                        class="rounded border border-gray-400 bg-white px-4 py-2 font-semibold text-gray-800 shadow transition duration-300 hover:bg-gray-100"
                    >
                        Registrarse
                    </Link>
                </div>
            </div>

            <div class="mb-8">
                <ApplicationLogo />
            </div>
        </main>

        <footer class="bg-gray-100 py-4 text-center">
            <p class="text-sm text-gray-600">
                Hecho con Laravel {{ props.laravelVersion }}.
            </p>
        </footer>
    </div>
</template>
