document.addEventListener("DOMContentLoaded", function () {
    const videoFrame = document.getElementById("parallax-video-frame");
    const ambientVideo = document.getElementById("hero-ambient-video");

    if (!videoFrame || !ambientVideo) return;

    let ticking = false;

    window.addEventListener("scroll", function () {
        if (!ticking) {
            window.requestAnimationFrame(function () {
                // Calculate element position relative to the screen layout viewport boundaries
                const rect = videoFrame.getBoundingClientRect();
                const viewHeight = window.innerHeight;

                // Check if the container is currently visible inside the display viewport frame
                if (rect.top < viewHeight && rect.bottom > 0) {
                    // Parallax ratio modifier multiplier (0.15 makes it move subtly slower than core frame layout speed)
                    const scrolledDistance = window.scrollY || document.documentElement.scrollTop;
                    const offsetTranslateY = (scrolledDistance * 0.15);

                    // Apply hardware-accelerated translate3d transformations safely
                    ambientVideo.style.transform = `translate3d(0, ${offsetTranslateY}px, 0)`;
                }
                ticking = false;
            });
            ticking = true;
        }
    }, { passive: true }); // Passive flag ensures scrolling performance isn't impacted
});
