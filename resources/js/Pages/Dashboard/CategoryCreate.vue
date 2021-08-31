<template>
    <dash-layout title="Posts">
        <template #header>
            <h1 class="text-via-900 font-semibold text-3xl dark:text-white">Create category</h1>
            <span class="text-gray-500 dark:text-white/75">Create a new category</span>
        </template>

        <section class="flex items-start justify-between py-3 px-4 rounded-lg bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50">
            <div>
                <span class="text-via-800 dark:text-white">Fast access</span>
                <jet-validation-errors class="mt-4" />
            </div>
            <div class="space-x-4 py-4">
                <Link class="text-white bg-indigo-600 hover:bg-indigo-700 rounded-md py-2 px-3 text-sm" :href="route('posts')">Back to posts</Link>
            </div>
        </section>

        <section class="overflow-hidden rounded-lg bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/5">
            <form @submit.prevent="submit" class="space-y-8 py-3 px-4">
                <div class="space-y-8 py-3 px-4">
                    <div>
                        <Label for="title" value="Title"/>
                        <Input id="title" type="text" class="mt-1 block w-full" v-model="form.title" placeholder="Post title" required/>
                    </div>
                    <div id="app">
                        <Label value="Desription"/>
                        <editor :init="{
                         height: 500,
                         menubar: false,
                         plugins: [
                           'advlist autolink lists link image charmap print preview anchor',
                           'searchreplace visualblocks code fullscreen',
                           'insertdatetime media table paste code help wordcount fullscreen'
                         ],
                         toolbar:
                           'undo redo | formatselect | bold italic backcolor | \
                           alignleft aligncenter alignright alignjustify | \
                           bullist numlist outdent indent | removeformat | link image help'
                       }" output-form="html" v-model="form.description"/>
                    </div>
                    <div>
                        <Label for="color" value="Color"/>
                        <Input id="color" type="color" class="mt-1 block w-full" v-model="form.color" required/>
                    </div>
                </div>
                <div class="flex gap-4 justify-center lg:justify-end items-center my-4 mx-6">
                    <button v-on:click="form.goToBack = true" :disabled="form.processing" class="text-sm py-2 px-3 px-4 py-2 bg-indigo-800 border border-transparent rounded-md text-white tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">Create and go to posts</button>
                    <Button v-on:click="form.goToBack = false" :disabled="form.processing" class="text-sm py-2 px-3 !font-normal">Create</Button>
                </div>
            </form>
        </section>
    </dash-layout>
</template>

<script>
import DashLayout from '@/Layouts/DashLayout.vue'
import Editor from '@tinymce/tinymce-vue'
import Input from '@/Jetstream/Input.vue'
import Label from '@/Jetstream/Label.vue'
import Button from "@/Jetstream/Button.vue"
import { Link, useForm } from '@inertiajs/inertia-vue3'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'

export default {
    components: {
        DashLayout,
        Editor,
        Input,
        Label,
        Button,
        Link,
        JetValidationErrors
    },
    data() {
        return {
            form: useForm({
                title: null,
                description: null,
                color: null,
                goToBack: false
            }),
        }
    },
    methods: {
        submit() {
            this.form
                .post(this.route('categories.create'),{
                    preserveScroll: true
            })
        },
    },

}



</script>
