/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],
  theme: {
    extend: {
      screens: {
         // Adds a custom breakpoint for 390px
      },
    },
  },
  plugins: [],
}