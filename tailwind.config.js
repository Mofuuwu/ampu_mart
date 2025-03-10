import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                'sour-gummy': ['Sour Gummy', 'sans-serif'], 
            }, 
            colors: {
                lightblue: '#0295CE',
                customorange: '#FF6F00',
                lightyellow: '#FFCC00',
                midblue: '#006D97',
                hoverblue: '#147EA7',
                darkblue: '#004976',
                custompurple: '#505398',
                customgray: '#F1F1F1',
            }
            
        },
    },
    plugins: [],
};
