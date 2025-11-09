import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                hellohoney: ['hellohoney', 'sans-serif'],
            },
            colors: {
                'brand-pink': '#d15b88',
                'brand-pink-light': '#f0a7c0',
                'brand-bg': '#fdf6f8',
                'brand-dark': '#2d2d2d',
                'brand-gray': '#71717a',
                'brand-border': '#e5e7eb',
            },
        },
    },

    plugins: [forms],
};
