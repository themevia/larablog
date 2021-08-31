<template>
    <app-layout title="Welcome to blog">
        <section id="hero" class="relative bg-cover bg-center" style="background-image: url('https://www.gezdimgordumseyahat.com/img/turlar/09222020121557.jpg')">
            <div class="absolute w-full h-full top-0 left-0 bg-black/50"></div>
            <div class="relative z-20 py-24 lara-container text-center">
                <h1 class="text-white text-3xl font-semibold">Larablog</h1>
                <h2 class="text-xl text-white/75 font-medium">Welcome to green world's blog</h2>
            </div>
        </section>

        <section class="my-3 lara-container">
            <h3 class="text-via-800 font-medium text-2xl">Featured articles</h3>
            <div class="grid gap-8 grid-cols-5 mt-6">
                <div class="col-span-3 grid grid-cols-3 bg-gray-100 rounded-lg overflow-hidden">
                    <div class="col-span-2 py-8 px-4">
                        <div class="flex gap-2">
                            <span class="rounded-md bg-green-200 text-xs font-medium text-green-500 py-1 px-2 uppercase dark:text-blue-400">Larablog</span>
                            <span class="text-sm text-gray-400">6 min read</span>
                        </div>
                        <a href="#" class="block mt-2 text-xl font-semibold text-via-800/75 hover:text-via-800">I Built A Successful Blog In One Year</a>
                        <p class="text-gray-600 text-sm mt-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolorum qui quod?</p>
                    </div>
                    <div class="bg-via-800 flex items-center justify-center">
                        <svg class="text-green-500 fill-current w-12" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 269.3 404.4">
                            <path d="M95.1,3c0,94.2,0,188.4,0,282.5c-29.5,33.4-59,66.7-88.6,100.1c0.1-94.3,0.1-188.7,0.2-283C36.2,69.4,65.7,36.2,95.1,3z"/>
                            <path d="M17.4,400.1C46.9,366.6,76.5,333,106,299.5c53.1,0.1,106.1,0.1,159.2,0.2c-29.4,33.4-58.7,66.9-88.1,100.3	C123.9,400,70.6,400.1,17.4,400.1z"/>
                        </svg>
                    </div>
                </div>
                <div class="col-span-2 bg-gray-100 rounded-lg p-3">
                    <div class="flex gap-2">
                        <span class="rounded-md bg-green-200 text-xs font-medium text-green-500 py-1 px-2 uppercase dark:text-blue-400">Discovery</span>
                        <span class="text-sm text-gray-400">3 min read</span>
                    </div>
                    <a href="#" class="block mt-2 text-xl font-semibold text-via-800/75 hover:text-via-800">I Built A Successful Blog In One Year</a>
                    <p class="mt-2 text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Molestie parturient et sem ipsum volutpat vel. Natoque sem et aliquam mauris egestas quam volutpat viverra. In pretium nec senectus erat. Et malesuada lobortis.</p>
                </div>
                <div class="col-span-2 bg-gray-100 rounded-lg p-3">
                    <div class="flex gap-2">
                        <span class="rounded-md bg-green-200 text-xs font-medium text-green-500 py-1 px-2 uppercase dark:text-blue-400">Discovery</span>
                        <span class="text-sm text-gray-400">12 min read</span>
                    </div>
                    <a href="#" class="block mt-2 text-xl font-semibold text-via-800/75 hover:text-via-800">I Built A Successful Blog In One Year</a>
                    <p class="mt-2 text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Molestie parturient et sem ipsum volutpat vel. Natoque sem et aliquam mauris egestas quam volutpat viverra. In pretium nec senectus erat. Et malesuada lobortis.</p>
                </div>
                <div class="col-span-3 grid grid-cols-2 bg-gray-100 rounded-lg overflow-hidden">
                    <div class="bg-gray-300 flex items-center justify-center">
                        <svg class="text-green-500 fill-current w-12" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 269.3 404.4">
                            <path d="M95.1,3c0,94.2,0,188.4,0,282.5c-29.5,33.4-59,66.7-88.6,100.1c0.1-94.3,0.1-188.7,0.2-283C36.2,69.4,65.7,36.2,95.1,3z"/>
                            <path d="M17.4,400.1C46.9,366.6,76.5,333,106,299.5c53.1,0.1,106.1,0.1,159.2,0.2c-29.4,33.4-58.7,66.9-88.1,100.3	C123.9,400,70.6,400.1,17.4,400.1z"/>
                        </svg>
                    </div>
                    <div class="py-8 px-4">
                        <div class="flex gap-2">
                            <span class="rounded-md bg-green-200 text-xs font-medium text-green-500 py-1 px-2 uppercase dark:text-blue-400">Larablog</span>
                            <span class="text-sm text-gray-400">7 min read</span>
                        </div>
                        <a href="#" class="block mt-2 text-xl font-semibold text-via-800/75 hover:text-via-800">I Built A Successful Blog In One Year</a>
                        <p class="text-gray-600 text-sm mt-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolorum qui quod?</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-3 lara-container">
            <h3 class="text-via-800 font-medium text-2xl">Recently published articles</h3>
            <div class="max-w-3xl divide-y divide-gray-300 space-y-8 mt-6">
                <div class="pt-8">
                    <div class="flex items-center gap-2">
                        <p class="w-fit rounded-md font-semibold text-green-500 uppercase">Larablog</p>
                        <span class="text-gray-400 text-sm uppercase font-medium">12 Jun 2021</span>
                    </div>
                    <a href="#" class="block mt-2 text-xl font-semibold text-via-800/75 hover:text-via-800">I Built A Successful Blog In One Year</a>
                    <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur doloribus error nostrum recusandae sequi totam, vitae voluptatum.</p>
                    <span class="text-sm text-gray-400 mt-2 font-medium">6 min read</span>
                </div>
                <div class="pt-8">
                    <div class="flex items-center gap-2">
                        <p class="w-fit rounded-md font-semibold text-green-500 uppercase">Larablog</p>
                        <span class="text-gray-400 text-sm uppercase font-medium">12 Jun 2021</span>
                    </div>
                    <a href="#" class="block mt-2 text-xl font-semibold text-via-800/75 hover:text-via-800">I Built A Successful Blog In One Year</a>
                    <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur doloribus error nostrum recusandae sequi totam, vitae voluptatum.</p>
                    <span class="text-sm text-gray-400 mt-2 font-medium">6 min read</span>
                </div>
                <div class="pt-8">
                    <div class="flex items-center gap-2">
                        <p class="w-fit rounded-md font-semibold text-green-500 uppercase">Larablog</p>
                        <span class="text-gray-400 text-sm uppercase font-medium">12 Jun 2021</span>
                    </div>
                    <a href="#" class="block mt-2 text-xl font-semibold text-via-800/75 hover:text-via-800">I Built A Successful Blog In One Year</a>
                    <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur doloribus error nostrum recusandae sequi totam, vitae voluptatum.</p>
                    <span class="text-sm text-gray-400 mt-2 font-medium">6 min read</span>
                </div>
            </div>
        </section>

        <section class="bg-cover text-center py-20 mt-6" style="background-image: url('http://localhost/oblive/main/images/bgven.svg')">
            <span class="text-via-800 font-semibold text-3xl">Join the green world</span>
            <p class="text-via-800/75 text-lg mt-2 mb-6">Register to be able to comment, interact</p>
            <Link :href="route('register')" class="py-2 px-4 rounded text-white bg-green-500 font-medium">Register</Link>

        </section>

    </app-layout>
</template>
<script>

import { Link } from '@inertiajs/inertia-vue3'
import AppLayout from "../Layouts/AppLayout"

export default {
    components: {
        Link,
        AppLayout,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    }
}
</script>
