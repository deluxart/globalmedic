
// Slider for product's item
document.querySelectorAll('.med-slider').forEach(n => {
    const galleryThumbs = new Swiper(n.querySelector('.gallery-thumbs'), {
        spaceBetween: 10,
        slidesPerView: 5,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    const galleryTop = new Swiper(n.querySelector('.gallery-top'), {
        spaceBetween: 10,
        navigation: {
            nextEl: n.querySelector('.swiper-button-next'),
            prevEl: n.querySelector('.swiper-button-prev'),
        },
        thumbs: {
            swiper: galleryThumbs,
        },
    });

});
