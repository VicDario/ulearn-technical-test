<script setup lang="ts">
import DetailItem from '@/Components/DetailItem.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
    user: User;
}>();
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Perfil
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Iniciaste Sesión!</div>
                </div>
            </div>
        </div>

        <main
            className="flex-grow flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
        >
            <div className="max-w-md w-full space-y-8">
                <div className="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div className="px-4 py-5 sm:px-6">
                        <h3
                            className="text-lg leading-6 font-medium text-gray-900"
                        >
                            Información de usuario
                        </h3>
                    </div>
                    <div className="border-t border-gray-200">
                        <dl>
                            <DetailItem
                                title="Nombre"
                                :value="user.name"
                                :isStriped="true"
                            />
                            <DetailItem
                                title="Apellido"
                                :value="user.lastname"
                                :isStriped="true"
                            />
                            <DetailItem
                                title="Correo electrónico"
                                :value="user.email"
                                :isStriped="false"
                            />
                            <DetailItem
                                title="Número de teléfono"
                                :value="user.phone"
                                :isStriped="true"
                            />
                        </dl>
                    </div>
                </div>
            </div>
        </main>
    </AuthenticatedLayout>
</template>
