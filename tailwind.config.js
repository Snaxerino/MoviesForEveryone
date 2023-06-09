/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./frontend/**/*.{html,js}",
    "./backend/**/*.{php, html}",
      "./index.php",
  ],
  theme: {
    fontFamily: {
      Satoshi: ["Satoshi", "sans-serif"],
    },
    extend: {
      colors: {
        'azul-com-opacidade': 'rgba(59, 130, 246, 0.1)',
        'preto-com-opacidade': 'rgba(71, 85, 105, 0.4)',
    },
    width: {
        '112': '28rem', // 448
    },
    },
  },
  darkMode: 'class',
  plugins: [],
}