
document.addEventListener("DOMContentLoaded", () => {
    initHeaderColorChange();
    initDrawer();
    initBgVideoPlaybackRate();
});

/* =========================
   Header color change
========================= */
function initHeaderColorChange() {
    const header = document.querySelector(".header");
    const targets = Array.from(document.querySelectorAll(".change-color"));
    if (!header || targets.length === 0) return;

    const CLASS_CHANGE = "is-change";
    let ticking = false;

    const isOverlapped = (rectA, rectB) =>
        rectB.top < rectA.bottom && rectB.bottom > rectA.top;

    const update = () => {
        ticking = false;

        const headerRect = header.getBoundingClientRect();
        const overlapped = targets.some((el) =>
            isOverlapped(headerRect, el.getBoundingClientRect())
        );

        header.classList.toggle(CLASS_CHANGE, overlapped);
    };

    const requestUpdate = () => {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(update);
    };

    window.addEventListener("scroll", requestUpdate, { passive: true });
    window.addEventListener("resize", requestUpdate);
    update(); // 初期判定
}

/* =========================
   Drawer
========================= */
function initDrawer() {
    const hamburger = document.querySelector(".js-hamburger");
    const drawer = document.querySelector(".js-drawer");
    if (!hamburger || !drawer) return;

    const body = document.body;

    const CLASS_ACTIVE = "is-active";
    const CLASS_HIDDEN = "is-hidden";
    const containerSelector = ".drawer__container";

    const open = () => {
        hamburger.classList.add(CLASS_ACTIVE);
        drawer.classList.add(CLASS_ACTIVE);
        body.classList.add(CLASS_HIDDEN);
    };

    const close = () => {
        hamburger.classList.remove(CLASS_ACTIVE);
        drawer.classList.remove(CLASS_ACTIVE);
        body.classList.remove(CLASS_HIDDEN);
    };

    const toggle = () => {
        drawer.classList.contains(CLASS_ACTIVE) ? close() : open();
    };

    hamburger.addEventListener("click", toggle);

    // overlay（背景）クリックで閉じる：中身クリックは無視
    drawer.addEventListener("click", (e) => {
        if (e.target.closest(containerSelector)) return;
        close();
    });

    // ドロワー内リンククリックで閉じる
    drawer.querySelectorAll("a").forEach((a) => {
        a.addEventListener("click", close);
    });

    // ESCで閉じる
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") close();
    });
}

/* =========================
   BG video
========================= */
function initBgVideoPlaybackRate() {
    const video = document.querySelector(".js-bg-video");
    if (!video) return;
    video.playbackRate = 0.6;
}

/* =========================
   FAQ
========================= */
jQuery(($) => {
    const $contents = $(".js-faq-content");
    if ($contents.length === 0) return;

    // ===== 初期表示：各カテゴリの最初のFAQを開く =====
    $contents.each(function () {
        const $firstQuestion = $(this).find(".js-faq-question").first();
        const $firstAnswer = $firstQuestion.next();

        if (!$firstQuestion.length) return;

        $firstAnswer.hide().slideDown(0);
        $firstQuestion.addClass("is-open");
    });

    // ===== クリック挙動 =====
    $(".js-faq-question").on("click", function () {
        $(this).next().slideToggle();
        $(this).toggleClass("is-open");
    });
});
