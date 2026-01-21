document.addEventListener('DOMContentLoaded', () => {

    const toggles = document.querySelectorAll('.dropdown-toggle');

    function closeAll() {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.classList.add('hidden');
        });

        toggles.forEach(btn => {
            btn.setAttribute('aria-expanded', 'false');
        });
    }

    toggles.forEach(toggle => {
        toggle.addEventListener('click', e => {
            e.stopPropagation();

            const menu = toggle.parentElement.querySelector('.dropdown-menu');
            const isOpen = !menu.classList.contains('hidden');

            closeAll();

            if (!isOpen) {
                menu.classList.remove('hidden');
                toggle.setAttribute('aria-expanded', 'true');
            }
        });
    });

    document.addEventListener('click', closeAll);

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeAll();
    });

    const mobileToggle = document.getElementById('mobile-toggle');
    const mobileMenu   = document.getElementById('mobile-menu');

    mobileToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

});
