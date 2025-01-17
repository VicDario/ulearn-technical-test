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
    <div className="min-h-screen flex flex-col">
        <main
            className="flex-grow flex flex-col items-center justify-center p-4"
        >
            <div className="text-center mb-8">
                <h1 className="text-3xl font-bold mb-4">
                    Ulern - Prueba Técnica
                </h1>
                <p>
                    Hola, Soy Víctor Fernández y esta es mi prueba técnica para
                    Ulern
                </p>
                <div className="flex justify-center space-x-4 mt-4">
                    <Link
                        :href="route('login')"
                        className="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300"
                    >
                        Iniciar Sesión
                    </Link>
                    <Link
                        :href="route('register')"
                        className="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow transition duration-300"
                    >
                        Registrarse
                    </Link>
                </div>
            </div>

            <div className="mb-8">
                <ApplicationLogo />
            </div>
        </main>

        <footer className="py-4 text-center bg-gray-100">
            <p className="text-sm text-gray-600">
                Hecho con Laravel {{ props.laravelVersion }}.
            </p>
        </footer>
    </div>
</template>
