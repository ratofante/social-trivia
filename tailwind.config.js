import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["NeueMontreal", ...defaultTheme.fontFamily.sans],
                serif: ["Britannic-Bold", ...defaultTheme.fontFamily.serif],
            },
        },
        colors: {
            gray: {
                DEFAULT: "#323232",
                dark: "#242525",
            },
            green: "#5CC787",
            white: {
                DEFAULT: "#FAFBFF",
            },
        },
    },
    plugins: [forms],
};
