/** @type {import('tailwindcss').Config} */
export default {
  content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/tw-elements/dist/js/**/*.js",
        "./node_modules/flowbite/**/*.js"
],
  theme: {
    extend: {},
  },
  plugins: [
    require('tw-elements/dist/plugin.cjs'),
    require('flowbite/plugin')
  ],
}

