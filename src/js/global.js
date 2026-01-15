
document.addEventListener("DOMContentLoaded", () => {
    initHeaderColorChange();
    initDrawer();
    initBgVideoPlaybackRate();
    initAnchorManager();
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
/* =========================
   Anchor manager
========================= */
function initAnchorManager() {
    const header = document.querySelector(".header");

    // ドロワー（あれば閉じる）
    const hamburger = document.querySelector(".js-hamburger");
    const drawer = document.querySelector(".js-drawer");
    const CLASS_ACTIVE = "is-active";
    const CLASS_HIDDEN = "is-hidden";

    const closeDrawerIfOpen = () => {
        if (!hamburger || !drawer) return;
        hamburger.classList.remove(CLASS_ACTIVE);
        drawer.classList.remove(CLASS_ACTIVE);
        document.body.classList.remove(CLASS_HIDDEN);
    };

    // const getHeaderOffset = () => {
    //     if (!header) return 0;
    //     // fixed/sticky想定：現在の表示高さを差し引く
    //     return Math.ceil(header.getBoundingClientRect().height || 0);
    // };

    const getHeaderOffset = () => 0;


    const findTarget = (hash) => {
        if (!hash || hash === "#") return null;
        const id = decodeURIComponent(hash.replace(/^#/, ""));
        return document.getElementById(id);
    };

    const scrollToTarget = (target, behavior = "smooth") => {
        if (!target) return false;

        // ScrollTriggerがあるページのズレ対策
        if (window.ScrollTrigger) ScrollTrigger.refresh();

        const y = window.scrollY + target.getBoundingClientRect().top - getHeaderOffset();
        window.scrollTo({ top: y, behavior });
        return true;
    };

    const handleHash = (hash, { behavior = "smooth", closeDrawer = true } = {}) => {
        const target = findTarget(hash);
        if (!target) return false;

        if (closeDrawer) closeDrawerIfOpen();
        return scrollToTarget(target, behavior);
    };

    // ----------------------------
    // クリック：アンカーを捕捉
    // ----------------------------
    document.addEventListener("click", (e) => {
        const a = e.target.closest("a[href]");
        if (!a) return;

        const href = a.getAttribute("href");
        if (!href) return;

        // href="#access" 形式
        if (href.startsWith("#")) {
            const ok = handleHash(href, { behavior: "smooth", closeDrawer: true });
            if (ok) {
                e.preventDefault();
                history.pushState(null, "", href);
            }
            return;
        }

        // href="/about/#access" 形式（同一ページなら遷移せずスクロール）
        try {
            const url = new URL(href, window.location.href);
            const sameOrigin = url.origin === window.location.origin;
            const samePath = url.pathname === window.location.pathname;

            if (sameOrigin && samePath && url.hash) {
                const ok = handleHash(url.hash, { behavior: "smooth", closeDrawer: true });
                if (ok) {
                    e.preventDefault();
                    history.pushState(null, "", url.hash);
                }
            }
        } catch (_) {
            // URLとして解釈できない href は無視
        }
    });

    // ----------------------------
    // 直アクセス / リロードで # が付いてる時
    // （レイアウト確定後にもう一度補正）
    // ----------------------------
    window.addEventListener("load", () => {
        if (!location.hash) return;

        // 1回目：即
        handleHash(location.hash, { behavior: "auto", closeDrawer: false });

        // 2回目：画像等で高さが変わった後の補正
        requestAnimationFrame(() => {
            setTimeout(() => {
                handleHash(location.hash, { behavior: "auto", closeDrawer: false });
            }, 0);
        });
    });

    // 戻る/進む
    window.addEventListener("popstate", () => {
        if (!location.hash) return;
        handleHash(location.hash, { behavior: "auto", closeDrawer: false });
    });
}
