<template>
    <Head title="Log in" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <h1 class="text-2xl text-via-800/75 font-semibold text-center my-4">Log in to your account</h1>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="mt-6">
                <Link v-if="canResetPassword" :href="route('password.request')" class="block text-right hover:underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </Link>

                <jet-button class="block w-full text-sm text-center my-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </jet-button>

                <Link :href="route('register')" class="block hover:underline text-center text-sm text-gray-600 hover:text-gray-900">
                    Are you not registered?
                </Link>
            </div>
        </form>

        <template #bg>
            <div class="absolute top-0 left-0 bg-green-500 w-32 h-64"></div>
            <div class="absolute bottom-0 right-0 bg-green-500 w-32 h-64"></div>

            <div class="absolute top-0 right-0 bg-yellow-400 w-48 h-48"></div>
            <div class="absolute bottom-0 left-0 bg-yellow-400 w-48 h-48"></div>
        </template>
    </jet-authentication-card>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
        },

        props: {
            canResetPassword: Boolean,
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
