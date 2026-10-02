const dialog = document.getElementById('delete-confirm-dialog');
const confirmForm = document.getElementById('delete-confirm-form');
const nameLabel = document.getElementById('delete-confirm-name');

if (dialog && confirmForm && nameLabel) {
    document.addEventListener('submit', (event) => {
        const sourceForm = event.target.closest('form[data-delete-confirm]');
        if (!sourceForm) return;

        event.preventDefault();
        confirmForm.action = sourceForm.action;
        nameLabel.textContent = sourceForm.dataset.deleteName || 'yang dipilih';
        dialog.showModal();
    });

    document.addEventListener('click', (event) => {
        const trigger = event.target.closest('[data-delete-trigger]');
        if (trigger) {
            confirmForm.action = trigger.dataset.action;
            nameLabel.textContent = trigger.dataset.name || 'yang dipilih';
            dialog.showModal();
            return;
        }

        if (event.target.closest('[data-delete-cancel]')) dialog.close();
    });

    dialog.addEventListener('click', (event) => {
        if (event.target === dialog) dialog.close();
    });
}
