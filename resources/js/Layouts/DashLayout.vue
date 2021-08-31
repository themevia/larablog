<template>
    <div class="bg-gray-100 dark:bg-via-800">
        <Head :title="title" />

        <aside class="flex flex-col bg-white dark:bg-via-900 fixed top-0 left-0 h-full border-r border-gray-200/50 dark:border-via-500/25 transition-w duration-300" :class="{ 'w-20':!wideMenu,'w-60':wideMenu }">
            <div class="py-4  flex items-center justify-center">
                <svg class="text-green-500 fill-current h-10" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 269.3 404.4">
                    <path d="M95.1,3c0,94.2,0,188.4,0,282.5c-29.5,33.4-59,66.7-88.6,100.1c0.1-94.3,0.1-188.7,0.2-283C36.2,69.4,65.7,36.2,95.1,3z"/>
                    <path d="M17.4,400.1C46.9,366.6,76.5,333,106,299.5c53.1,0.1,106.1,0.1,159.2,0.2c-29.4,33.4-58.7,66.9-88.1,100.3	C123.9,400,70.6,400.1,17.4,400.1z"/>
                </svg>
            </div>
            <div class="nav-menu">
                <div class="nav-item active">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 512 512">
                        <path xmlns="http://www.w3.org/2000/svg" d="M484.295,445.96v-0.215H111.034c-30.647,0-55.495-24.762-55.624-55.409v-352c0-15.291-12.413-27.705-27.705-27.705    S0,23.044,0,38.336v352c0,61.315,49.718,111.034,111.034,111.034h373.262c15.291,0,27.705-12.413,27.705-27.705    S499.587,445.96,484.295,445.96z"/>
                        <path xmlns="http://www.w3.org/2000/svg" d="M450.792,127.678c-12.285-9.192-29.681-6.701-38.872,5.584l-64.43,92.349l-91.06-68.51    c-12.22-9.192-29.595-6.744-38.787,5.477c-0.022,0.043-0.043,0.064-0.086,0.107L138.309,276.51    c-9.256,12.177-6.872,29.573,5.305,38.83c4.66,3.544,10.33,5.519,16.172,5.627c0,0,0,0.644,0,0.644    c8.483-0.236,16.408-4.36,21.477-11.168l64.43-92.349l91.06,68.51c12.22,9.192,29.595,6.744,38.787-5.477    c0.021-0.043,0.043-0.064,0.086-0.107l80.752-114.47C465.568,154.266,463.077,136.87,450.792,127.678z"/>
                    </svg>
                    <span v-show="wideMenu">Overview</span>

                </div>

            </div>
            <div class="mt-auto py-2 px-3 flex gap-2 justify-end">
                <div @click="clickWideMenu" class="cursor-pointer p-2">
                    <svg class="text-via-500 dark:text-white fill-current transition duration-300 transform" :class="{ 'rotate-180': wideMenu, 'rotate-0': !wideMenu }" width="25" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 123.964 123.964">
                        <path xmlns="http://www.w3.org/2000/svg" d="M121.7,57.681L83,26.881c-4-3.1-10-0.3-10,4.8v10.3c0,3.3-2.2,6.2-5.5,6.2H6c-3.3,0-6,2.4-6,5.8v16.2c0,3.2,2.7,6,6,6h61.5   c3.3,0,5.5,2.601,5.5,5.9v10.3c0,5,6,7.8,9.9,4.7l38.6-30C124.7,64.781,124.8,60.081,121.7,57.681z"/>
                    </svg>
                </div>
                <label v-show="wideMenu" for="darkMode" class="relative flex items-center cursor-pointer transform scale-75">
                    <input type="checkbox" v-model="darkMode" id="darkMode" class="toggle-darkMode sr-only">
                    <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                    <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                </label>
            </div>
        </aside>

        <div class="py-3 px-8 transition-m duration-300 min-h-screen flex flex-col" :class="{ 'ml-20':!wideMenu,'ml-60':wideMenu }">
            <header class="grid gap-4 grid-cols-7 pt-4">
                <div class="col-span-5 flex justify-between">
                    <div>
                        <slot name="header"></slot>
                    </div>
                    <form class="flex items-center gap-3">
                        <input class="border border-gray-200/50 dark:border-via-500/25 rounded-xl px-3 text-gray-600 dark:text-white/75 bg-gray-50 dark:bg-via-900/50 focus:ring focus:ring-green-400" type="text" placeholder="Posts in search"/>
                        <button class="p-3 rounded-xl flex items-center justify-center border border-gray-200/50 dark:border-via-500/25 bg-gray-50 dark:bg-via-900/50">
                            <svg class="text-via-800 dark:text-white fill-current" width="20" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 512.005 512.005">
                                <path xmlns="http://www.w3.org/2000/svg" d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667    S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6    c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z     M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z"/>
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="col-span-2 flex justify-between rounded-xl bg-white dark:bg-via-900 py-3 px-4 border border-gray-200/50 dark:border-via-500/25">
                    <div>
                        d
                    </div>
                    <div class="flex gap-3">
                        <div class="text-right">
                            <span class="text-via-800 font-medium dark:text-white">{{ $page.props.user.name+' '+$page.props.user.surname }}</span>
                            <p class="text-sm text-gray-500 dark:text-white/75">{{ $page.props.user.roles }}</p>
                        </div>
                        <div class="bg-cover rounded-full w-10 h-10" style="background-image: url('https://cdn.now.howstuffworks.com/media-content/0b7f4e9b-f59c-4024-9f06-b3dc12850ab7-1024-576.jpg')"></div>
                    </div>
                </div>
            </header>

            <main class="py-10 space-y-8">
                <slot></slot>
            </main>

            <footer class="mt-auto text-sm border-t border-gray-200/25 dark:border-via-500 flex justify-between items-center py-3 px-4">
                <div class="text-gray-500 dark:text-white/75"> Copyright @
                    <span class="font-medium">Larablog</span>.
                </div>
                <div class="text-gray-500 dark:text-white/75">
                    Coded with love by <a href="https://themevia.com" class="text/white font-semibold">themevia</a>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
import JetBanner from '@/Jetstream/Banner.vue'
import JetDropdown from '@/Jetstream/Dropdown.vue'
import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
import JetNavLink from '@/Jetstream/NavLink.vue'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

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
            darkMode: false,
            wideMenu: false,
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

        clickWideMenu() {
            this.wideMenu = this.wideMenu === false;
        },
        setCookie(name, value, exdays) {
            let d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toGMTString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        },
        getCookie(name) {
            let cname = name + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) === 0) {
                    return c.substring(cname.length, c.length);
                }
            }
            return false;
        }
    },
    mounted() {
        this.darkMode = this.getCookie('darkMode')
    },
    watch: {
        darkMode() {
            if (this.darkMode === false) {
                document.documentElement.classList.remove('dark')
                this.setCookie('darkMode',this.darkMode,-1)
            } else {
                this.setCookie('darkMode',this.darkMode,30)
                document.documentElement.classList.add('dark')
            }
        }
    }
}
</script>
