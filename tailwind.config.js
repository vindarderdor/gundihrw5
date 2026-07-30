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
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                heading: ['Playfair Display', 'serif'],
                latin: ['Dancing Script', 'cursive'],
            },
            colors: {
                'kelurahan-primary': '#5B8DB8',
                'kelurahan-secondary': '#8FBC94',
                'kelurahan-accent': '#E8D9B5',
            }
        },
    },

    plugins: [forms],
};
