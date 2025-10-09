export function donation() {
    const donationBlocks = document.querySelectorAll('.donation');
    if (!donationBlocks.length) return;

    donationBlocks.forEach((donationBlock) => {
        const openBtn = donationBlock.querySelector('.donation__btn');
        const popup = donationBlock.querySelector('.donation__popup');
        const closeBtn = donationBlock.querySelector('.donation__popup-close');
        const wrap = donationBlock.querySelector('.donation__wrap');
        const controls = donationBlock.querySelectorAll('.donation__popup-control');
        const tabs = donationBlock.querySelectorAll('.donation__popup-tab');

        if (!openBtn || !popup) return;

        // --- Відкрити
        openBtn.addEventListener('click', () => {
            popup.classList.add('active');
            document.body.classList.add('overflow-h');
        });

        // --- Закрити
        const closePopup = () => {
            popup.classList.remove('active');
            document.body.classList.remove('overflow-h');
        };

        if (closeBtn) {
            closeBtn.addEventListener('click', closePopup);
        }

        popup.addEventListener('click', (e) => {
            if (!wrap.contains(e.target)) {
                closePopup();
            }
        });

        // --- Перемикання табів
        controls.forEach((control, index) => {
            control.addEventListener('click', () => {
                controls.forEach(c => c.classList.remove('active'));
                tabs.forEach(t => t.classList.remove('active'));

                control.classList.add('active');
                tabs[index].classList.add('active');
            });
        });
    });
}