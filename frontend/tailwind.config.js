import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                ultramarine: {
                    50: "#f0f3ff",
                    100: "#e4e9ff",
                    200: "#ccd7ff",
                    300: "#a4b5ff",
                    400: "#7083ff",
                    500: "#000599",
                    600: "#0f13ff",
                    700: "#0008ff",
                    800: "#000ada",
                    900: "#3746ff",
                    950: "#000c7a",
                },
            },
        },
    },
    plugins: [],
};
