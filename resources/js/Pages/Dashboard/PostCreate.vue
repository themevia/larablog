<template>
    <dash-layout title="Posts">
        <template #header>
            <h1 class="text-via-900 font-semibold text-3xl dark:text-white">Create post</h1>
            <span class="text-gray-500 dark:text-white/75">Create a new post</span>
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
            <form @submit.prevent="submit">
                <div class="relative bg-gray-200 dark:bg-via-500 bg-cover bg-center" :class="[ form.image === null ? 'h-48':'h-56' ]" id="preview-image">
                    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
                        <span v-if="form.image === null" class="text-gray-400 uppercase">No cover photo</span>
                    </div>
                    <div class="absolute bottom-5 right-5">
                        <label for="image">
                            <span v-if="form.image !== null" class="text-sm cursor-pointer rounded-lg bg-green-500 hover:bg-green-600 py-2 px-3 text-white">Change cover photo</span>
                            <span v-else class="text-sm cursor-pointer hover:underline text-gray-700 dark:text-gray-300">Set cover photo</span>
                            <input id="image" type="file" @change="filePreview" @input="form.image = $event.target.files[0]" class="hidden"/>
                        </label>
                    </div>
                </div>

                <div class="space-y-8 py-3 px-4">
                    <div>
                        <Label for="title" value="Title"/>
                        <Input id="title" type="text" class="mt-1 block w-full" v-model="form.title" placeholder="Post title" required/>
                    </div>
                    <div id="app">
                        <Label value="Content"/>
                        <editor :init="{
                         height: 500,
                         menubar: false,
                         contentCss: '/css/app.css',
                         plugins: [
                           'advlist autolink lists link image charmap print preview anchor',
                           'searchreplace visualblocks code fullscreen',
                           'insertdatetime media table paste code help wordcount fullscreen'
                         ],
                         toolbar:
                           'undo redo | formatselect | bold italic backcolor | \
                           alignleft aligncenter alignright alignjustify | \
                           bullist numlist outdent indent | removeformat | link image help'
                       }" output-form="html" v-model="form.content"/>
                    </div>
                    <div>
                        <Label for="tags" value="Tags"/>
                        <Input id="tags" type="text" class="mt-1 block w-full" placeholder="separate tags with commas" v-model="form.tags" required/>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <Label for="comment" value="Comment"/>
                            <select v-model="form.comment" class="dark:border-via-500/25 dark:bg-via-900/50 dark:text-white/75 w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm" id="comment">
                                <option value="open">Open</option>
                                <option value="close">Close</option>
                            </select>
                        </div>
                        <div>
                            <Label for="status" value="Status"/>
                            <select v-model="form.status" class="dark:border-via-500/25 dark:bg-via-900/50 dark:text-white/75 w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm" id="status">
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                                <option value="scheduled">Scheduled</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <Label for="category" value="Category"/>
                            <select placeholder="deneme" v-model="form.category_id" class="dark:border-via-500/25 dark:bg-via-900/50 dark:text-white/75 w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm" id="category">
                                <option disabled selected value="0">Select category</option>
                                <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
                            </select>
                        </div>
                        <div v-if="form.status === 'scheduled'">
                            <Label for="scheduled_date" value="Scheduled date"/>
                            <Input id="scheduled_date" type="date" class="mt-1 block w-full" v-model="form.scheduled_date"/>
                        </div>
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
    props: {
        post: Array,
        categories: Array,
    },
    data() {
        return {
            form: useForm({
                image: null,
                title: null,
                content: null,
                tags: null,
                category: null,
                comment: 'open',
                status: 'draft',
                scheduled_date: null,
                goToBack: false
            }),
        }
    },
    methods: {
        submit() {
            this.form
                .post(this.route('posts.create'),{
                    preserveScroll: true
            })
        },
        filePreview() {
            let reader = new FileReader();
            reader.onloadend = function (ev) {
                document.getElementById('preview-image').style.backgroundImage = "url('"+ev.target.result+"')";
            }
            reader.readAsDataURL(this.form.image);
        },
    }

}



</script>
