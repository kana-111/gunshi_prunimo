//facilities-slider
document.addEventListener("DOMContentLoaded", () => {
    initMarqueeSwipers();
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

    // リサイズ時に幅が変わっても速度ブレしにくくする
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
document.addEventListener("DOMContentLoaded", () => {
    initModal();
});

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

    const getModalById = (id) => document.getElementById(id);

    const openModal = (modal, opener) => {
        if (!modal) return;

        // すでに開いてたら閉じてから
        if (activeModal && activeModal !== modal) closeModal();

        activeModal = modal;
        lastFocused = opener || document.activeElement;

        modal.classList.add(ACTIVE_CLASS);
        modal.removeAttribute("aria-hidden");
        body.classList.add(HIDDEN_CLASS);

        // フォーカスをモーダルへ（閉じるボタン優先）
        const focusTarget =
            modal.querySelector(CLOSE_SELECTOR) ||
            modal.querySelector(
                'a, button, input, textarea, select, details, [tabindex]:not([tabindex="-1"])'
            ) ||
            modal;

        // tabindex がないと focus できない場合があるので保険
        if (!modal.hasAttribute("tabindex")) modal.setAttribute("tabindex", "-1");

        requestAnimationFrame(() => {
            focusTarget && focusTarget.focus?.();
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

        // 元のトリガーへフォーカスを戻す
        if (restore && typeof restore.focus === "function") {
            requestAnimationFrame(() => restore.focus());
        }
    };

    // クリックで open（イベント委譲）
    document.addEventListener("click", (e) => {
        const opener = e.target.closest(OPEN_SELECTOR);
        if (!opener) return;

        const targetId = opener.dataset.target;
        if (!targetId) return;

        const modal = getModalById(targetId);
        if (!modal) return;

        e.preventDefault();
        openModal(modal, opener);
    });

    // クリックで close（×ボタン / overlay など）
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

    // 万一、DOMから消された/非表示になったときの保険（任意）
    window.addEventListener("resize", () => {
        if (!activeModal) return;
        // 状況に応じて閉じたい場合はここで closeModal(); してもOK
    });
}
