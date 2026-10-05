const dialog = document.getElementById('delete-confirm-dialog');
const confirmForm = document.getElementById('delete-confirm-form');
const titleLabel = document.getElementById('delete-confirm-title');
const descriptionLabel = document.getElementById('delete-confirm-description');
const submitLabel = document.getElementById('delete-confirm-submit');

const deleteCopy = {
    produk: { noun: 'produk', detail: 'dari katalog' },
    kategori: { noun: 'kategori', detail: 'dari daftar kategori' },
    pengguna: { noun: 'pengguna', detail: 'dari daftar pengguna' },
    supplier: { noun: 'supplier', detail: 'dari daftar supplier' },
    atribut: { noun: 'atribut produk', detail: 'dari daftar atribut produk' },
};

function showDeleteDialog({ action, name, type }) {
    const copy = deleteCopy[type] || { noun: 'data', detail: 'dari sistem' };
    confirmForm.action = action;
    titleLabel.textContent = `Anda akan menghapus ${copy.noun}`;
    descriptionLabel.innerHTML = '';
    descriptionLabel.append(`${copy.noun.charAt(0).toUpperCase()}${copy.noun.slice(1)} `);
    const nameElement = document.createElement('strong');
    nameElement.className = 'break-words font-semibold text-slate-700';
    nameElement.textContent = name || 'yang dipilih';
    descriptionLabel.append(nameElement, ` akan dihapus ${copy.detail}. Tindakan ini tidak dapat dibatalkan. Anda yakin?`);
    submitLabel.textContent = `Hapus ${copy.noun}`;
    dialog.showModal();
}

if (dialog && confirmForm && titleLabel && descriptionLabel && submitLabel) {
    document.addEventListener('submit', (event) => {
        const sourceForm = event.target.closest('form[data-delete-confirm]');
        if (!sourceForm) return;

        event.preventDefault();
        showDeleteDialog({
            action: sourceForm.action,
            name: sourceForm.dataset.deleteName,
            type: sourceForm.dataset.deleteType,
        });
    });

    document.addEventListener('click', (event) => {
        const trigger = event.target.closest('[data-delete-trigger]');
        if (trigger) {
            showDeleteDialog({
                action: trigger.dataset.action,
                name: trigger.dataset.name,
                type: trigger.dataset.deleteType,
            });
            return;
        }

        if (event.target.closest('[data-delete-cancel]')) dialog.close();
    });

    dialog.addEventListener('click', (event) => {
        if (event.target === dialog) dialog.close();
    });
}
