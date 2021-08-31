<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <slot name="logo" />
        </div>

        <div class="relative z-50 w-full sm:max-w-md mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg">
            <slot />
        </div>
        <div class="absolute top-0 left-0 w-full h-full">
            <slot name="bg"></slot>
        </div>
    </div>
</template>
