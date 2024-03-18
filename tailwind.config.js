/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**.{php,html,js}","./template-parts/*.{php,html,js}","./blocks/*/**.{php,html,js}"],
  theme: {
    extend: {
      fontFamily: {
        'Lato': ['Lato'],
        'EBGaramond': ['EBGaramond'],
      },

      colors: {
        "east-bay": "#405789",
        "bombay": "#8995AA",
        "alice-blue": "#ECF6FF",
        "ebony": "#13152E",
        "anakiwa": "#8AE8FF"
      },

      height: {
      },

      maxWidth:{
      }
    },
  },
  plugins: []
};
