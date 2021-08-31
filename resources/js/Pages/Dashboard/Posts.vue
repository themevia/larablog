<template>
    <dash-layout title="Posts">
        <template #header>
            <h1 class="text-via-900 font-semibold text-3xl dark:text-white">Posts</h1>
            <span class="text-gray-500 dark:text-white/75">View posts, add new and see stats</span>
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
                        Post views
                    </p>
                </div>
                <div class="flex flex-col justify-start">
                    <p class="text-via-800/75 dark:text-gray-100 text-lg font-semibold my-1">
                        {{ totalViews }}
                    </p>
<!--                    <div class="flex items-center text-green-500 text-sm">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1408 1216q0 26-19 45t-45 19h-896q-26 0-45-19t-19-45 19-45l448-448q19-19 45-19t45 19l448 448q19 19 19 45z">
                            </path>
                        </svg>
                        <span>
                            5.5%
                        </span>
                        <span class="text-gray-400">
                            vs last month
                        </span>
                    </div>-->
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
                        Post likes
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
                        Post comments
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
                    <p v-if="totalViews === 0">- It looks like you don't have any post views. <span v-if="totalPosts === 0 && totalLikes !== 0">Or did you not create any posts?</span> </p>
                    <p v-if="totalLikes === 0">- Oh no, there are no post likes <span v-if="totalViews === 0">either</span>. <span v-if="totalPosts === 0">Or did you not create any posts?</span></p>
                    <p v-if="totalViews !== 0 && totalComments === 0">- Oh no, you don't have any comments, your comment count plays a big role in interaction.</p>
                    <p v-if="publishedPosts === 0">- There are no posts published. Post a post and interact with your followers</p>
                </div>
            </div>
            <div class="space-x-4 py-4">
                <Link class="text-white bg-green-500 hover:bg-green-600 rounded-md py-2 px-3 text-sm" :href="route('posts.create')">Create new post</Link>
                <Link class="text-white bg-blue-500 hover:bg-blue-600 rounded-md py-2 px-3 text-sm" :href="route('posts.bin')">Removed posts</Link>
            </div>
        </section>

        <div class="bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50 rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead class="text-left text-sm text-left text-sm text-gray-800 dark:text-white">
                <tr>
                    <th scope="col" class="px-5 py-3 border-b border-gray-200 dark:border-via-500/25">
                        #
                    </th>
                    <th scope="col" class="px-5 py-3 border-b border-gray-200 dark:border-via-500/25">
                        Title
                    </th>
                    <th scope="col" class="px-5 py-3 border-b border-gray-200 dark:border-via-500/25">
                        Category
                    </th>
                    <th scope="col" class="px-5 py-3 border-b border-gray-200 dark:border-via-500/25">
                        Author
                    </th>
                    <th scope="col" class="px-5 py-3 border-b border-gray-200 dark:border-via-500/25">
                        Status
                    </th>
                    <th scope="col" class="px-5 py-3 border-b border-gray-200 dark:border-via-500/25">
                        Date
                    </th>
                    <th scope="col" class="px-5 py-3  border-b border-gray-200 dark:border-via-500/25"></th>
                </tr>
                </thead>
                <tbody class="relative text-sm dark:text-white/75">
                <tr v-for="post in posts.data">
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50">
                        {{ post.id }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50">
                        {{ post.title }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50">
                        {{ post.category }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50">
                        {{ post.author }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50">
                        <span v-if="post.status === 'published'" class="bg-green-200 py-2 px-3 rounded-lg font-semibold text-green-500 leading-tight">
                            published
                        </span>
                        <span v-else-if="post.status === 'draft'" class="bg-yellow-200 py-2 px-3 rounded-lg font-semibold text-yellow-600 leading-tight">
                            draft
                        </span>
                        <span v-else-if="post.status === 'scheduled'" class="bg-indigo-200 py-2 px-3 rounded-lg font-semibold text-indigo-600 leading-tight">
                            scheduled
                        </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50 text-sm">
                        {{ diffHumans(post.created_at) }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50 text-sm space-x-4">
                        <Link :href="route('posts.edit',slug(post.title))" class="text-green-500 hover:text-green-600">
                            Edit
                        </Link>
                        <Link :href="route('posts.remove',post.id)" method="post" class="text-red-500 hover:text-red-600">
                            Remove
                        </Link>
                    </td>
                </tr>
                <tr v-if="posts.data.length === 0">
                    <td class="py-5"></td>
                    <span class="absolute w-full text-center left-0 text-gray-600 text-white/75 text-sm py-5">Post not found. If you deleted the posts, look in the trash</span>
                </tr>

                </tbody>
            </table>
            <div class="p-5 flex justify-center lg:justify-end">
                <div class="flex items-center divide-x dark:divide-via-900 border dark:border-via-900 rounded-xl overflow-hidden bg-white dark:bg-via-900">
                    <Link v-for="(link,key) in posts.links" :href="link.url" :class="{ 'text-green-500 dark:text-green-300':link.active, 'p-4':!isNumber(link.label),'py-2 px-4':isNumber(link.label), 'pointer-events-none':hasDisabled(link.url)}" class="w-full text-base text-gray-500 hover:bg-gray-100 dark:hover:bg-opacity-5" preserve-scroll>
                        <svg v-if="key === 0" width="9" fill="currentColor" height="8" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1427 301l-531 531 531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19l-742-742q-19-19-19-45t19-45l742-742q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z"></path>
                        </svg>
                        <svg v-else-if="key === posts.links.length-1" width="9" fill="currentColor" height="8" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z"></path>
                        </svg>
                        <span v-else>{{ link.label }}</span>
                    </Link>

                </div>
            </div>
        </div>

        <section v-if="interactionPosts.length !== 0">
            <h3 class="text-via-800 font-semibold text-xl mb-2">Most interacted</h3>
            <div class="grid grid-cols-2 gap-4">
                <div v-for="post in interactionPosts" class="bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50 p-4 rounded-lg flex md:flex-row flex-col gap-4">
                    <div class="relative">
                        <div v-if="post.cover_photo !== null" class="rounded-xl w-40 h-28 bg-cover bg-center" :style="{backgroundImage: 'url(/images/'+post.cover_photo+')'}"></div>
                        <div v-else class="rounded-xl w-40 h-28 bg-gray-200 flex items-center justify-center">
                            <span class="text-xs text-gray-400 uppercase">No cover photo</span>
                        </div>
                        <span class="px-2 py-1 text-white bg-green-500 text-xs rounded absolute right-2 bottom-2 bg-opacity-75">
                            {{ diffHumans(post.created_at) }}
                        </span>
                    </div>
                    <div class="">
                        <p class="text-lg leading-5 mb-2 dark:text-white">{{ post.title }}</p>
                        <div class="flex flex-col text-gray-500 text-sm my-2 md:m-0">
                            <div class="flex items-center">
                                <svg width="10" height="10" fill="currentColor" class="mr-2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1664 960q-152-236-381-353 61 104 61 225 0 185-131.5 316.5t-316.5 131.5-316.5-131.5-131.5-316.5q0-121 61-225-229 117-381 353 133 205 333.5 326.5t434.5 121.5 434.5-121.5 333.5-326.5zm-720-384q0-20-14-34t-34-14q-125 0-214.5 89.5t-89.5 214.5q0 20 14 34t34 14 34-14 14-34q0-86 61-147t147-61q20 0 34-14t14-34zm848 384q0 34-20 69-140 230-376.5 368.5t-499.5 138.5-499.5-139-376.5-368q-20-35-20-69t20-69q140-229 376.5-368t499.5-139 499.5 139 376.5 368q20 35 20 69z"></path>
                                </svg>
                                {{ post.view_count }} views
                            </div>
                            <div class="flex items-center">
                                <svg width="10" height="10" fill="currentColor" class="mr-2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M896 1664q-26 0-44-18l-624-602q-10-8-27.5-26t-55.5-65.5-68-97.5-53.5-121-23.5-138q0-220 127-344t351-124q62 0 126.5 21.5t120 58 95.5 68.5 76 68q36-36 76-68t95.5-68.5 120-58 126.5-21.5q224 0 351 124t127 344q0 221-229 450l-623 600q-18 18-44 18z"></path>
                                </svg>
                                {{ post.like_count }} likes
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
        posts: Array,
        interactionPosts: Array,
        totalViews: Number,
        totalLikes: Number,
        totalComments: Number,
        totalPosts: Number,
        publishedPosts: Number,
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
