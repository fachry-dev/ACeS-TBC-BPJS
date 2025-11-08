document.addEventListener('DOMContentLoaded', (event) => {
    const tabLogin = document.getElementById('tab-login');
    const tabRegister = document.getElementById('tab-register');
    const formLogin = document.getElementById('form-login');
    const formRegister = document.getElementById('form-register');

    if (tabRegister && tabLogin && formLogin && formRegister) {
        
        // Saat Tab Register di-klik
        tabRegister.addEventListener('click', () => {
            formRegister.classList.remove('hidden'); 
            formLogin.classList.add('hidden'); 
            
            tabRegister.classList.add('bg-brand-green', 'text-white');
            tabRegister.classList.remove('text-gray-400');
            
            tabLogin.classList.remove('bg-brand-green', 'text-white');
            tabLogin.classList.add('text-gray-400');
        });

       
        tabLogin.addEventListener('click', () => {
            formLogin.classList.remove('hidden'); 
            formRegister.classList.add('hidden');

            
            tabLogin.classList.add('bg-brand-green', 'text-white');
            tabLogin.classList.remove('text-gray-400');

            tabRegister.classList.remove('bg-brand-green', 'text-white');
            tabRegister.classList.add('text-gray-400');
        });
    }
});