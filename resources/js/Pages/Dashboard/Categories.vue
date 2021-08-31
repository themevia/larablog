<template>
    <dash-layout title="Categories">
        <template #header>
            <h1 class="text-via-900 font-semibold text-3xl dark:text-white">Categories</h1>
            <span class="text-gray-500 dark:text-white/75">View, edit and crate categories</span>
        </template>


        <section class="grid gap-3 grid-cols-3">
            <div class="bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50 rounded-lg p-4">
                <div class="flex items-center">
                    <span class="rounded-md relative p-4 bg-green-200">
                        <svg width="20" height="20" fill="currentColor" class="text-green-500 h-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1664 960q-152-236-381-353 61 104 61 225 0 185-131.5 316.5t-316.5 131.5-316.5-131.5-131.5-316.5q0-121 61-225-229 117-381 353 133 205 333.5 326.5t434.5 121.5 434.5-121.5 333.5-326.5zm-720-384q0-20-14-34t-34-14q-125 0-214.5 89.5t-89.5 214.5q0 20 14 34t34 14 34-14 14-34q0-86 61-147t147-61q20 0 34-14t14-34zm848 384q0 34-20 69-140 230-376.5 368.5t-499.5 138.5-499.5-139-376.5-368q-20-35-20-69t20-69q140-229 376.5-368t499.5-139 499.5 139 376.5 368q20 35 20 69z"></path>
                        </svg>
                    </span>
                    <p class="text-md text-via-800 dark:text-white ml-2">
                        category views
                    </p>
                </div>
                <div class="flex flex-col justify-start">
                    <p class="text-via-800/75 dark:text-gray-100 text-lg font-semibold my-1">
                        {{ totalViews }}
                    </p>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50 rounded-lg p-4">
                <div class="flex items-center">
                    <span class="rounded-md relative p-4 bg-green-200">
                        <svg fill="currentColor" width="20" height="20" class="text-green-500 h-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M466.27 286.69C475.04 271.84 480 256 480 236.85c0-44.015-37.218-85.58-85.82-85.58H357.7c4.92-12.81 8.85-28.13 8.85-46.54C366.55 31.936 328.86 0 271.28 0c-61.607 0-58.093 94.933-71.76 108.6-22.747 22.747-49.615 66.447-68.76 83.4H32c-17.673 0-32 14.327-32 32v240c0 17.673 14.327 32 32 32h64c14.893 0 27.408-10.174 30.978-23.95 44.509 1.001 75.06 39.94 177.802 39.94 7.22 0 15.22.01 22.22.01 77.117 0 111.986-39.423 112.94-95.33 13.319-18.425 20.299-43.122 17.34-66.99 9.854-18.452 13.664-40.343 8.99-62.99zm-61.75 53.83c12.56 21.13 1.26 49.41-13.94 57.57 7.7 48.78-17.608 65.9-53.12 65.9h-37.82c-71.639 0-118.029-37.82-171.64-37.82V240h10.92c28.36 0 67.98-70.89 94.54-97.46 28.36-28.36 18.91-75.63 37.82-94.54 47.27 0 47.27 32.98 47.27 56.73 0 39.17-28.36 56.72-28.36 94.54h103.99c21.11 0 37.73 18.91 37.82 37.82.09 18.9-12.82 37.81-22.27 37.81 13.489 14.555 16.371 45.236-5.21 65.62zM88 432c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z"></path>
                        </svg>
                    </span>
                    <p class="text-md text-via-800 dark:text-white ml-2">
                        category likes
                    </p>
                </div>
                <div class="flex flex-col justify-start">
                    <p class="text-via-800/75 dark:text-gray-100 text-lg font-semibold my-1">
                        {{ totalLikes }}
                    </p>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50 rounded-lg p-4">
                <div class="flex items-center">
                    <span class="rounded-md relative p-4 bg-green-200">
                        <svg fill="currentColor" width="20" height="20" class="text-green-500 h-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M448 0H64C28.7 0 0 28.7 0 64v288c0 35.3 28.7 64 64 64h96v84c0 7.1 5.8 12 12 12 2.4 0 4.9-.7 7.1-2.4L304 416h144c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64zm16 352c0 8.8-7.2 16-16 16H288l-12.8 9.6L208 428v-60H64c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16h384c8.8 0 16 7.2 16 16v288zM325.8 240.2C308.5 260.4 283.1 272 256 272s-52.5-11.6-69.8-31.8c-8.6-10.1-23.8-11.3-33.8-2.7s-11.2 23.8-2.7 33.8c26.5 31 65.2 48.7 106.3 48.7s79.8-17.8 106.2-48.7c8.6-10.1 7.4-25.2-2.7-33.8-10-8.6-25.1-7.4-33.7 2.7zM192 192c17.7 0 32-14.3 32-32s-14.3-32-32-32-32 14.3-32 32 14.3 32 32 32zm128 0c17.7 0 32-14.3 32-32s-14.3-32-32-32-32 14.3-32 32 14.3 32 32 32z"></path>
                        </svg>
                    </span>
                    <p class="text-md text-via-800 dark:text-white ml-2">
                        category comments
                    </p>
                </div>
                <div class="flex flex-col justify-start">
                    <p class="text-via-800/75 dark:text-gray-100 text-lg font-semibold my-1">
                        {{ totalComments }}
                    </p>
                </div>
            </div>
        </section>

        <section class="flex items-start justify-between py-3 px-4 rounded-lg bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50">
            <div>
                <span class="text-via-800 dark:text-white">Fast access</span>
                <div class="mt-4 mb-3 mx-2 text-sm text-yellow-500">
                    <p v-if="totalViews === 0">- It looks like you don't have any category views. <span v-if="totalPosts === 0 && totalLikes !== 0">Or did you not create any posts?</span> </p>
                    <p v-if="totalLikes === 0">- Oh no, there are no category likes <span v-if="totalViews === 0">either</span>. <span v-if="totalPosts === 0">Or did you not create any posts?</span></p>
                    <p v-if="totalViews !== 0 && totalComments === 0">- Oh no, you don't have any comments, your comment count plays a big role in interaction.</p>
                    <p v-if="publishedPosts === 0">- There are no posts published. category a category and interact with your followers</p>
                </div>
            </div>
            <div class="space-x-4 py-4">
                <Link class="text-white bg-green-500 hover:bg-green-600 rounded-md py-2 px-3 text-sm" :href="route('categories.create')">Create new category</Link>
            </div>
        </section>

        <div class="bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50 rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                <tr>
                    <th scope="col" class="px-5 py-3 border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                        #
                    </th>
                    <th scope="col" class="px-5 py-3 border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                        Title
                    </th>
                    <th scope="col" class="px-5 py-3 border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                        Author
                    </th>
                    <th scope="col" class="px-5 py-3 border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                        Date
                    </th>
                    <th scope="col" class="px-5 py-3  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal"></th>
                </tr>
                </thead>
                <tbody class="relative">
                <tr v-for="category in categories.data">
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50 text-sm">
                        {{ category.id }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50 text-sm">
                        {{ category.title }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50 text-sm">
                        {{ category.author }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50 text-sm">
                        {{ diffHumans(category.created_at) }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50 text-sm space-x-4">
                        <Link :href="route('categories.edit',slug(category.title))" class="text-green-500 hover:text-green-600">
                            Edit
                        </Link>
                        <Link :href="route('categories.remove',category.id)" method="post" class="text-red-500 hover:text-red-600">
                            Remove
                        </Link>
                    </td>
                </tr>
                <tr v-if="categories.data.length === 0">
                    <td class="py-5"></td>
                    <span class="absolute w-full text-center left-0 text-gray-600 text-sm py-5">category not found. If you deleted the categories, look in the trash</span>
                </tr>

                </tbody>
            </table>
            <div class="p-5 flex justify-center lg:justify-end">
                <div class="flex items-center divide-x border rounded-xl overflow-hidden">
                    <Link v-for="(link,key) in categories.links" :href="link.url" :class="{ 'text-green-500':link.active, 'p-4':!isNumber(link.label),'py-2 px-4':isNumber(link.label), 'pointer-events-none':hasDisabled(link.url)}" class="w-full text-base text-gray-500 bg-white hover:bg-gray-100" preserve-scroll>
                        <svg v-if="key === 0" width="9" fill="currentColor" height="8" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1427 301l-531 531 531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19l-742-742q-19-19-19-45t19-45l742-742q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z"></path>
                        </svg>
                        <svg v-else-if="key === categories.links.length-1" width="9" fill="currentColor" height="8" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z"></path>
                        </svg>
                        <span v-else>{{ link.label }}</span>
                    </Link>

                </div>
            </div>
        </div>

    </dash-layout>
</template>

<script>
import DashLayout from '@/Layouts/DashLayout.vue'
import { Link } from '@inertiajs/inertia-vue3'
import moment from 'moment'

export default {
    components: {
        DashLayout,
        Link
    },
    props: {
        categories: Array,
    },
    methods: {
        slug(value) {
            value = value.toLowerCase().replace(/\s+/g, "-")
                .replace(/&/g, `-and-`)
                .replace(/--/g, `-`);
            return value;
        },
        isNumber(value) {
            return /^-?[\d.]+(?:e-?\d+)?$/.test(value)
        },
        hasDisabled(value) {
            return value === '' || value === null || window.location.href === value;
        },
        diffHumans(date) {
            return moment(date).fromNow()
        },
    },
}



</script>
