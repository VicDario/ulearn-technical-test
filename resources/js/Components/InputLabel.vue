<script setup lang="ts">
defineProps<{
    labelFor: string;
    value?: string;
}>();
</script>

<template>
    <label :for="labelFor" class="block text-sm font-medium text-gray-700">
        {{ value }}
    </label>
</template>
