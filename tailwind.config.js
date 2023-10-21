/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'grey-rgba': 'rgba(0, 0, 0, 0.54)'
      }
    },
  },
  plugins: [],

  //Comentario pra push
}

