<template>
    <dash-layout title="Overview">
        <template #header>
            <h1 class="text-via-900 font-semibold text-3xl dark:text-white">Not found this page</h1>
            <span class="text-gray-500 dark:text-white/75">Welcome to</span>
        </template>

        <div class="">
            <h1 class="text-3xl text-via-800 dark:text-white font-semibold">Not found</h1>
            <p></p>
        </div>

    </dash-layout>
</template>

<script>
import DashLayout from '@/Layouts/DashLayout.vue'

export default {
    components: {
        DashLayout,
    }
}



</script>
