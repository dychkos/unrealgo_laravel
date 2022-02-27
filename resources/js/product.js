
//Common Nodes
let swiperWrapper = document.querySelector("#swiper-wrapper");
let bigPhoto = document.querySelector(".photos__big");
let swiperSlides = document.querySelectorAll(".photos__slide");


if (window.matchMedia("(max-width: 768px)").matches) {

    swiperWrapper.append(bigPhoto);

    swiperWrapper.classList.add("swiper-wrapper");
    swiperSlides.forEach(swipe => {
        swipe.classList.add("swiper-slide");
    })

    let ph_swiper = new Swiper("#photosSwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        autoplay:true,
        direction:"horizontal",
        pagination: {
            el: ".swiper-pagination",
        },
    });
}
//
//


//Listeners


