const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'class',
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'via-900': '#101010',
                'via-800': '#141414',
                'via-700': '#1e1e1e',
                'via-500': '#2E2E2F',
            },
            transitionProperty: {
                'w': 'width',
                'm': 'margin'
            },
            width: {
                'fit': 'fit-content',
            },
            height: {
                'fit': 'fit-content',
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'),],
};
