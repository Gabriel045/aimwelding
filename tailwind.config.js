/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**.{php,html,js}","./template-parts/*.{php,html,js}","./blocks/*/**.{php,html,js}"],
  theme: {
    extend: {
      fontFamily: {
        'Lato': ['Lato', 'sans-serif'],
        'EBGaramond': ['EBGaramond','sans-serif'],
      },

      colors: {
        "east-bay": "#405789",
        "bombay": "#8995AA",
        "alice-blue": "#ECF6FF",
        "ebony": "#13152E"
      },

      height: {
      },

      maxWidth:{
      }
    },
  },
  plugins: []
};
