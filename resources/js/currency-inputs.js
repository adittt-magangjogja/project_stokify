const formatRupiahDigits = (value) => {
    const digits = String(value ?? '').replace(/\D/g, '');
    return digits.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
};

document.querySelectorAll('[data-currency-input]').forEach((input) => {
    const form = input.closest('form');
    const targetName = input.dataset.currencyTarget;
    const hidden = form?.elements.namedItem(targetName);

    if (!hidden) return;

    const syncValue = () => {
        const digits = input.value.replace(/\D/g, '');
        input.value = formatRupiahDigits(digits);
        hidden.value = digits;
    };

    input.addEventListener('input', syncValue);
    input.addEventListener('blur', syncValue);
    syncValue();
});
