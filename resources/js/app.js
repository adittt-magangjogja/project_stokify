import 'flowbite';
import './bootstrap';
import './sidebar';
import './charts';
import './reference-inputs';
import './dashboard-clock';
import './currency-inputs';
import './delete-confirmation';
import './product-code-validation';

// Number inputs accept `e`, `+`, and `-` in some browsers. Keep integer
// inventory fields numeric while preserving paste and mobile keyboard support.
document.addEventListener('input', (event) => {
    const input = event.target;
    if (!(input instanceof HTMLInputElement) || input.type !== 'number') return;

    const cleaned = input.value.replace(/[^0-9]/g, '');
    if (input.value !== cleaned) input.value = cleaned;
});

document.addEventListener('keydown', (event) => {
    const input = event.target;
    if (!(input instanceof HTMLInputElement) || input.type !== 'number') return;
    if (['e', 'E', '+', '-', '.'].includes(event.key)) event.preventDefault();
});

document.addEventListener('click', (event) => {
    const button = event.target.closest('[data-back-button]');
    if (!button) return;

    const fallbackUrl = button.dataset.fallbackUrl;
    const previousUrl = document.referrer;
    if (previousUrl && new URL(previousUrl).origin === window.location.origin && window.history.length > 1) {
        window.history.back();
    } else if (fallbackUrl) {
        window.location.assign(fallbackUrl);
    }
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
