/*
* Nodes
* */
let quickNav = document.querySelector(".quick-nav");
//let quickLinks = document.querySelectorAll(".product-page__link");
let navItems = quickNav.querySelectorAll(".quick-nav__item");
/*
* Listeners
* */

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

/*
* Function
* */
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

