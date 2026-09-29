const syncReferenceInput = (input) => {
    const datalist = document.getElementById(input.dataset.referenceList);
    const hiddenInput = document.getElementById(input.dataset.referenceTarget);
    if (!datalist || !hiddenInput) return;

    const selected = Array.from(datalist.options).find((option) =>
        option.value.trim().toLocaleLowerCase() === input.value.trim().toLocaleLowerCase()
    );

    hiddenInput.value = selected?.dataset.id ?? '';
};

document.querySelectorAll('[data-reference-input]').forEach(syncReferenceInput);

document.addEventListener('input', (event) => {
    if (event.target.matches('[data-reference-input]')) syncReferenceInput(event.target);
});

document.addEventListener('change', (event) => {
    if (event.target.matches('[data-reference-input]')) syncReferenceInput(event.target);
});
