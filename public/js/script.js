 
function tampilkanModalSukses(modalId, targetSectionId) {
    // 1. Inisialisasi dan tampilkan Modal Bootstrap berdasarkan ID yang dikirim
    const elementModal = document.getElementById(modalId);
    if (elementModal) {
        const modalInstance = new bootstrap.Modal(elementModal);
        modalInstance.show();
    }

    // 2. Mengarahkan scroll layar kembali ke section target secara halus
    if (targetSectionId) {
        const targetSection = document.getElementById(targetSectionId);
        if (targetSection) {
            targetSection.scrollIntoView({ behavior: 'smooth' });
        }
    }
}