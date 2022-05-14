
//Common Nodes
let swiperWrapper = document.querySelector("#swiper-wrapper");
let bigPhoto = document.querySelector(".photos__big");
let swiperSlides = document.querySelectorAll(".photos__slide");
let quickNav = document.querySelector(".quick-nav");
let quickLinks = document.querySelectorAll(".product-page__link");

const photoPreviews = document.querySelectorAll("[data-photo]");
const photo = document.querySelector("#main-photo");

let photoPreview = new PhotoPreview (photo, photoPreviews);

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

let navItems = quickNav.querySelectorAll(".quick-nav__item");

window.addEventListener("load", () => {
   let activeNav = localStorage.getItem("nav-active");
   if(activeNav){
       toStep(activeNav);
   }
});

navItems.forEach(nav => {
    nav.addEventListener("click", () => {
        let needShow = nav.dataset.nav;
        if(needShow) {
            clearActive();
            $(nav).addClass("quick-nav__item_active");
            toStep(needShow);
        }
    })
});

quickLinks.forEach(link => {
    link.addEventListener("click", (event) => {
        let needShow = link.dataset.nav;
        event.preventDefault();
        if(needShow) {
            clearActive();
            $(`.quick-nav__item[data-nav="${needShow}"]`).addClass("quick-nav__item_active");
            toStep(needShow);
        }
    })
});

function clearActive() {
    navItems.forEach(nav => {
        nav.classList.remove("quick-nav__item_active");
    });
}

function toStep(stepName) {
    let current = $('.nav-active');
    if(current.id === stepName) return;
    $(current).fadeOut();
    $(current).removeClass("nav-active");
    let needShowSelector = $("#" + stepName);
    $(needShowSelector).addClass("nav-active");
    $(needShowSelector).fadeIn();
    localStorage.setItem("nav-active", stepName);
}


