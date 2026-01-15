document.addEventListener("DOMContentLoaded", () => {
    initMvSwiper();
    initConceptScroll();
    initFacilitiesSliders();
});

/* =========================================================
   MV Swiper
========================================================= */
function initMvSwiper() {
    const elements = document.querySelectorAll(".js-mv-swiper");
    if (!elements.length) return;

    elements.forEach((el) => {
        new Swiper(el, {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
            speed: 2000,
            effect: "fade",
            fadeEffect: { crossFade: true },
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
        });
    });
}

/* =========================================================
   Concept
========================================================= */
function initConceptScroll() {
    if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") return;

    gsap.registerPlugin(ScrollTrigger);

    const section = document.querySelector(".js-concept");
    const nextSection = document.querySelector(".js-facilities");
    if (!section || !nextSection) return;

    // data-index で順番固定
    const containers = gsap.utils
        .toArray(section.querySelectorAll(".js-concept-container"))
        .sort(
            (a, b) => parseInt(a.dataset.index, 10) - parseInt(b.dataset.index, 10)
        );

    if (!containers.length) return;

    const fadeTop = section.querySelector(".concept__fade--top");
    const fadeBottom = section.querySelector(".concept__fade--bottom");

    const mm = gsap.matchMedia();

    mm.add("(min-width: 768px)", () => {
        const STEP = 2000;
        const TOTAL = STEP * containers.length;

        // 遷移直後ガード（ちらつき対策）
        let justFinishedTransition = false;

        // クールダウン（解除直後の入力を少し無効化）
        let coolDown = false;
        const COOLDOWN_MS = 120;

        // スクロール入力ブロック
        let blockScrollInput = false;

        // wheel/touch/scroll をまとめてブロック
        const observer = ScrollTrigger.observe({
            target: window,
            type: "wheel,touch,scroll",
            preventDefault: true,
            allowClicks: true,
            onEnable(self) {
                self._lockedY = window.scrollY;
            },
            onChangeY(self) {
                if (typeof self._lockedY === "number") window.scrollTo(0, self._lockedY);
            },
        });
        observer.disable();

        const keydownHandler = (e) => {
            if (!blockScrollInput && !coolDown) return;

            const keys = [
                "ArrowUp",
                "ArrowDown",
                "PageUp",
                "PageDown",
                "Home",
                "End",
                " ",
                "Spacebar",
            ];
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

            coolDown = true;
            setTimeout(() => {
                coolDown = false;
            }, COOLDOWN_MS);
        };

        // 固定スタック（z-index順）
        const applyStack = () => {
            containers.forEach((c, i) => {
                gsap.set(c, { zIndex: containers.length - i });
            });
        };

        // progress bar キャッシュ
        const bars = containers.map((c) => c.querySelector(".js-progress-bar"));
        const setBarY = bars.map((bar) => (bar ? gsap.quickSetter(bar, "scaleY") : null));

        // 初期化
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

        // 上フェード（入口）
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

        // スライド切替
        let currentIndex = 0;
        let isAnimating = false;
        let pendingIndex = null;

        const requestShow = (nextIndex) => {
            if (nextIndex === currentIndex) return;
            if (nextIndex < 0 || nextIndex >= containers.length) return;
            if (justFinishedTransition) return;

            if (isAnimating) {
                pendingIndex = nextIndex;
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

            gsap.set(next, { zIndex: containers.length + 5 });
            gsap.set(next, { autoAlpha: 1, y: BG_SLIDE });

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

                        justFinishedTransition = true;

                        requestAnimationFrame(() => {
                            applyStack();
                            requestAnimationFrame(() => {
                                justFinishedTransition = false;
                            });
                        });

                        currentIndex = nextIndex;
                        isAnimating = false;

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

        // pin
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

        // 下フェード（出口）
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
}

/* =========================================================
   Facilities Sliders
========================================================= */
function initFacilitiesSliders() {
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

    // 初期ロード直後の対策
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

    // resize連発での再初期化を避ける
    const mql = window.matchMedia("(max-width: 767px)");
    let lastIsSP = null;

    const setup = () => {
        const isSP = mql.matches;
        if (lastIsSP === isSP) return;
        lastIsSP = isSP;

        // SPは02を非表示 / PCは表示
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
            // SP: 02の中身を01へ合流
            slides02Clones.forEach((node) => wrapper01.appendChild(node));

            // SP
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

                observer: true,
                observeParents: true,
            });

            setLinear(el01);

            startAutoplaySafely(swiper01, el01, {
                delay: 0,
                disableOnInteraction: false,
            });
            return;
        }

        // PC
        swiper01 = new Swiper(".js-facilities-slider01", {
            direction: "vertical",
            loop: true,
            slidesPerView: "auto",
            speed: 6000,

            autoplay: false,

            freeMode: true,
            freeModeMomentum: false,

            allowTouchMove: false,
            simulateTouch: false,

            loopAdditionalSlides: 30,

            observer: false,
            observeParents: false,
        });

        swiper02 = new Swiper(".js-facilities-slider02", {
            direction: "vertical",
            loop: true,
            slidesPerView: "auto",
            speed: 6000,

            autoplay: false,

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

        // reverseDirectionは使わない（CSS反転で逆に見せる）
        startAutoplaySafely(swiper02, el02, {
            delay: 0,
            disableOnInteraction: false,
        });
    };

    setup();

    if (mql.addEventListener) {
        mql.addEventListener("change", setup);
    } else {
        mql.addListener(setup); // 古いSafari対策
    }
}
