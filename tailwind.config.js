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
            fontFamily: {
                sans: ["Montserrat", ...defaultTheme.fontFamily.sans],
                display: ["Carattere", "cursive"],
            },
            colors: {
                primary: {
                    50: "#f2ebfd",
                    100: "#d7c2f9",
                    200: "#c3a4f6",
                    300: "#a87af2",
                    400: "#9761ef",
                    500: "#7d39eb",
                    600: "#7234d6",
                    700: "#5928a7",
                    800: "#451f81",
                    900: "#351863",
                },
                secondary: {
                    50: "#f9ffeb",
                    100: "#edffc0",
                    200: "#e5ffa1",
                    300: "#d9ff76",
                    400: "#d1ff5c",
                    500: "#c6ff33",
                    600: "#b4e82e",
                    700: "#8db524",
                    800: "#6d8c1c",
                    900: "#536b15",
                },
                neutral: {
                    50: "#fafafa",
                    100: "#f5f5f5",
                    200: "#e5e5e5",
                    300: "#d4d4d4",
                    400: "#a1a1a1",
                    500: "#737373",
                    600: "#525252",
                    700: "#404040",
                    800: "#262626",
                    900: "#171717",
                    950: "#000000",
                },
            },
        },
    },
    plugins: [],
};
