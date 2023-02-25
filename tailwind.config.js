/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],
  theme: {
    extend: {
      translate: {
        '0.001': '-10rem',
      },
      spacing: {
        '128': '40rem',
      }
    },
  },
  plugins: [],
}
