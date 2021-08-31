<template>
    <dash-layout title="Removed posts">
        <template #header>
            <h1 class="text-via-900 font-semibold text-3xl dark:text-white">Removed posts</h1>
            <span class="text-gray-500 dark:text-white/75">Edit and restore deleted posts</span>
        </template>

        <section class="flex items-center justify-between py-3 px-4 rounded-lg bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50">
            <span class="text-via-800 dark:text-white">Fast access</span>
            <div class="space-x-4 py-4">
                <Link class="text-white bg-green-500 hover:bg-green-600 rounded-md py-2 px-3 text-sm" :href="route('posts.create')">Create new post</Link>
                <Link class="text-white bg-indigo-600 hover:bg-indigo-700 rounded-md py-2 px-3 text-sm" :href="route('posts')">Back to posts</Link>
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
                    <th scope="col" class="px-5 py-3 border-b border-gray-200 dark:border-via-500/25"></th>
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
                        <span v-if="post.status === 'published'" class="bg-green-200/50 py-2 px-3 rounded-lg font-semibold text-green-500 leading-tight">
                            published
                        </span>
                        <span v-else-if="post.status === 'draft'" class="bg-yellow-200/50 py-2 px-3 rounded-lg font-semibold text-yellow-600 leading-tight">
                            draft
                        </span>
                        <span v-else-if="post.status === 'scheduled'" class="bg-indigo-200/50 py-2 px-3 rounded-lg font-semibold text-indigo-600 leading-tight">
                            scheduled
                        </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50 text-sm">
                        {{ diffHumans(post.created_at) }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-via-500/50 text-sm space-x-4">
                        <Link :href="route('posts.restore',post.id)" method="post" class="text-blue-500 hover:text-blue-600">
                            Restore
                        </Link>
                        <Link :href="route('posts.edit',slug(post.title))" class="text-green-500 hover:text-green-600">
                            Edit
                        </Link>
                        <Link :href="route('posts.remove',post.id)" :data="{ forceDelete:true }" method="post" class="text-red-500 hover:text-red-600">
                            Remove
                        </Link>
                    </td>
                </tr>
                <tr v-if="posts.data.length === 0">
                    <td class="py-5"></td>
                    <span class="absolute w-full text-center left-0 text-gray-600 text-white/75 text-sm py-5">There are no removed posts</span>
                </tr>

                </tbody>
            </table>
            <div class="p-5 flex justify-center lg:justify-end">
                <div class="flex items-center divide-x dark:divide-via-900 border dark:border-via-900 rounded-xl overflow-hidden bg-white dark:bg-via-900">
                    <Link v-for="(link,key) in posts.links" :href="link.url" :class="{ 'text-green-500':link.active, 'p-4':!isNumber(link.label),'py-2 px-4':isNumber(link.label),'pointer-events-none':hasDisabled(link.url)}" class="w-full text-base text-gray-500 hover:bg-gray-100 dark:hover:bg-opacity-5" preserve-scroll>
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
