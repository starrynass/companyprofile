 
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

document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('status') || urlParams.has('search') || window.location.hash === '#pesan-pane') {
            triggerPesanTab();
        }

        document.querySelectorAll('.pagination a').forEach(link => {
            let url = new URL(link.href);
            url.hash = 'pesan-pane';
            link.href = url.toString();
        });
    });

    function triggerPesanTab() {
        const pesanTabButton = document.querySelector('#pesan-tab');
        if (pesanTabButton) {
            const tabInstance = new bootstrap.Tab(pesanTabButton);
            tabInstance.show();
        }
    }