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
            colors: {
                brand: {
                    50: '#f3f6f9',
                    100: '#e4eaf1',
                    200: '#c9d5e3',
                    300: '#9fb4cb',
                    400: '#6f8eaf',
                    500: '#314968',
                    600: '#2a3e59',
                    700: '#23344a',
                    800: '#1d2b3d',
                    900: '#182433',
                    950: '#0f1722',
                },
                ink: {
                    50: '#f7f7f6',
                    100: '#ececeb',
                    200: '#d6d6d4',
                    300: '#b0b0ad',
                    400: '#878783',
                    500: '#6b6b67',
                    600: '#555551',
                    700: '#454542',
                    800: '#3a3a37',
                    900: '#1a1a1a',
                    950: '#0B0B0B',
                },
            },
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                display: ['Sora', ...defaultTheme.fontFamily.sans],
            },
            animation: {
                'fade-in': 'fadeIn 0.6s ease-out forwards',
                'fade-in-up': 'fadeInUp 0.65s ease-out forwards',
                'float': 'float 6s ease-in-out infinite',
                'pulse-soft': 'pulseSoft 2.4s ease-in-out infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                pulseSoft: {
                    '0%, 100%': { boxShadow: '0 0 0 0 rgba(49, 73, 104, 0.45)' },
                    '50%': { boxShadow: '0 0 0 12px rgba(49, 73, 104, 0)' },
                },
            },
            boxShadow: {
                soft: '0 2px 16px -4px rgba(11, 11, 11, 0.12), 0 8px 24px -8px rgba(11, 11, 11, 0.08)',
                glow: '0 0 40px -8px rgba(49, 73, 104, 0.4)',
                'glow-sm': '0 0 24px -4px rgba(49, 73, 104, 0.35)',
            },
            borderRadius: {
                '2.5xl': '1.25rem',
            },
        },
    },

    plugins: [forms],
};
