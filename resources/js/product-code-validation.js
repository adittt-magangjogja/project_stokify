const codePattern = /^JS[0-9]{3,10}$/i;
const codeMessage = 'Format kode harus JS diikuti 3–10 angka, contohnya JS001 atau JS1000.';

document.querySelectorAll('[data-product-code]').forEach((input) => {
    const error = input.parentElement.querySelector('[data-product-code-error]');

    const validateCode = () => {
        input.value = input.value.toUpperCase();
        const isEmpty = input.value.length === 0;
        const isValid = codePattern.test(input.value);
        const message = isEmpty || isValid ? '' : codeMessage;

        input.setCustomValidity(message);
        error?.classList.toggle('hidden', !message);
        return isValid;
    };

    input.addEventListener('input', validateCode);
    input.addEventListener('blur', validateCode);
});
