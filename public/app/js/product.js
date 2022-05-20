
//Nodes
let swiperWrapper = document.querySelector("#swiper-wrapper");
let bigPhoto = document.querySelector(".photos__big");
let swiperSlides = document.querySelectorAll(".photos__slide");
let quickNav = document.querySelector(".quick-nav");
let quickLinks = document.querySelectorAll(".product-page__link");
let addToCardBtn = document.getElementById("add_to_card");

let basketNotification = isMobile
    ? document.querySelector('.basket-mobile .basket__notification')
    : document.querySelector('.basket .basket__notification')  ;

const photoPreviews = document.querySelectorAll("[data-photo]");
const photo = document.querySelector("#main-photo");
let navItems = quickNav.querySelectorAll(".quick-nav__item");
let sizes = document.querySelectorAll(".sizes__item");

let photoPreview = new PhotoPreview (photo, photoPreviews);
let modal = new Modal("", ".modal-wrapper" , true);

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

// Variables

let svgCart = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.94 18.06L19.26 8.31C19.1452 7.47997 18.7404 6.71734 18.1171 6.15725C17.4939 5.59716 16.6925 5.27576 15.855 5.25H15.75C15.75 4.25544 15.3549 3.30161 14.6516 2.59835C13.9484 1.89509 12.9946 1.5 12 1.5C11.0054 1.5 10.0516 1.89509 9.34834 2.59835C8.64508 3.30161 8.24999 4.25544 8.24999 5.25H8.14499C7.30746 5.27576 6.50608 5.59716 5.88285 6.15725C5.25961 6.71734 4.85475 7.47997 4.73999 8.31L3.05999 18.06C2.95681 18.6256 2.97924 19.2071 3.12569 19.7631C3.27215 20.3191 3.53905 20.8361 3.90749 21.2775C4.21794 21.6565 4.60801 21.9625 5.05001 22.1738C5.49201 22.385 5.9751 22.4964 6.46499 22.5H17.535C18.0249 22.4964 18.508 22.385 18.95 22.1738C19.392 21.9625 19.7821 21.6565 20.0925 21.2775C20.4609 20.8361 20.7278 20.3191 20.8743 19.7631C21.0208 19.2071 21.0432 18.6256 20.94 18.06ZM12 3C12.5967 3 13.169 3.23705 13.591 3.65901C14.0129 4.08097 14.25 4.65326 14.25 5.25H9.74999C9.74999 4.65326 9.98705 4.08097 10.409 3.65901C10.831 3.23705 11.4033 3 12 3ZM18.945 20.31C18.7755 20.522 18.5612 20.6938 18.3174 20.8131C18.0736 20.9325 17.8064 20.9963 17.535 21H6.46499C6.1936 20.9963 5.9264 20.9325 5.6826 20.8131C5.43881 20.6938 5.22447 20.522 5.05499 20.31C4.82644 20.0365 4.66146 19.7157 4.57197 19.3707C4.48247 19.0257 4.4707 18.6651 4.53749 18.315L6.21749 8.565C6.27332 8.08382 6.49734 7.63782 6.85001 7.30574C7.20268 6.97365 7.66132 6.77683 8.14499 6.75H15.855C16.3387 6.77683 16.7973 6.97365 17.15 7.30574C17.5026 7.63782 17.7267 8.08382 17.7825 8.565L19.4625 18.315C19.5293 18.6651 19.5175 19.0257 19.428 19.3707C19.3385 19.7157 19.1735 20.0365 18.945 20.31Z" fill="white"/>
                </svg>`;

let yesHTML = `<div style="display: flex; flex-direction: column; align-items: center"><?xml version="1.0" encoding="iso-8859-1"?>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="80px" height="80px" x="0px" y="0px"
                \t viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                <circle style="fill:#25AE88;" cx="25" cy="25" r="25"/>
                <polyline style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" points="
                \t38,15 22,33 12,25 "/>
                </svg>
                <p class="p" style="text-align: center"> Товар додано до кошику </p></div>`;


//Listeners

sizes.forEach( size => {
   size.addEventListener("click", () => {
       clearActive(sizes, "sizes__item_chosen");
       size.classList.add('sizes__item_chosen');
       toggleCartButton(addToCardBtn);
   });
});

window.addEventListener("load", () => {
   let activeNav = localStorage.getItem("nav-active");
   if(activeNav){
       toStep(activeNav);
   }
});

addToCardBtn.addEventListener("click", () => {

    let formData = new FormData();
    let chosenSize = document.querySelector(".sizes__item_chosen");
    let sizeId = chosenSize.dataset.size;

    if (addToCardBtn.classList.contains("product-page__make-order_ordered")){
        return;
    }

    formData.append("size_id", sizeId );
    formData.append("product_id", productId);
    formData.append("_token", csrfToken);

    addToCardBtn.classList.add("disabled");


    fetch(addToCartURL, {
        method: "POST",
        body: formData,
    })
        .then((response) => {
            if (!response.ok && response.status === 422){
                response.json().then(
                    result => {
                        $('#product_error').text(result.message);
                        $('.product-page__error').fadeIn();
                    }
                )
            } else {
                response.json().then(
                    () => {
                        toggleCartButton(addToCardBtn, true);
                        let prev = +basketNotification.textContent;
                        if(basketNotification.parentElement.classList.contains("d-none")) {
                            basketNotification.parentElement.classList.remove("d-none");
                        }
                        basketNotification.textContent = ++prev;
                        modal
                            .setTitle("Успішно")
                            .setDescription(yesHTML)
                            .setActionYES(() => {  window.location.href = baseURL + "/basket";},"Переглянути")
                            .setActionNO(() => {}, "Продовжити покупки")
                            .init()
                            .onOpen();
                    }
                )
            }
        })
        .catch(error => {
            console.log(error);
        })
        .finally( () => {
            addToCardBtn.classList.remove("disabled");
        })
})

navItems.forEach(nav => {
    nav.addEventListener("click", () => {
        let needShow = nav.dataset.nav;
        if(needShow) {
            clearActive(navItems, "quick-nav__item_active");
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
            clearActive(navItems, "quick-nav__item_active");
            $(`.quick-nav__item[data-nav="${needShow}"]`).addClass("quick-nav__item_active");
            toStep(needShow);
        }
    })
});


function clearActive(elems, className) {
    elems.forEach(nav => {
        nav.classList.remove(className);
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

function toggleCartButton (btn, ordered = false) {
    if(ordered) {
        btn.classList.add("product-page__make-order_ordered");
        btn.querySelector(".btn").innerHTML = svgCart + "Додано до кошику";
        return;
    }
    btn.classList.remove("product-page__make-order_ordered");
    btn.querySelector(".btn").innerHTML = svgCart + "В кошик";
}

