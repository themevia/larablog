<template>
    <dash-layout title="Posts">
        <template #header>
            <h1 class="text-via-900 font-semibold text-3xl dark:text-white">Editing post</h1>
            <span class="text-gray-500 dark:text-white/75">Edit and save the post</span>
        </template>

        <section class="flex items-center justify-between py-3 px-4 rounded-lg bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50">
            <span class="text-via-800 dark:text-white">Fast access</span>
            <div class="space-x-4 py-4">
                <Link class="text-white bg-green-500 hover:bg-green-600 rounded-md py-2 px-3 text-sm" :href="route('posts.create',form.slug)">Copy this post</Link>
                <Link class="text-white bg-red-500 hover:bg-red-600 rounded-md py-2 px-3 text-sm" href="/">Remove this post</Link>
                <Link class="text-white bg-indigo-600 hover:bg-indigo-700 rounded-md py-2 px-3 text-sm" :href="route('posts')">Back to posts</Link>
            </div>
        </section>

        <section class="py-3 px-4 rounded-lg bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50">
            <h3 class="text-via-800 dark:text-white text-sm font-medium">Viewing {{ post.title }} the post</h3>
            <div class="md:px-2 lg:px-3 xl:px-4">
                <div class="flex gap-6 p-4 pt-8 text-center">
                    <div>
                        <span class="text-gray-500 dark:text-white/75">Total views</span>
                        <div class="font-semibold text-lg text-via-500/75 dark:text-white/75">{{ post.view_count }}</div>
                    </div>
                    <div>
                        <span class="text-gray-500 dark:text-white/75">Total likes</span>
                        <div class="font-semibold text-lg text-via-500/75 dark:text-white/75">{{ post.like_count }}</div>
                    </div>
                    <div>
                        <span class="text-gray-500 dark:text-white/75">Total comments</span>
                        <div class="font-semibold text-lg text-via-500/75 dark:text-white/75">{{ post.comment_count }}</div>
                    </div>
                </div>
                <div class="mt-20">
                    <apexcharts width="100%" height="100" :options="chart.options" :series="chart.series"></apexcharts>
                </div>
            </div>
        </section>

        <section class="overflow-hidden rounded-lg bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/5">
            <div class="relative bg-gray-200 dark:bg-via-500 bg-cover bg-center" :class="[ form.image === null ? 'h-48':'h-56' ]" id="preview-image" :style="[ 'background-image:url(/images/'+post.cover_photo+')' ]">
                <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
                    <span v-if="form.image === null" class="text-gray-400 uppercase">No cover photo</span>
                </div>
                <div class="absolute bottom-5 right-5">
                    <label for="image">
                        <span v-if="form.image !== null" class="text-sm cursor-pointer rounded-lg bg-green-500 hover:bg-green-600 py-2 px-3 text-white">Change cover photo</span>
                        <span v-else class="text-sm cursor-pointer hover:underline text-gray-700">Set cover photo</span>
                        <input id="image" type="file" @change="filePreview" @input="form.image = $event.target.files[0]" class="hidden"/>
                    </label>
                </div>
            </div>
            <div class="space-y-8 py-3 px-4">
                <div>
                    <Label for="title" value="Title"/>
                    <Input id="title" type="text" class="mt-1 block w-full dark:border-via-500/25 dark:bg-via-900/50" v-model="form.title" placeholder="Post title" required/>
                </div>
                <div id="app">
                    <Label value="Content"/>
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
                       }" :initial-value="post.content"/>
                </div>
                <div>
                    <Label for="tags" value="Tags"/>
                    <Input id="tags" type="text" class="mt-1 block w-full" placeholder="separate tags with commas" v-model="form.tags"/>
                </div>
                <div class="grid gap-4 grid-cols-2">
                    <div>
                        <Label for="comment" value="Comment"/>
                        <select v-model="form.comment" class="w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm" id="comment">
                            <option value="open">Open</option>
                            <option value="close">Close</option>
                        </select>
                    </div>
                    <div>
                        <Label for="status" value="Status"/>
                        <select v-model="form.status" class="w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm" id="status">
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                            <option value="scheduled">Scheduled</option>
                        </select>
                    </div>
                </div>
                <div v-if="form.status === 'scheduled'">
                    <Label for="scheduled_date" value="Scheduled date"/>
                    <Input id="scheduled_date" type="date" class="mt-1 block w-full" v-model="form.scheduled_date"/>
                </div>
            </div>
        </section>
    </dash-layout>
</template>

<script>
import DashLayout from '@/Layouts/DashLayout.vue'
import apexcharts from "vue3-apexcharts"
import Editor from '@tinymce/tinymce-vue'
import Input from '@/Jetstream/Input.vue'
import Label from '@/Jetstream/Label.vue'
import Button from "@/Jetstream/Button.vue"
import { Link,useForm } from '@inertiajs/inertia-vue3'

export default {
    components: {
        DashLayout,
        apexcharts,
        Editor,
        Input,
        Label,
        Button,
        Link
    },
    props: {
        post: Array,
    },
    methods: {
        submit() {
            this.form
                .post(this.route('posts.edit'),{
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
    },
    data() {
        return {
            chart: {
                options: {
                    chart: {
                        type: 'bar',
                        sparkline: {
                            enabled: true
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            endingShape: 'rounded',

                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                    },
                    yaxis: {
                        title: {
                            text: '$ (thousands)'
                        }
                    },
                    fill: {
                        opacity: 1

                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return "$ " + val + " thousands"
                            }
                        }
                    }
                },
                series: [{
                    name: 'Views',
                    data: [44, 55, 57, 56, 61,76, 85, 101, 98]
                }, {
                    name: 'Likes',
                    data: [76, 85, 101, 98, 87,44, 55, 57, 61]
                },{
                    name: 'Comments',
                    data: [76, 85, 101, 98, 87,44, 55, 56, 61]
                }],

            },
            form: useForm({
                image: this.post.cover_photo,
                title: this.post.title,
                content: this.post.content,
                tags: this.post.tags,
                comment: this.post.comment,
                status: this.post.status,
                scheduled_date: this.post.scheduled_date,
                goToBack: false
            }),
        }
    },
}



</script>
