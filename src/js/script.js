
/* =========================
   facilities-slider（marquee）
========================= */
document.addEventListener("DOMContentLoaded", () => {
    initMarqueeSwipers();
    initModal();
});

function initMarqueeSwipers() {
    const roots = document.querySelectorAll(".js-sub-facilities-slider");
    if (!roots.length) return;

    roots.forEach((root) => createMarqueeSwiper(root));
}

function createMarqueeSwiper(root) {
    const waitImages = (el) => {
        const imgs = el.querySelectorAll("img");
        return Promise.all(
            Array.from(imgs).map((img) => {
                if (img.complete) return Promise.resolve();
                return new Promise((res) => img.addEventListener("load", res, { once: true }));
            })
        );
    };

    const sw = new Swiper(root, {
        loop: true,
        loopAdditionalSlides: 20,
        slidesPerView: "auto",
        spaceBetween: 0,
        freeMode: true,
        freeModeMomentum: false,
        allowTouchMove: false,
        simulateTouch: false,
        speed: 10000,
        autoplay: false,
        observer: true,
        observeParents: true,
        pagination: {
            el: root.querySelector(".sub-facilities-slider__pagination"),
            clickable: true,
        },
    });

    const setLinear = () => {
        const w = root.querySelector(".sub-facilities-slider__wrapper");
        if (w) w.style.transitionTimingFunction = "linear";
    };
    setLinear();

    const startSafely = async () => {
        await waitImages(root);
        if (sw.destroyed) return;

        sw.update();
        setLinear();

        requestAnimationFrame(() => {
            if (sw.destroyed) return;
            sw.params.autoplay = {
                delay: 0,
                disableOnInteraction: false,
                pauseOnMouseEnter: false,
            };
            sw.autoplay.start();
        });
    };

    startSafely();

    let resizeTimer = null;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (sw.destroyed) return;
            sw.update();
            setLinear();
        }, 150);
    });
}

//modal
function initModal() {
    const body = document.body;

    const OPEN_SELECTOR = ".js-modal-open";
    const MODAL_SELECTOR = ".js-modal";
    const CLOSE_SELECTOR = ".js-modal-close";
    const ACTIVE_CLASS = "is-active";
    const HIDDEN_CLASS = "is-hidden";

    /** @type {HTMLElement|null} */
    let activeModal = null;
    /** @type {HTMLElement|null} */
    let lastFocused = null;

    /** @type {Map<HTMLElement, any>} */
    const modalSwiperMap = new Map();

    const getModalById = (id) => document.getElementById(id);

    const waitImages = (el) => {
        const imgs = el.querySelectorAll("img");
        return Promise.all(
            Array.from(imgs).map((img) => {
                if (img.complete) return Promise.resolve();
                return new Promise((res) => img.addEventListener("load", res, { once: true }));
            })
        );
    };

    //モーダル内スライダー
    const ensureModalSwiper = async (modal, startIndex = 0) => {
        const swiperRoot = modal.querySelector(".js-modal-swiper");
        if (!swiperRoot) return;

        await waitImages(swiperRoot);

        let sw = modalSwiperMap.get(modal);

        if (!sw) {
            sw = new Swiper(swiperRoot, {
                initialSlide: startIndex,
                loop: true,
                effect: "fade",
                fadeEffect: {
                    crossFade: true,
                },
                speed: 1000,
                navigation: {
                    nextEl: modal.querySelector(".modal-slider__next"),
                    prevEl: modal.querySelector(".modal-slider__prev"),
                },
                observer: true,
                observeParents: true,
            });

            modalSwiperMap.set(modal, sw);
        } else {
            sw.update();
            sw.slideTo(startIndex, 0);
        }
    };

    const openModal = (modal, opener, startIndex = 0) => {
        if (!modal) return;

        if (activeModal && activeModal !== modal) closeModal();

        activeModal = modal;
        lastFocused = opener || document.activeElement;

        modal.classList.add(ACTIVE_CLASS);
        modal.setAttribute("aria-hidden", "false");
        body.classList.add(HIDDEN_CLASS);

        const focusTarget =
            modal.querySelector(CLOSE_SELECTOR) ||
            modal.querySelector('a, button, input, textarea, select, details, [tabindex]:not([tabindex="-1"])') ||
            modal;

        if (!modal.hasAttribute("tabindex")) modal.setAttribute("tabindex", "-1");

        requestAnimationFrame(() => {
            focusTarget && focusTarget.focus?.();

            requestAnimationFrame(() => {
                ensureModalSwiper(modal, startIndex);
            });
        });
    };

    const closeModal = () => {
        if (!activeModal) return;

        activeModal.classList.remove(ACTIVE_CLASS);
        activeModal.setAttribute("aria-hidden", "true");
        body.classList.remove(HIDDEN_CLASS);

        const restore = lastFocused;
        activeModal = null;
        lastFocused = null;

        if (restore && typeof restore.focus === "function") {
            requestAnimationFrame(() => restore.focus());
        }
    };

    document.addEventListener("click", (e) => {
        const opener = e.target.closest(OPEN_SELECTOR);
        if (!opener) return;

        const targetId = opener.dataset.target;
        if (!targetId) return;

        const modal = getModalById(targetId);
        if (!modal) return;

        const startIndex = Number(opener.dataset.index || 0);

        e.preventDefault();
        openModal(modal, opener, startIndex);
    });

    document.addEventListener("click", (e) => {
        const closer = e.target.closest(CLOSE_SELECTOR);
        if (!closer) return;

        const modal = closer.closest(MODAL_SELECTOR);
        if (!modal) return;

        e.preventDefault();
        closeModal();
    });

    // ESC で閉じる
    document.addEventListener("keydown", (e) => {
        if (e.key !== "Escape") return;
        if (!activeModal) return;
        closeModal();
    });

    // リサイズ時：開いているモーダル内Swiperを更新
    let resizeTimer = null;
    window.addEventListener("resize", () => {
        if (!activeModal) return;
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            const sw = modalSwiperMap.get(activeModal);
            if (sw && !sw.destroyed) sw.update();
        }, 150);
    });
}
