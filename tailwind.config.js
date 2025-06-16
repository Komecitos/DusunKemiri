// tailwind.config.js
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './storage/framework/views/*.php',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Poppins', 'Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
      colors: {
        cream: '#FFF7F0',
        darkText: '#2D2D2D',
        orangeAccent: '#FA7D09',   // kamu bisa sesuaikan dengan warna aksen yang kamu mau
        softOrange: '#FFE8D6',
      },
    },
  },

  plugins: [],
};
