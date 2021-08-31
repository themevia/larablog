<template>
    <div>
        <Head :title="title" />

        <jet-banner />

        <nav class="w-full h-20 bg-gray-50 dark:bg-blue-600 flex items-scretch justify-center">

            <div class="max-w-4xl w-full flex justify-between md:justify-center py-6 px-6 md:px-0 items-center">

                <!-- Nav Brand -->
                <a href="index.html" class="text-xl text-green-500 font-bold py-2">
                    Larablog
                </a>

                <!-- Divider -->
                <div class="w-px h-full bg-gray-300 mx-6 inline-block hidden md:inline-block"></div>

                <!-- Nav Links -->
                <ul class="md:flex items-center hidden">

                    <!-- Active Link -->
                    <li class="mr-6">
                        <a href="index.html" class="text-green-500 font-medium">Anasayfa</a>
                    </li>

                    <li class="mr-6">
                        <a href="about.html" class="text-gray-400 transition hover:text-green-500 font-medium">Hakkımızda</a>
                    </li>

                    <li>
                        <a href="contact.html" class="text-gray-400 transition hover:text-green-500 font-medium">İletişim</a>
                    </li>
                </ul>

                <!-- Sidebar Toggler -->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--eva text-gray-600 text-4xl block md:hidden" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" onclick="toggleSidebar()" data-icon="eva:menu-2-fill"><g fill="currentColor"><circle cx="4" cy="12" r="1"></circle><rect x="7" y="11" width="14" height="2" rx=".94" ry=".94"></rect><rect x="3" y="16" width="18" height="2" rx=".94" ry=".94"></rect><rect x="3" y="6" width="18" height="2" rx=".94" ry=".94"></rect></g></svg>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            <slot></slot>
        </main>

        <footer class="bg-gray-200 py-3">
            <div class="lara-container flex justify-between items-center">
                <div class="text-xl text-green-500 font-bold py-2">
                    Larablog
                </div>
                <div class="text-gray-600 text-sm font-medium">
                    Created with <span class="font-semibold">Larablog</span>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
    import JetBanner from '@/Jetstream/Banner.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default {
        props: {
            title: String,
        },

        components: {
            Head,
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            Link,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
