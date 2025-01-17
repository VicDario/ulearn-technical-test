<script setup lang="ts">
defineProps<{
    value?: string;
}>();
</script>

<template>
    <label class="block text-sm font-medium text-gray-700">
        {{ value }}
    </label>
</template>
