<template>
    <Link :href="'/'">
        <svg class="text-green-500 fill-current h-16" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 269.3 404.4">
            <path d="M95.1,3c0,94.2,0,188.4,0,282.5c-29.5,33.4-59,66.7-88.6,100.1c0.1-94.3,0.1-188.7,0.2-283C36.2,69.4,65.7,36.2,95.1,3z"/>
            <path d="M17.4,400.1C46.9,366.6,76.5,333,106,299.5c53.1,0.1,106.1,0.1,159.2,0.2c-29.4,33.4-58.7,66.9-88.1,100.3	C123.9,400,70.6,400.1,17.4,400.1z"/>
        </svg>
    </Link>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Link,
        },
    }
</script>
