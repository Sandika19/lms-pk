/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            screens: {
                md: "850px",
                lg: "1200px",
            },
        },
    },
    plugins: [require("rippleui")],
    rippleui: {
        removeThemes: ["dark"],
        themes: [
            //     {
            //         themeName: "light",
            //         colorScheme: "light",
            //         colors: {
            //             primary: "#235264",
            //             backgroundPrimary: "#FFFFFF",
            //         },
            //     },
            // {
            //     themeName: "dark",
            //     colorScheme: "dark",
            //     colors: {
            //         primary: "#573242",
            //         backgroundPrimary: "#1a1a1a",
            //     },
            // },
        ],
    },
};
