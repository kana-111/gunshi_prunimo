//MV
document.addEventListener('DOMContentLoaded', () => {
    const swipers = document.querySelectorAll('.js-mv-swiper');
    if (!swipers.length) return;

    swipers.forEach((el) => {
        new Swiper(el, {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
            speed: 2000,
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
        });
    });
});



//コンセプト
// document.addEventListener("DOMContentLoaded", () => {
//     gsap.registerPlugin(ScrollTrigger);

//     const section = document.querySelector(".js-concept");
//     const nextSection = document.querySelector(".js-facilities");
//     if (!section || !nextSection) return;

//     const containers = gsap.utils.toArray(
//         section.querySelectorAll(".js-concept-container")
//     );
//     if (!containers.length) return;

//     const fadeTop = section.querySelector(".concept__fade--top");
//     const fadeBottom = section.querySelector(".concept__fade--bottom");

//     const mm = gsap.matchMedia();

//     mm.add("(min-width: 768px)", () => {
//         const STEP = 1000;
//         const TOTAL = STEP * containers.length;

//         // ===== 初期化 =====
//         gsap.set(section, { position: "relative", minHeight: "100vh" });

//         containers.forEach((c, i) => {
//             gsap.set(c, {
//                 position: "absolute",
//                 inset: 0,
//                 zIndex: containers.length - i, // 1枚目が上
//                 autoAlpha: i === 0 ? 1 : 0,
//                 y: 0,
//             });

//             const bar = c.querySelector(".js-progress-bar");
//             if (bar) gsap.set(bar, { scaleY: 0, transformOrigin: "top center" });

//             const content = c.querySelector(".js-concept-content");
//             if (content) {
//                 gsap.set(content, {
//                     autoAlpha: i === 0 ? 1 : 0,
//                     y: i === 0 ? 0 : 10,
//                 });
//             }
//         });

//         if (fadeTop) gsap.set(fadeTop, { opacity: 1 });
//         if (fadeBottom) gsap.set(fadeBottom, { opacity: 0 });

//         // ===== 上フェード（入口）=====
//         let topST = null;
//         if (fadeTop) {
//             topST = ScrollTrigger.create({
//                 trigger: section,
//                 start: "top 70%",
//                 end: "top 50%",
//                 scrub: true,
//                 invalidateOnRefresh: true,
//                 onUpdate(self) {
//                     gsap.set(fadeTop, { opacity: 1 - self.progress });
//                 },
//                 onLeave() {
//                     gsap.set(fadeTop, { opacity: 0 });
//                 },
//                 onEnterBack() {
//                     gsap.set(fadeTop, { opacity: 1 });
//                 },
//             });
//         }

//         // ===== スライド切替（背景：クロスフェード＋スライド / 中身：フェード＋ディレイ）=====
//         let currentIndex = 0;
//         let isAnimating = false;

//         const showIndex = (nextIndex) => {
//             if (isAnimating) return;
//             if (nextIndex === currentIndex) return;
//             if (nextIndex < 0 || nextIndex >= containers.length) return;

//             isAnimating = true;

//             const prev = containers[currentIndex];
//             const next = containers[nextIndex];

//             const prevContent = prev.querySelector(".js-concept-content");
//             const nextContent = next.querySelector(".js-concept-content");

//             const BG_DUR = 1.2;
//             const BG_SLIDE = 24;

//             const CONTENT_DELAY = 0.45;
//             const CONTENT_OUT_DUR = 0.55;
//             const CONTENT_IN_DUR = 0.95;

//             // 次を最前面に
//             gsap.set(next, { zIndex: containers.length + 5 });

//             // 次背景：下から準備
//             gsap.set(next, { autoAlpha: 1, y: BG_SLIDE });

//             // 次中身：透明で待機
//             if (nextContent) gsap.set(nextContent, { autoAlpha: 0, y: 10 });
//             if (prevContent) gsap.set(prevContent, { autoAlpha: 1, y: 0 });

//             gsap
//                 .timeline({
//                     defaults: { ease: "power1.out" },
//                     onComplete: () => {
//                         gsap.set(prev, { autoAlpha: 0, y: 0 });
//                         if (prevContent) gsap.set(prevContent, { autoAlpha: 0, y: 0 });

//                         gsap.set(next, { autoAlpha: 1, y: 0 });
//                         if (nextContent) gsap.set(nextContent, { autoAlpha: 1, y: 0 });

//                         // zIndex を元に戻す
//                         containers.forEach((c, i) =>
//                             gsap.set(c, { zIndex: containers.length - i })
//                         );

//                         currentIndex = nextIndex;
//                         isAnimating = false;
//                     },
//                 })
//                 // 背景：クロスフェード＋上下スライド
//                 .to(
//                     prev,
//                     {
//                         autoAlpha: 0,
//                         y: -BG_SLIDE,
//                         duration: BG_DUR,
//                         ease: "power1.inOut",
//                     },
//                     0
//                 )
//                 .fromTo(
//                     next,
//                     { autoAlpha: 0, y: BG_SLIDE },
//                     {
//                         autoAlpha: 1,
//                         y: 0,
//                         duration: BG_DUR,
//                         ease: "power1.inOut",
//                     },
//                     0
//                 )
//                 // 中身：先に消える
//                 .to(
//                     prevContent,
//                     {
//                         autoAlpha: 0,
//                         y: -6,
//                         duration: CONTENT_OUT_DUR,
//                         ease: "power1.inOut",
//                     },
//                     0.1
//                 )
//                 // 中身：遅れて出る
//                 .to(
//                     nextContent,
//                     {
//                         autoAlpha: 1,
//                         y: 0,
//                         duration: CONTENT_IN_DUR,
//                         ease: "power1.out",
//                     },
//                     CONTENT_DELAY
//                 );
//         };

//         // ===== pin（終了位置は facilities）=====
//         const pinST = ScrollTrigger.create({
//             trigger: section,
//             start: "top top",
//             endTrigger: nextSection,
//             end: "top top",
//             pin: true,
//             scrub: false,
//             anticipatePin: 1,
//             invalidateOnRefresh: true,
//             onUpdate(self) {
//                 // pin全体の進捗（0..1）を「TOTAL(px)」にマッピング
//                 const scrolled = Math.min(TOTAL - 0.001, self.progress * TOTAL);
//                 const idx = Math.min(
//                     containers.length - 1,
//                     Math.floor(scrolled / STEP)
//                 );
//                 const segProg = (scrolled - idx * STEP) / STEP; // 0..1

//                 // ✅ progress bar
//                 containers.forEach((c, i) => {
//                     const bar = c.querySelector(".js-progress-bar");
//                     if (!bar) return;

//                     if (i < idx) gsap.set(bar, { scaleY: 1 });
//                     else if (i > idx) gsap.set(bar, { scaleY: 0 });
//                     else gsap.set(bar, { scaleY: segProg });
//                 });

//                 // ✅ 1000pxごと切替
//                 if (idx !== currentIndex) showIndex(idx);

//                 // pin中は下オーバーレイを絶対に出さない
//                 if (fadeBottom) gsap.set(fadeBottom, { opacity: 0 });
//             },
//         });

//         // ===== 下フェード（出口）：concept bottom が 30%→0% の間だけ =====
//         let bottomST = null;
//         if (fadeBottom) {
//             bottomST = ScrollTrigger.create({
//                 trigger: section,
//                 start: "bottom 40%",
//                 end: "bottom 20%",
//                 scrub: true,
//                 invalidateOnRefresh: true,
//                 onUpdate(self) {
//                     gsap.set(fadeBottom, { opacity: self.progress });
//                 },
//                 onLeaveBack() {
//                     gsap.set(fadeBottom, { opacity: 0 });
//                 },
//             });
//         }

//         return () => {
//             pinST.kill();
//             if (topST) topST.kill();
//             if (bottomST) bottomST.kill();
//         };
//     });
// });


// document.addEventListener("DOMContentLoaded", () => {
//     gsap.registerPlugin(ScrollTrigger);

//     const section = document.querySelector(".js-concept");
//     const nextSection = document.querySelector(".js-facilities");
//     if (!section || !nextSection) return;

//     // ✅ data-index で順番を固定（DOM順が崩れてもOK）
//     const containers = gsap.utils
//         .toArray(section.querySelectorAll(".js-concept-container"))
//         .sort((a, b) => {
//             const ai = parseInt(a.dataset.index, 10);
//             const bi = parseInt(b.dataset.index, 10);
//             return ai - bi;
//         });

//     if (!containers.length) return;

//     const fadeTop = section.querySelector(".concept__fade--top");
//     const fadeBottom = section.querySelector(".concept__fade--bottom");

//     const mm = gsap.matchMedia();

//     mm.add("(min-width: 768px)", () => {
//         const STEP = 2000; // ✅ 1000px ごとに切り替え
//         const TOTAL = STEP * containers.length;

//         // ===== スクロール入力を無効化（アニメ中だけ）=====
//         let blockScrollInput = false;

//         const wheelHandler = (e) => {
//             if (!blockScrollInput) return;
//             e.preventDefault();
//         };

//         const touchMoveHandler = (e) => {
//             if (!blockScrollInput) return;
//             e.preventDefault();
//         };

//         const keydownHandler = (e) => {
//             if (!blockScrollInput) return;
//             const keys = [
//                 "ArrowUp",
//                 "ArrowDown",
//                 "PageUp",
//                 "PageDown",
//                 "Home",
//                 "End",
//                 " ",
//                 "Spacebar",
//             ];
//             if (keys.includes(e.key)) e.preventDefault();
//         };

//         const enableBlockScroll = () => {
//             if (blockScrollInput) return;
//             blockScrollInput = true;
//             window.addEventListener("wheel", wheelHandler, { passive: false });
//             window.addEventListener("touchmove", touchMoveHandler, { passive: false });
//             window.addEventListener("keydown", keydownHandler, { passive: false });
//         };

//         const disableBlockScroll = () => {
//             if (!blockScrollInput) return;
//             blockScrollInput = false;
//             window.removeEventListener("wheel", wheelHandler, { passive: false });
//             window.removeEventListener("touchmove", touchMoveHandler, { passive: false });
//             window.removeEventListener("keydown", keydownHandler, { passive: false });
//         };

//         // ===== 固定スタック（z-index順）=====
//         const applyStack = () => {
//             containers.forEach((c, i) => {
//                 gsap.set(c, { zIndex: containers.length - i }); // 0番が最前面
//             });
//         };

//         // ===== 初期化 =====
//         gsap.set(section, { position: "relative", minHeight: "100vh" });

//         containers.forEach((c, i) => {
//             gsap.set(c, {
//                 position: "absolute",
//                 inset: 0,
//                 autoAlpha: i === 0 ? 1 : 0,
//                 y: 0,
//             });

//             const bar = c.querySelector(".js-progress-bar");
//             if (bar) gsap.set(bar, { scaleY: 0, transformOrigin: "top center" });

//             const content = c.querySelector(".js-concept-content");
//             if (content) {
//                 gsap.set(content, {
//                     autoAlpha: i === 0 ? 1 : 0,
//                     y: i === 0 ? 0 : 10,
//                 });
//             }
//         });

//         applyStack();

//         if (fadeTop) gsap.set(fadeTop, { opacity: 1 });
//         if (fadeBottom) gsap.set(fadeBottom, { opacity: 0 });

//         // ===== 上フェード（入口）=====
//         let topST = null;
//         if (fadeTop) {
//             topST = ScrollTrigger.create({
//                 trigger: section,
//                 start: "top 70%",
//                 end: "top 50%",
//                 scrub: true,
//                 invalidateOnRefresh: true,
//                 onUpdate(self) {
//                     gsap.set(fadeTop, { opacity: 1 - self.progress });
//                 },
//                 onLeave() {
//                     gsap.set(fadeTop, { opacity: 0 });
//                 },
//                 onEnterBack() {
//                     gsap.set(fadeTop, { opacity: 1 });
//                 },
//             });
//         }

//         // ===== スライド切替（A：最終的に正しい1枚へ着地）=====
//         let currentIndex = 0;
//         let isAnimating = false;
//         let pendingIndex = null;

//         const requestShow = (nextIndex) => {
//             if (nextIndex === currentIndex) return;
//             if (nextIndex < 0 || nextIndex >= containers.length) return;

//             if (isAnimating) {
//                 pendingIndex = nextIndex; // ✅ 最後の要求だけ保持
//                 return;
//             }
//             showIndex(nextIndex);
//         };

//         const showIndex = (nextIndex) => {
//             if (isAnimating) return;
//             if (nextIndex === currentIndex) return;
//             if (nextIndex < 0 || nextIndex >= containers.length) return;

//             isAnimating = true;

//             // ✅ 遷移中はホイール等を無効化
//             enableBlockScroll();

//             const prev = containers[currentIndex];
//             const next = containers[nextIndex];

//             const prevContent = prev.querySelector(".js-concept-content");
//             const nextContent = next.querySelector(".js-concept-content");

//             const BG_DUR = 1.2;
//             const BG_SLIDE = 24;
//             const CONTENT_DELAY = 0.45;
//             const CONTENT_OUT_DUR = 0.55;
//             const CONTENT_IN_DUR = 0.95;

//             // 次を最前面（アニメ中だけ）
//             gsap.set(next, { zIndex: containers.length + 5 });

//             // 次背景：下から準備
//             gsap.set(next, { autoAlpha: 1, y: BG_SLIDE });

//             // 次中身：透明で待機
//             if (nextContent) gsap.set(nextContent, { autoAlpha: 0, y: 10 });
//             if (prevContent) gsap.set(prevContent, { autoAlpha: 1, y: 0 });

//             gsap
//                 .timeline({
//                     defaults: { ease: "power1.out" },
//                     onComplete: () => {
//                         // 確定状態
//                         gsap.set(prev, { autoAlpha: 0, y: 0 });
//                         if (prevContent) gsap.set(prevContent, { autoAlpha: 0, y: 0 });

//                         gsap.set(next, { autoAlpha: 1, y: 0 });
//                         if (nextContent) gsap.set(nextContent, { autoAlpha: 1, y: 0 });

//                         // zIndex を固定ルールに戻す
//                         applyStack();

//                         currentIndex = nextIndex;
//                         isAnimating = false;

//                         // ✅ 途中で溜まった要求があれば、その「最後」だけ続行（ブロック継続）
//                         if (pendingIndex !== null && pendingIndex !== currentIndex) {
//                             const pi = pendingIndex;
//                             pendingIndex = null;
//                             showIndex(pi);
//                             return;
//                         }

//                         pendingIndex = null;
//                         // ✅ 最終的に止まったタイミングで解除
//                         disableBlockScroll();
//                     },
//                 })
//                 // 背景：クロスフェード＋上下スライド
//                 .to(
//                     prev,
//                     { autoAlpha: 0, y: -BG_SLIDE, duration: BG_DUR, ease: "power1.inOut" },
//                     0
//                 )
//                 .fromTo(
//                     next,
//                     { autoAlpha: 0, y: BG_SLIDE },
//                     { autoAlpha: 1, y: 0, duration: BG_DUR, ease: "power1.inOut" },
//                     0
//                 )
//                 // 中身：先に消える
//                 .to(
//                     prevContent,
//                     { autoAlpha: 0, y: -6, duration: CONTENT_OUT_DUR, ease: "power1.inOut" },
//                     0.1
//                 )
//                 // 中身：遅れて出る
//                 .to(
//                     nextContent,
//                     { autoAlpha: 1, y: 0, duration: CONTENT_IN_DUR, ease: "power1.out" },
//                     CONTENT_DELAY
//                 );
//         };

//         // ===== pin（STEPが効くように距離を固定）=====
//         const pinST = ScrollTrigger.create({
//             trigger: section,
//             start: "top top",
//             end: () => "+=" + TOTAL, // ✅ 1000px × 枚数ぶん
//             pin: true,
//             scrub: false,
//             anticipatePin: 1,
//             invalidateOnRefresh: true,

//             onUpdate(self) {
//                 const scrolled = Math.min(TOTAL - 0.001, self.progress * TOTAL);
//                 const idx = Math.min(containers.length - 1, Math.floor(scrolled / STEP));
//                 const segProg = (scrolled - idx * STEP) / STEP; // 0..1

//                 // progress bar
//                 containers.forEach((c, i) => {
//                     const bar = c.querySelector(".js-progress-bar");
//                     if (!bar) return;

//                     if (i < idx) gsap.set(bar, { scaleY: 1 });
//                     else if (i > idx) gsap.set(bar, { scaleY: 0 });
//                     else gsap.set(bar, { scaleY: segProg });
//                 });

//                 // ✅ 切替（A方式：requestShow）
//                 if (idx !== currentIndex) requestShow(idx);

//                 // pin中は下オーバーレイを出さない
//                 if (fadeBottom) gsap.set(fadeBottom, { opacity: 0 });
//             },

//             // ✅ ここで確実に最後へ着地（「最後じゃない」で終わる対策）
//             onLeave() {
//                 requestShow(containers.length - 1);
//                 containers.forEach((c) => {
//                     const bar = c.querySelector(".js-progress-bar");
//                     if (bar) gsap.set(bar, { scaleY: 1 });
//                 });
//                 if (fadeBottom) gsap.set(fadeBottom, { opacity: 0 });
//                 disableBlockScroll();
//             },

//             onLeaveBack() {
//                 disableBlockScroll();
//             },
//         });

//         // ===== 下フェード（出口）=====
//         let bottomST = null;
//         if (fadeBottom) {
//             bottomST = ScrollTrigger.create({
//                 trigger: section,
//                 start: "bottom 40%",
//                 end: "bottom 20%",
//                 scrub: true,
//                 invalidateOnRefresh: true,
//                 onUpdate(self) {
//                     gsap.set(fadeBottom, { opacity: self.progress });
//                 },
//                 onLeaveBack() {
//                     gsap.set(fadeBottom, { opacity: 0 });
//                 },
//             });
//         }

//         return () => {
//             disableBlockScroll();
//             pinST.kill();
//             if (topST) topST.kill();
//             if (bottomST) bottomST.kill();
//         };
//     });
// });

document.addEventListener("DOMContentLoaded", () => {
    gsap.registerPlugin(ScrollTrigger);

    const section = document.querySelector(".js-concept");
    const nextSection = document.querySelector(".js-facilities");
    if (!section || !nextSection) return;

    // ✅ data-index で順番固定
    const containers = gsap.utils
        .toArray(section.querySelectorAll(".js-concept-container"))
        .sort((a, b) => parseInt(a.dataset.index, 10) - parseInt(b.dataset.index, 10));

    if (!containers.length) return;

    const fadeTop = section.querySelector(".concept__fade--top");
    const fadeBottom = section.querySelector(".concept__fade--bottom");

    const mm = gsap.matchMedia();

    // =========================================================
    // ✅ PC（あなたのコード：一切変更なし）
    // =========================================================
    mm.add("(min-width: 768px)", () => {
        const STEP = 2000;
        const TOTAL = STEP * containers.length;

        // =========================
        // 遷移直後ガード（ちらつき対策）
        // =========================
        let justFinishedTransition = false;

        // =========================
        // クールダウン（解除直後の入力を少し無効化）
        // =========================
        let coolDown = false;
        const COOLDOWN_MS = 120;

        // =========================
        // スクロール入力ブロック（observeで物理的に止める）
        // =========================
        let blockScrollInput = false;

        // wheel/touch/scroll をまとめてブロック
        const observer = ScrollTrigger.observe({
            target: window,
            type: "wheel,touch,scroll",
            preventDefault: true,
            allowClicks: true,
            onEnable(self) {
                // 慣性中でも止めやすくする：現在位置を固定
                self._lockedY = window.scrollY;
            },
            onChangeY(self) {
                // もし動こうとしても戻す（慣性対策）
                if (typeof self._lockedY === "number") window.scrollTo(0, self._lockedY);
            },
        });
        observer.disable();

        const keydownHandler = (e) => {
            if (!blockScrollInput && !coolDown) return;

            const keys = ["ArrowUp", "ArrowDown", "PageUp", "PageDown", "Home", "End", " ", "Spacebar"];
            if (keys.includes(e.key)) e.preventDefault();
        };

        const enableBlockScroll = () => {
            if (blockScrollInput) return;
            blockScrollInput = true;
            observer.enable();
            window.addEventListener("keydown", keydownHandler, { passive: false });
        };

        const disableBlockScroll = () => {
            if (!blockScrollInput) return;
            blockScrollInput = false;
            observer.disable();
            window.removeEventListener("keydown", keydownHandler, { passive: false });

            // ✅ 解除直後だけ少し入力を無効化（早スクロのガクつき対策）
            coolDown = true;
            setTimeout(() => {
                coolDown = false;
            }, COOLDOWN_MS);
        };

        // =========================
        // 固定スタック（z-index順）
        // =========================
        const applyStack = () => {
            containers.forEach((c, i) => {
                gsap.set(c, { zIndex: containers.length - i });
            });
        };

        // =========================
        // キャッシュ（progress bar）
        // =========================
        const bars = containers.map((c) => c.querySelector(".js-progress-bar"));
        const setBarY = bars.map((bar) => (bar ? gsap.quickSetter(bar, "scaleY") : null));

        // =========================
        // 初期化
        // =========================
        gsap.set(section, { position: "relative", minHeight: "100vh" });
        gsap.set(containers, { force3D: true });

        containers.forEach((c, i) => {
            gsap.set(c, {
                position: "absolute",
                inset: 0,
                autoAlpha: i === 0 ? 1 : 0,
                y: 0,
            });

            if (bars[i]) gsap.set(bars[i], { scaleY: 0, transformOrigin: "top center" });

            const content = c.querySelector(".js-concept-content");
            if (content) {
                gsap.set(content, { autoAlpha: i === 0 ? 1 : 0, y: i === 0 ? 0 : 10 });
            }
        });

        applyStack();

        if (fadeTop) gsap.set(fadeTop, { opacity: 1 });
        if (fadeBottom) gsap.set(fadeBottom, { opacity: 0 });

        // =========================
        // 上フェード（入口）
        // =========================
        let topST = null;
        if (fadeTop) {
            topST = ScrollTrigger.create({
                trigger: section,
                start: "top 70%",
                end: "top 50%",
                scrub: true,
                invalidateOnRefresh: true,
                onUpdate(self) {
                    gsap.set(fadeTop, { opacity: 1 - self.progress });
                },
                onLeave() {
                    gsap.set(fadeTop, { opacity: 0 });
                },
                onEnterBack() {
                    gsap.set(fadeTop, { opacity: 1 });
                },
            });
        }

        // =========================
        // スライド切替（A：最終的に正しい1枚へ着地）
        // =========================
        let currentIndex = 0;
        let isAnimating = false;
        let pendingIndex = null;

        const requestShow = (nextIndex) => {
            if (nextIndex === currentIndex) return;
            if (nextIndex < 0 || nextIndex >= containers.length) return;
            if (justFinishedTransition) return;

            if (isAnimating) {
                pendingIndex = nextIndex; // 最後の要求だけ保持
                return;
            }
            showIndex(nextIndex);
        };

        const showIndex = (nextIndex) => {
            if (isAnimating) return;
            if (nextIndex === currentIndex) return;
            if (nextIndex < 0 || nextIndex >= containers.length) return;

            isAnimating = true;
            enableBlockScroll();

            const prev = containers[currentIndex];
            const next = containers[nextIndex];

            const prevContent = prev.querySelector(".js-concept-content");
            const nextContent = next.querySelector(".js-concept-content");

            const BG_DUR = 1.2;
            const BG_SLIDE = 24;
            const CONTENT_DELAY = 0.45;
            const CONTENT_OUT_DUR = 0.55;
            const CONTENT_IN_DUR = 0.95;

            // 次を最前面（アニメ中だけ）
            gsap.set(next, { zIndex: containers.length + 5 });

            // 次背景：下から準備
            gsap.set(next, { autoAlpha: 1, y: BG_SLIDE });

            // 次中身：透明で待機
            if (nextContent) gsap.set(nextContent, { autoAlpha: 0, y: 10 });
            if (prevContent) gsap.set(prevContent, { autoAlpha: 1, y: 0 });

            gsap
                .timeline({
                    defaults: { ease: "power1.out" },
                    onComplete: () => {
                        gsap.set(prev, { autoAlpha: 0, y: 0 });
                        if (prevContent) gsap.set(prevContent, { autoAlpha: 0, y: 0 });

                        gsap.set(next, { autoAlpha: 1, y: 0 });
                        if (nextContent) gsap.set(nextContent, { autoAlpha: 1, y: 0 });

                        // ✅ 遷移直後ガードON（pinのonUpdate割り込み対策）
                        justFinishedTransition = true;

                        // zIndex戻しは次フレーム
                        requestAnimationFrame(() => {
                            applyStack();
                            requestAnimationFrame(() => {
                                justFinishedTransition = false;
                            });
                        });

                        currentIndex = nextIndex;
                        isAnimating = false;

                        // pendingがあれば続行（入力ブロック継続）
                        if (pendingIndex !== null && pendingIndex !== currentIndex) {
                            const pi = pendingIndex;
                            pendingIndex = null;
                            showIndex(pi);
                            return;
                        }

                        pendingIndex = null;
                        disableBlockScroll();
                    },
                })
                .to(prev, { autoAlpha: 0, y: -BG_SLIDE, duration: BG_DUR, ease: "power1.inOut" }, 0)
                .fromTo(
                    next,
                    { autoAlpha: 0, y: BG_SLIDE },
                    { autoAlpha: 1, y: 0, duration: BG_DUR, ease: "power1.inOut" },
                    0
                )
                .to(prevContent, { autoAlpha: 0, y: -6, duration: CONTENT_OUT_DUR, ease: "power1.inOut" }, 0.1)
                .to(nextContent, { autoAlpha: 1, y: 0, duration: CONTENT_IN_DUR, ease: "power1.out" }, CONTENT_DELAY);
        };

        // =========================
        // pin（STEPが効くように距離固定）
        // =========================
        const pinST = ScrollTrigger.create({
            trigger: section,
            start: "top top",
            end: () => "+=" + TOTAL,
            pin: true,
            scrub: false,
            anticipatePin: 1,
            invalidateOnRefresh: true,

            onUpdate(self) {
                if (justFinishedTransition) return;

                const scrolled = Math.min(TOTAL - 0.001, self.progress * TOTAL);
                const idx = Math.min(containers.length - 1, Math.floor(scrolled / STEP));
                const segProg = (scrolled - idx * STEP) / STEP;

                // progress bar
                for (let i = 0; i < setBarY.length; i++) {
                    const setY = setBarY[i];
                    if (!setY) continue;

                    if (i < idx) setY(1);
                    else if (i > idx) setY(0);
                    else setY(segProg);
                }

                if (idx !== currentIndex) requestShow(idx);

                if (fadeBottom) gsap.set(fadeBottom, { opacity: 0 });
            },

            onLeave() {
                requestShow(containers.length - 1);
                for (let i = 0; i < setBarY.length; i++) {
                    const setY = setBarY[i];
                    if (setY) setY(1);
                }
                if (fadeBottom) gsap.set(fadeBottom, { opacity: 0 });
                disableBlockScroll();
            },

            onLeaveBack() {
                disableBlockScroll();
            },
        });

        // =========================
        // 下フェード（出口）
        // =========================
        let bottomST = null;
        if (fadeBottom) {
            bottomST = ScrollTrigger.create({
                trigger: section,
                start: "bottom 50%",
                end: "bottom 30%",
                scrub: true,
                invalidateOnRefresh: true,
                onUpdate(self) {
                    gsap.set(fadeBottom, { opacity: self.progress });
                },
                onLeaveBack() {
                    gsap.set(fadeBottom, { opacity: 0 });
                },
            });
        }

        return () => {
            disableBlockScroll();
            observer.kill();
            pinST.kill();
            if (topST) topST.kill();
            if (bottomST) bottomST.kill();
        };
    });

    // =========================================================
    // ✅ SP（修正版：.is-sticky 付与 + 既存SPロジック維持）
    //    ※PCには一切影響しない
    // =========================================================
    // mm.add("(max-width: 767px)", () => {
    //     const section = document.querySelector(".js-concept");
    //     if (!section) return;

    //     const sticky = section.querySelector(".concept__sticky");
    //     if (!sticky) return;

    //     // ✅ PC由来の inline を掃除（必要最低限）
    //     const slides = sticky.querySelectorAll(".js-concept-container");
    //     if (slides.length) {
    //         gsap.set(slides, { clearProps: "opacity,visibility,transform" });
    //         gsap.set(slides, { autoAlpha: 1, y: 0 });
    //         slides.forEach((s) => {
    //             const content = s.querySelector(".js-concept-content");
    //             if (content) gsap.set(content, { clearProps: "opacity,visibility,transform", autoAlpha: 1, y: 0 });
    //         });
    //     }

    //     // =========================================================
    //     // ✅ stickyの上部位置を監視（.conceptセクションを基準）
    //     // =========================================================
    //     // 固定ヘッダーがあるならここを高さ(px)に（なければ0）
    //     const TOP_OFFSET = 0;
    //     const EPS = 1; // 1pxの遊び

    //     let isOn = false;
    //     let rafId = 0;

    //     const tick = () => {
    //         // .conceptセクションの位置を監視
    //         const sectionRect = section.getBoundingClientRect();
    //         const sectionTop = sectionRect.top;

    //         // セクション外ではOFF（下へ抜けたらOFF）
    //         const inSection = sectionRect.bottom > TOP_OFFSET + EPS;

    //         // .conceptセクションの上部が画面TOPに来たらON
    //         const shouldOn = inSection && sectionTop <= TOP_OFFSET + EPS;
    //         const shouldOff = !inSection || sectionTop > TOP_OFFSET + EPS;

    //         if (!isOn && shouldOn) {
    //             isOn = true;
    //             sticky.classList.add("is-sticky");
    //             // console.log("🟢 is-sticky ON", sectionTop);
    //         } else if (isOn && shouldOff) {
    //             isOn = false;
    //             sticky.classList.remove("is-sticky");
    //             // console.log("🔴 is-sticky OFF", sectionTop);
    //         }

    //         rafId = requestAnimationFrame(tick);
    //     };

    //     // ✅ スクロールイベントに依存しない（ここが効く）
    //     rafId = requestAnimationFrame(tick);

    //     return () => {
    //         cancelAnimationFrame(rafId);
    //         sticky.classList.remove("is-sticky");
    //     };
    // });







});





// document.addEventListener("DOMContentLoaded", () => {
//     const el01 = document.querySelector(".js-facilities-slider01");
//     const el02 = document.querySelector(".js-facilities-slider02");
//     if (!el01 || !el02) return;

//     const wrapper01 = el01.querySelector(".swiper-wrapper");
//     const wrapper02 = el02.querySelector(".swiper-wrapper");
//     if (!wrapper01 || !wrapper02) return;

//     // 02のスライドを退避（再利用するので clone しておく）
//     const slides02Clones = Array.from(wrapper02.children).map((node) =>
//         node.cloneNode(true)
//     );

//     let swiper01 = null;
//     let swiper02 = null;

//     const destroySwiper = (sw) => {
//         if (sw && !sw.destroyed) sw.destroy(true, true);
//     };

//     const setup = () => {
//         const isSP = window.matchMedia("(max-width: 767px)").matches;

//         // 既存swiper破棄
//         destroySwiper(swiper01);
//         destroySwiper(swiper02);
//         swiper01 = null;
//         swiper02 = null;

//         // wrapper01 を「元の状態」に戻す（SP→PC 戻り対応）
//         // ※ data属性で初期HTMLを保持
//         if (!wrapper01.dataset.initialHtml) {
//             wrapper01.dataset.initialHtml = wrapper01.innerHTML;
//         } else {
//             wrapper01.innerHTML = wrapper01.dataset.initialHtml;
//         }

//         if (isSP) {
//             // --- SP: 02の中身を01へ合流 ---
//             slides02Clones.forEach((node) => wrapper01.appendChild(node));

//             // --- SP: 横マルキー（安定版） ---
//             swiper01 = new Swiper(".js-facilities-slider01", {
//                 direction: "horizontal",
//                 loop: true,
//                 slidesPerView: "auto",

//                 speed: 4000, // 1000だと速すぎ＆カクつきやすい
//                 autoplay: {
//                     delay: 0,
//                     disableOnInteraction: false,
//                 },

//                 // ✅ ここが重要（delay:0 の流しっぱなしは freeMode が安定）
//                 freeMode: true,
//                 freeModeMomentum: false,

//                 allowTouchMove: false,
//                 simulateTouch: false,

//                 loopAdditionalSlides: 10,

//                 // ✅ 画像のサイズ確定待ち対策
//                 observer: true,
//                 observeParents: true,
//                 watchSlidesProgress: true,
//             });

//             // linear必須
//             el01.querySelector(".swiper-wrapper").style.transitionTimingFunction = "linear";

//             // ✅ 画像読み込み後に幅が確定してから再計算＆autoplay開始
//             const imgs = el01.querySelectorAll("img");
//             const promises = Array.from(imgs).map((img) => {
//                 if (img.complete) return Promise.resolve();
//                 return new Promise((res) => img.addEventListener("load", res, { once: true }));
//             });

//             Promise.all(promises).then(() => {
//                 if (!swiper01 || swiper01.destroyed) return;
//                 swiper01.update();
//                 swiper01.autoplay?.start();
//             });

//         }
//         else {
//             // --- PC: 縦2本（01,02） ---
//             swiper01 = new Swiper(".js-facilities-slider01", {
//                 direction: "vertical",
//                 loop: true,
//                 slidesPerView: "auto",
//                 speed: 6000,
//                 autoplay: {
//                     delay: 0,
//                     disableOnInteraction: false,
//                 },
//                 allowTouchMove: false,
//                 simulateTouch: false,
//                 loopAdditionalSlides: 10,
//             });

//             swiper02 = new Swiper(".js-facilities-slider02", {
//                 direction: "vertical",
//                 loop: true,
//                 slidesPerView: "auto",
//                 speed: 6000,
//                 autoplay: {
//                     delay: 0,
//                     reverseDirection: true, // PCは逆流
//                     disableOnInteraction: false,
//                 },
//                 allowTouchMove: false,
//                 simulateTouch: false,
//                 loopAdditionalSlides: 10,
//             });

//             // linear
//             el01.querySelector(".swiper-wrapper").style.transitionTimingFunction =
//                 "linear";
//             el02.querySelector(".swiper-wrapper").style.transitionTimingFunction =
//                 "linear";
//         }
//     };

//     // 初期化 + リサイズ追従（matchMediaの変化で再構築）
//     setup();
//     window.addEventListener("resize", () => {
//         // 連打対策（軽く）
//         clearTimeout(window.__facilitiesSliderTimer);
//         window.__facilitiesSliderTimer = setTimeout(setup, 150);
//     });
// });

document.addEventListener("DOMContentLoaded", () => {
    const el01 = document.querySelector(".js-facilities-slider01");
    const el02 = document.querySelector(".js-facilities-slider02");
    if (!el01 || !el02) return;

    const wrapper01 = el01.querySelector(".swiper-wrapper");
    const wrapper02 = el02.querySelector(".swiper-wrapper");
    if (!wrapper01 || !wrapper02) return;

    // 02のスライドを退避（SPで01へ合流する用）
    const slides02Clones = Array.from(wrapper02.children).map((node) =>
        node.cloneNode(true)
    );

    let swiper01 = null;
    let swiper02 = null;

    const destroySwiper = (sw) => {
        if (sw && !sw.destroyed) sw.destroy(true, true);
    };

    const setLinear = (root) => {
        const w = root?.querySelector(".swiper-wrapper");
        if (w) w.style.transitionTimingFunction = "linear";
    };

    const waitImages = (root) => {
        const imgs = root.querySelectorAll("img");
        return Promise.all(
            Array.from(imgs).map((img) => {
                if (img.complete) return Promise.resolve();
                return new Promise((res) =>
                    img.addEventListener("load", res, { once: true })
                );
            })
        );
    };

    // ✅ 初期ロード直後の“加速/ガクッ”対策：画像ロード→update→次フレームでautoplay開始
    const startAutoplaySafely = async (sw, root, autoplayParams) => {
        if (!sw || sw.destroyed) return;
        await waitImages(root);
        if (!sw || sw.destroyed) return;

        sw.update();

        requestAnimationFrame(() => {
            if (!sw || sw.destroyed) return;
            sw.params.autoplay = autoplayParams;
            sw.autoplay?.start();
        });
    };

    // ✅ resize連発での再初期化を避ける：BP跨ぎの時だけ作り直す
    const mql = window.matchMedia("(max-width: 767px)");
    let lastIsSP = null;

    const setup = () => {
        const isSP = mql.matches;
        if (lastIsSP === isSP) return;
        lastIsSP = isSP;

        // SPは02を非表示 / PCは必ず表示に戻す
        if (isSP) {
            el02.style.display = "none";
            el02.setAttribute("aria-hidden", "true");
        } else {
            el02.style.display = "";
            el02.removeAttribute("aria-hidden");
        }

        // 既存swiper破棄
        destroySwiper(swiper01);
        destroySwiper(swiper02);
        swiper01 = null;
        swiper02 = null;

        // wrapper01 を元に戻す（SP→PC 戻り対応）
        if (!wrapper01.dataset.initialHtml) {
            wrapper01.dataset.initialHtml = wrapper01.innerHTML;
        } else {
            wrapper01.innerHTML = wrapper01.dataset.initialHtml;
        }

        if (isSP) {
            // --- SP: 02の中身を01へ合流 ---
            slides02Clones.forEach((node) => wrapper01.appendChild(node));

            // --- SP: 横マルキー（autoplayは後掛け） ---
            swiper01 = new Swiper(".js-facilities-slider01", {
                direction: "horizontal",
                loop: true,
                slidesPerView: "auto",
                speed: 4000,

                autoplay: false,

                freeMode: true,
                freeModeMomentum: false,

                allowTouchMove: false,
                simulateTouch: false,

                loopAdditionalSlides: 20,

                // SPは合流でDOMを触るのでON
                observer: true,
                observeParents: true,
            });

            setLinear(el01);

            startAutoplaySafely(swiper01, el01, {
                delay: 0,
                disableOnInteraction: false,
            });
        } else {
            // --- PC: 縦2本（01,02）両方autoplay後掛け（安定） ---
            swiper01 = new Swiper(".js-facilities-slider01", {
                direction: "vertical",
                loop: true,
                slidesPerView: "auto",
                speed: 6000,

                autoplay: false,

                // ✅ delay:0 + loop の安定化
                freeMode: true,
                freeModeMomentum: false,

                allowTouchMove: false,
                simulateTouch: false,

                loopAdditionalSlides: 30,

                // PCはOFF（変化検知→揺れの原因になりやすい）
                observer: false,
                observeParents: false,
            });

            swiper02 = new Swiper(".js-facilities-slider02", {
                direction: "vertical",
                loop: true,
                slidesPerView: "auto",
                speed: 6000,

                autoplay: false,

                // ✅ 逆再生はJSでやらない。freeModeで滑らかに。
                freeMode: true,
                freeModeMomentum: false,

                allowTouchMove: false,
                simulateTouch: false,

                loopAdditionalSlides: 30,

                observer: false,
                observeParents: false,
            });

            setLinear(el01);
            setLinear(el02);

            startAutoplaySafely(swiper01, el01, {
                delay: 0,
                disableOnInteraction: false,
            });

            // ✅ reverseDirectionは使わない（CSS反転で逆に見せる）
            startAutoplaySafely(swiper02, el02, {
                delay: 0,
                disableOnInteraction: false,
            });
        }
    };

    setup();

    if (mql.addEventListener) {
        mql.addEventListener("change", setup);
    } else {
        mql.addListener(setup); // 古いSafari対策
    }
});




