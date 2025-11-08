/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      // Anda bisa menambahkan warna custom di sini agar sesuai gambar
      colors: {
        'brand-green': '#65A30D', // Contoh warna hijau dari gambar
        'brand-light-green': '#ECFDF5', // Contoh warna background
        'brand-green': '#34d399', 
        'brand-dark': '#111827', 
        'brand-gray': '#1F2937',
      }
    },
  },
  plugins: [],
}