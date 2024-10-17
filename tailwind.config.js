/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: { 
        'Poppins': ['Poppins', 'sans-serif'],
        'Space-grotesk': ['Space Grotesk', 'sans-serif'],
       }
    },
  },
  plugins: [],
}

