/** @type {import('tailwindcss').Config} */
export default {
  content: ['./resources/**/*.blade.php','./resources/**/*.js','./resources/**/*.vue'],
  theme: {
    extend: {
      fontFamily: {
        inter: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
      colors: {
        neon: {
          bg: '#0a0f1e',
          panel: '#0f1733',
          cyan: '#00e5ff',
          pink: '#ff00e5',
          lime: '#a8ff00',
          purple: '#8a2be2',
        }
      },
      boxShadow: {
        glow: '0 0 20px rgba(0,229,255,0.6), 0 0 40px rgba(255,0,229,0.3)'
      }
    },
  },
  plugins: [],
}
