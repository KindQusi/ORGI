{
    const debounce = (func, wait = 5, immediate = true) => {
        var timeout;
        return function () {
            var context = this,
                args = arguments;
            var later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args)
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) { func.apply(context, args); }
        };
    }

    const sliderImages = document.querySelectorAll(".slide-in");
    const faders = document.querySelectorAll(".fade-in");

    function checkSlide(e) {
        sliderImages.forEach(sliderImage => {
            const slideInAt = (window.scrollY + window.innerHeight) - sliderImage.height / 2;
            const imagebottom = sliderImage.offsetTop + sliderImage.height;
            const isHalfShown = slideInAt > sliderImage.offsetTop;
            const isNotScrolledpast = window.scrollY < imagebottom;
            if (isHalfShown && isNotScrolledpast) {
                sliderImage.classList.add("active");
            } else {
                sliderImage.classList.remove("active");
            }
        });
        const appearOptions = {
            threshold: 0,
            rootMargin: "-100px 0px -100px 0px"
        };
        const appearOnScroll = new IntersectionObserver(function (
            entries,
            appearOnScroll
        ) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    entry.target.classList.remove("active");
                    appearOnScroll.unobserve(entry.target);
                    // return;
                } else {
                    entry.target.classList.add("active");
                    appearOnScroll.unobserve(entry.target);
                }
            });
        },
            appearOptions);
        faders.forEach(fader => {
            appearOnScroll.observe(fader);
        });
    };
    window.addEventListener("scroll", debounce(checkSlide));
    window.addEventListener("load", debounce(checkSlide));
}