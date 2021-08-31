<template>
    <dash-layout title="Posts">
        <template #header>
            <h1 class="text-via-900 font-semibold text-3xl dark:text-white">Displaying post</h1>
            <span class="text-gray-500 dark:text-white/75">See shipment details and statistics</span>
        </template>

        <section class="flex items-center justify-between py-3 px-4 sect">
            <span class="text-via-800 dark:text-white">Fast access</span>
            <div class="space-x-4 py-4">
                <Link class="text-white bg-green-500 hover:bg-green-600 rounded-md py-2 px-3 text-sm" :href="route('posts.create',post.slug)">Copy this post</Link>
                <Link class="text-white bg-red-500 hover:bg-red-600 rounded-md py-2 px-3 text-sm" href="/">Remove this post</Link>
                <Link class="text-white bg-indigo-600 hover:bg-indigo-700 rounded-md py-2 px-3 text-sm" :href="route('posts')">Back to posts</Link>
            </div>
        </section>

        <section class="py-3 px-4 sect">
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

        <section class="overflow-hidden sect">
            <div class="relative bg-gray-200 bg-cover bg-center" :class="[ post.cover_photo === null ? 'h-48':'h-56' ]" id="preview-image" :style="[ 'background-image:url(/images/'+post.cover_photo+')' ]">
                <div v-if="post.cover_photo === null" class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
                    <span class="text-gray-400 uppercase">No cover photo</span>
                </div>
            </div>
            <div class="py-3 px-4 space-y-6">
               <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                   <div class="">
                       <h4 class="font-semibold text-lg">Title</h4>
                       <p class="py-2 px-2 text-gray-700">
                           {{ post.title }}
                       </p>
                   </div>
                   <div class="">
                       <h4 class="font-semibold text-lg">Tags</h4>
                       <p class="py-2 px-2 text-gray-700">
                           {{ post.tags }}
                       </p>
                   </div>
                   <div class="">
                       <h4 class="font-semibold text-lg">Creation time</h4>
                       <p class="py-2 px-2 text-gray-700">
                           {{ diffHumans(post.created_at) }}
                       </p>
                   </div>
                   <div class="">
                       <h4 class="font-semibold text-lg">Last updated date</h4>
                       <p class="py-2 px-2 text-gray-700">
                           {{ diffHumans(post.updated_at) }}
                       </p>
                   </div>
               </div>
                <div class="">
                    <h4 class="font-semibold text-lg">Content</h4>
                    <div class="py-2 px-2 text-gray-700 border border-gray-200 rounded-lg bg-white/25">
                        <span v-html="post.content"></span>
                    </div>
                </div>

            </div>
        </section>
    </dash-layout>
</template>

<script>
import DashLayout from '@/Layouts/DashLayout.vue'
import apexcharts from "vue3-apexcharts"
import Button from "@/Jetstream/Button.vue"
import { Link } from '@inertiajs/inertia-vue3'
import moment from 'moment'

export default {
    components: {
        DashLayout,
        apexcharts,
        Button,
        Link
    },
    props: {
        post: Array,
        like_by_month: Array,
        comment_by_month: Array,
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
                        categories: [
                            this.p_month(12),this.p_month(11),this.p_month(10),
                            this.p_month(9), this.p_month(8), this.p_month(7),
                            this.p_month(6), this.p_month(5), this.p_month(4),
                            this.p_month(3), this.p_month(2), this.p_month(1)],
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
                                return val;
                            }
                        }
                    }
                },
                series: [{
                    name: 'Likes',
                    data: [
                        this.by_like(11),this.by_like(10),this.by_like(9),
                        this.by_like(8),this.by_like(7), this.by_like(6),
                        this.by_like(5),this.by_like(4), this.by_like(3),
                        this.by_like(2),this.by_like(1),this.by_like(0)
                    ]
                }, {
                    name: 'Comments',
                    data: [
                        this.by_like(11),this.by_like(10),this.by_like(9),
                        this.by_like(8),this.by_like(7), this.by_like(6),
                        this.by_like(5),this.by_like(4), this.by_like(3),
                        this.by_like(2),this.by_like(1),this.by_like(0)
                    ]
                },{
                    name: 'Views',
                    data: [1, 1, 2, 1, 2,1, 1, 1, 1,1, 2, 2]
                }],

            },

        }
    },
    methods: {
        p_month(value) {
            if (value === 0) {
                return moment().format('MMM')
            } else {
                return moment().subtract(value,'months').format('MMM')
            }
        },
        by_like(number) {
            let value = this.like_by_month[this.p_month(number)]
            if (value === undefined) {
                return 0
            } else {
                return value
            }
        },
        by_comment(number) {
            let value = this.comment_by_month[this.p_month(number)]
            if (value === undefined) {
                return 0
            } else {
                return value
            }
        },
        diffHumans(date) {
            return moment(date).fromNow()
        },
    },
    mounted() {
        console.log(this.by_like(10))
    }
}



</script>
