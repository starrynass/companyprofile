// AUTO SCROLL BERDASARKAN HASH URL
document.addEventListener("DOMContentLoaded", function() {
        if (window.location.hash) {
            const targetId = window.location.hash.substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                setTimeout(() => {
                    targetElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 300);
            }
        }
    });

    // MENAMPILKAN MODAL SUKSES & SCROLL SECTION
function tampilkanModalSukses(modalId, targetSectionId) {
    const elementModal = document.getElementById(modalId);
    if (elementModal) {
        const modalInstance = new bootstrap.Modal(elementModal);
        modalInstance.show();
    }

    if (targetSectionId) {
        const targetSection = document.getElementById(targetSectionId);
        if (targetSection) {
            targetSection.scrollIntoView({ behavior: 'smooth' });
        }
    }
}

// MENJAGA POSISI TETAP DI TAB PESAN (FILTER & PAGINATION)
document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('status') || urlParams.has('search') || window.location.hash === '#pesan-pane') {
        if (typeof triggerPesanTab === 'function') {
            triggerPesanTab();
        }
    }

    document.querySelectorAll('.pagination a').forEach(link => {
        let url = new URL(link.href);
        url.hash = 'pesan-pane';
        link.href = url.toString();
    });
});

// AKTIFKAN TAB PESAN BOOTSTRAP
    function triggerPesanTab() {
        const pesanTabButton = document.querySelector('#pesan-tab');
        if (pesanTabButton) {
            const tabInstance = new bootstrap.Tab(pesanTabButton);
            tabInstance.show();
        }
    }