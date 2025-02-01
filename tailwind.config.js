import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import animate from "tailwindcss-animate";
import { setupInspiraUI } from "@inspira-ui/plugins";

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.{js,jsx,vue}",
    ],
    safelist: [
        'bg-feature-1',
        'bg-feature-2',
        'bg-feature-3',
        'bg-feature-4',
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
                    'darker': '#091821',
                    'lighter': '#298C65'
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
                    1050: '#15191D',
                },
                background: '#07090A'
            },
            keyframes: {
                "accordion-down": {
                    from: {height: 0},
                    to: {height: "var(--radix-accordion-content-height)"},
                },
                "accordion-up": {
                    from: {height: "var(--radix-accordion-content-height)"},
                    to: {height: 0},
                },
                "blob-scale": {
                    "0%": {
                        transform: "scale(1)",
                        translate: "0"
                    },
                    "40%": {
                        transform: "scale(1.12)",
                        translate: "15px, 15px"
                    },
                    "60%": {
                        transform: "scale(1.12)",
                        translate: "-15px, -15px"
                    },
                    "100%": {
                        transform: "scale(1)",
                        translate: "0"
                    },
                }
            },
            animation: {
                "accordion-down": "accordion-down 0.2s ease-out",
                "accordion-up": "accordion-up 0.2s ease-out",
                "blob-scale": "blob-scale 3s linear infinite",
            },
            backgroundImage: {
                'feature-1': "url('/images/feature/feature-1.webp')",
                'feature-2': "url('/images/feature/feature-2.webp')",
                'feature-3': "url('/images/feature/feature-3.webp')",
                'feature-4': "url('/images/feature/feature-4.webp')",
            }
        },
        letterSpacing: {
            'small': '-.045em'
        },
    },
    plugins: [
        forms,
        typography,
        animate,
        setupInspiraUI
    ],
}
