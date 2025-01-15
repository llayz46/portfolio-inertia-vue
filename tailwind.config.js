import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Space Grotesk', ...defaultTheme.fontFamily.sans],
                'dm-sans': ['DM Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'accent-green': {
                    DEFAULT: '#0F2534',
                    'darker': '#091821'
                },
                'accent-purple': '#8E3BB4',
                'accent-yellow': '#F6C31B',
                'primary': {
                    '50': '#EDF9FF',
                    '100': '#D7EFFF',
                    '200': '#B9E4FF',
                    '300': '#88D6FF',
                    '400': '#50BDFF',
                    '500': '#289DFF',
                    '600': '#0478FF',
                    '700': '#0A67EB',
                    '800': '#0F52BE',
                    '900': '#134895',
                    '950': '#112D5A',
                },
                zinc: {
                    1000: '#22292F',
                    1050: '#15191d',
                },
                background: '#07090A'
            }
        },
        letterSpacing: {
            'small': '-.045em'
        }
    },

    plugins: [forms, typography],
};
