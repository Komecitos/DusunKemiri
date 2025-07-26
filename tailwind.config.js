// tailwind.config.js
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        orangeAccent: '#F97316', 
        softWhite: '#FFFDF9',
        darkText: '#1F2937',
        lightGray: '#F3F4F6',
        muted: '#9CA3AF',
        greenSuccess: '#D1FAE5',
        redDanger: '#FECACA',
        sogan: '#8B5E3C',
        kunyit: '#F6C177',
        langit: '#5B9AA0',
        bata: '#C1440E',
        lumut: '#7B9E89',
        pucat: '#FAF9F6',
        darkText: '#3E3E3E',
      },
      fontFamily: {
        body: ['Roboto', 'sans-serif'],
        heading: ['Noto Serif', 'serif'],
      },
      animation: {
        spin: 'spin 1s linear infinite',
      },
    },
  },
  plugins: [],
}
