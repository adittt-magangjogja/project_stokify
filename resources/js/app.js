import 'flowbite';
import './bootstrap';
import './sidebar';
import './charts';
import './reference-inputs';
import './dashboard-clock';
import './currency-inputs';
import './delete-confirmation';
import './product-code-validation';

document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('notification-toggle');
    const menu = document.getElementById('notification-menu');
    const wrapper = document.querySelector('[data-notification-menu]');

    if (!toggle || !menu || !wrapper) return;

    const closeMenu = () => {
        menu.classList.add('hidden');
        toggle.setAttribute('aria-expanded', 'false');
    };

    toggle.addEventListener('click', () => {
        const isOpen = toggle.getAttribute('aria-expanded') === 'true';
        menu.classList.toggle('hidden', isOpen);
        toggle.setAttribute('aria-expanded', String(!isOpen));
    });

    document.addEventListener('click', (event) => {
        if (!wrapper.contains(event.target)) closeMenu();
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeMenu();
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('notification-toggle');
    const menu = document.getElementById('notification-menu');
    const wrapper = document.querySelector('[data-notification-menu]');

    if (!toggle || !menu || !wrapper) return;

    const closeMenu = () => {
        menu.classList.add('hidden');
        toggle.setAttribute('aria-expanded', 'false');
    };

    toggle.addEventListener('click', () => {
        const isOpen = toggle.getAttribute('aria-expanded') === 'true';
        menu.classList.toggle('hidden', isOpen);
        toggle.setAttribute('aria-expanded', String(!isOpen));
    });

    document.addEventListener('click', (event) => {
        if (!wrapper.contains(event.target)) closeMenu();
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeMenu();
    });
});
