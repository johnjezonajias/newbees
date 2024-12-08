/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './views/**/*.twig',
    './assets/**/*.js',
    './assets/**/*.css'
  ],
  theme: {
    screens: {
      sm: '800px',
      md: '992px',
      lg: '1024px',
      xl: '1280px',
    },
    fontFamily: {
      sans: ['Graphik', 'sans-serif'],
      serif: ['Merriweather', 'serif'],
    },
    extend: {
      fontSize: {
        'h1': ['1.875rem', { lineHeight: '1.25', fontWeight: '600' }],
        'h2': ['1.75rem', { lineHeight: '1.25', fontWeight: '600' }],
        'h3': ['1.625rem', { lineHeight: '1.35', fontWeight: '600' }],
        'h4': ['1.5rem', { lineHeight: '1.5', fontWeight: '600' }],
        'h5': ['1.375rem', { lineHeight: '1.5', fontWeight: '600' }],
        'h6': ['1.25rem', { lineHeight: '1.5', fontWeight: '600' }],
      },
    }
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
  ],
};
