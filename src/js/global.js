//bg-video再生速度
document.addEventListener('DOMContentLoaded', () => {
    const video = document.querySelector('.js-bg-video');
    if (!video) return;
    video.playbackRate = 0.6;
});
