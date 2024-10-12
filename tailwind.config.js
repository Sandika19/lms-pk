/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("rippleui")],
    rippleui: {
        themes: [
            {
                themeName: "light",
                colorScheme: "light",
                colors: {
                    primary: "#235264",
                    backgroundPrimary: "#FFFFFF",
                },
            },
            {
                themeName: "dark",
                colorScheme: "dark",
                colors: {
                    primary: "#573242",
                    backgroundPrimary: "#1a1a1a",
                },
            },
        ],
    },
};
