import './bootstrap';
import 'swiper/css/bundle';


import '../css/app.css';

// Logika untuk Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', () => {
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  const menuIconBars = menuToggle.querySelectorAll('div');

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', () => {
      // Tampilkan/sembunyikan menu
      if (mobileMenu.style.maxHeight) {
        mobileMenu.style.maxHeight = null;
      } else {
        mobileMenu.style.maxHeight = mobileMenu.scrollHeight + "px";
      }

      // Animasi tombol hamburger menjadi 'X'
      menuIconBars[0].classList.toggle('rotate-45');
      menuIconBars[0].classList.toggle('translate-y-2');
      menuIconBars[1].classList.toggle('opacity-0');
      menuIconBars[2].classList.toggle('-rotate-45');
      menuIconBars[2].classList.toggle('-translate-y-2');
    });
  }

  // Menutup menu saat link di-klik (untuk navigasi halaman)
  mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.style.maxHeight = null;
      menuIconBars[0].classList.remove('rotate-45', 'translate-y-2');
      menuIconBars[1].classList.remove('opacity-0');
      menuIconBars[2].classList.remove('-rotate-45', '-translate-y-2');
    });
  });
});