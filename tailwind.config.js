/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './views/**/*.twig',
    './assets/**/*.js',
    './assets/**/*.css'
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
  ],
};
