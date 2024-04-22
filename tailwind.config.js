/** @type {import('tailwindcss').Config} */
module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
    ],
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/views/**/*.js",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}

