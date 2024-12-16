import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/filament/**/*.blade.php', // Inclui componentes do Filament
    ],
    darkMode: 'class', // Habilita o suporte ao Dark Mode com a classe "dark"
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#1462a3', // Cor primária padrão (Light Mode)
                    dark: '#0a3050', // Cor primária no Dark Mode
                },
                neutral: {
                    light: '#f3f4f6', // Cor de fundo para Light Mode
                    dark: '#1a1a1a', // Cor de fundo para Dark Mode
                },
                text: {
                    light: '#1a202c', // Texto para Light Mode
                    dark: '#e2e8f0', // Texto para Dark Mode
                },
            },
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],
                serif: ['ui-serif', ...defaultTheme.fontFamily.sans],
            },

            typography: {
                DEFAULT: {
                    css: {
                        h2: {
                            fontSize: '1.875rem', // Tamanho para h2
                            fontWeight: '700',
                            color: '#1a202c',
                        },
                        h3: {
                            fontSize: '1.5rem', // Tamanho para h3
                            fontWeight: '600',
                            color: '#2d3748',
                        },
                    },
                },
            },
        },
    },
    plugins: [],
};
