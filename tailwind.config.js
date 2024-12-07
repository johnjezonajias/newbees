/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './views/**/*.twig',
    './assets/**/*.js',
    './assets/**/*.css'
  ],
  theme: {
    screens: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1280px',
    },
    fontFamily: {
      sans: ['Graphik', 'sans-serif'],
      serif: ['Merriweather', 'serif'],
    },
    extend: {
      fontSize: {
        'h1': ['2rem', { lineHeight: '2.5rem', fontWeight: '700' }],
        'h2': ['1.875rem', { lineHeight: '2.25rem', fontWeight: '600' }],
        'h3': ['1.75rem', { lineHeight: '2rem', fontWeight: '600' }],
        'h4': ['1.625rem', { lineHeight: '1.75rem', fontWeight: '500' }],
        'h5': ['1.5rem', { lineHeight: '1.5rem', fontWeight: '500' }],
        'h6': ['1.375rem', { lineHeight: '1.25rem', fontWeight: '500' }],
      },
    }
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
  ],
};
