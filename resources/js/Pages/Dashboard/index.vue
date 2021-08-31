<template>
    <dash-layout title="Overview">
        <template #header>
            <h1 class="text-via-900 font-semibold text-3xl dark:text-white">Overview</h1>
            <span class="text-gray-500 dark:text-white/75">Welcome to {{ $page.props.user.name }}</span>
        </template>

        <div class="grid grid-cols-3 gap-4">
            <div class="relative bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50 rounded-lg py-3 px-4">
                <span class="text-via-500 dark:text-white/75">Post views</span>
                <div class="text-3xl text-via-800 dark:text-white font-semibold">122,345</div>
                <small class="text-sm text-gray-400">Last 7 days</small>
                <div class="absolute p-6 right-0 top-0">
                    <svg class="text-via-700/75 dark:text-white/75" width="45" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="3 17 9 11 13 15 21 7"></polyline>
                        <polyline points="14 7 21 7 21 14"></polyline>
                    </svg>
                </div>
            </div>
            <div class="relative bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50 rounded-lg py-3 px-4">
                <span class="text-via-500 dark:text-white/75">New members</span>
                <div class="text-3xl text-via-800 dark:text-white font-semibold">{{ lastWeekMembers }}</div>
                <small class="text-sm text-gray-400">Last 7 days</small>
                <div class="absolute p-6 right-0 top-0">
                    <svg class="text-via-700/75 dark:text-white/75" width="45" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="3 17 9 11 13 15 21 7"></polyline>
                        <polyline points="14 7 21 7 21 14"></polyline>
                    </svg>
                </div>
            </div>
            <div class="relative bg-gray-50 dark:bg-transparent border border-gray-200/50 dark:border-via-500/50 rounded-lg py-3 px-4">
                <span class="text-via-500 dark:text-white/75">Posts</span>
                <div class="text-3xl text-via-800 dark:text-white font-semibold">12</div>
                <small class="text-sm text-gray-400">Last 7 days</small>
                <div class="absolute p-6 right-0 top-0">
                    <svg class="text-via-700/75 dark:text-white/75" width="45" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="3 17 9 11 13 15 21 7"></polyline>
                        <polyline points="14 7 21 7 21 14"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4 border border-gray-200/50 dark:border-via-500/50 rounded-lg p-3 bg-gray-50 dark:bg-transparent">
            <div class="col-span-2 px-2">
                <span class="text-via-700 dark:text-white font-medium text-xl">Statistics</span>
                <div class="flex gap-3 p-4 text-center">
                    <div>
                        <span class="text-gray-500 dark:text-white/75">Total visitors</span>
                        <div class="font-semibold text-lg text-via-500/75 dark:text-white/75">{{ totalVisitors }}</div>
                    </div>
                    <div>
                        <span class="text-gray-500 dark:text-white/75">Total members</span>
                        <div class="font-semibold text-lg text-via-500/75 dark:text-white/75">{{ totalMembers }}</div>
                    </div>
                </div>
                <div>
                    <apexcharts  width="100%" height="180" :options="chart.options" :series="chart.series"></apexcharts>
                </div>
            </div>
            <div class="space-y-4 p-4">
                <div class="rounded-lg border border-gray-200/50 dark:border-via-500/50 flex flex-col p-4 items-center justify-center">
                    <span class="text-via-700/75 dark:text-white/75 font-medium">Views</span>
                    <div class="text-green-500 bg-green-200 text-center px-6 py-2 rounded-md mt-1 flex gap-2">
                        <span>23%</span>
                        <svg width="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="3 17 9 11 13 15 21 7"></polyline>
                            <polyline points="14 7 21 7 21 14"></polyline>
                        </svg>
                    </div>
                </div>
                <div class="rounded-lg border border-gray-200/50 dark:border-via-500/50 flex flex-col p-4 items-center justify-center">
                    <span class="text-via-700/75 dark:text-white/75 font-medium">Members</span>
                    <div class="text-green-500 bg-green-200 text-center px-6 py-2 rounded-md mt-1 flex gap-2">
                        <span>17%</span>
                        <svg width="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="3 17 9 11 13 15 21 7"></polyline>
                            <polyline points="14 7 21 7 21 14"></polyline>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </dash-layout>
</template>

<script>
import DashLayout from '@/Layouts/DashLayout.vue'
import Welcome from '@/Jetstream/Welcome.vue'
import apexcharts from "vue3-apexcharts"

export default {
    components: {
        DashLayout,
        Welcome,
        apexcharts
    },
    props: {
        totalVisitors: Number,
        totalMembers: Number,
        lastWeekMembers: Number,
    },
    data() {
        return {
            chart: {
                options: {
                    chart: {
                        type: 'area',
                        sparkline: {
                            enabled: true
                        },
                        animations: {
                            enabled: false,
                        },
                    },

                    // stroke: {
                    //     curve: 'smooth',
                    //     width: 0
                    // },
                    // fill: {
                    //     opacity: 0.7,
                    //     gradient: {
                    //         enabled: false
                    //     }
                    // },
                    yaxis: {
                        min: 0
                    },
                    // colors: 'blue',
                },
                series: [{
                    name: 'series-1',
                    data: [30, 40, 45, 50, 49, 60, 70, 91]
                }]
            }
        }
    },
}



</script>
