//Global variables
const isMobile = getComputedStyle(document.querySelector('.header-mobile')).display === 'block';

//Common Nodes
let btnBurger = document.querySelector('.burger');

let search = isMobile
	? document.querySelector('.search[data-mobile]')
	: document.querySelector('.search[data-desktop]')  ;
let searchWrapper = document.querySelector('.search__wrapper');
let searchInput = search.querySelector('.search__input');
let searchResults = search.querySelector('.search__results-body');

let logo = document.querySelector(".header-mobile__col .logo");

let userDropdown = document.querySelector('.user-dropdown');
let triggerUserDropdown = document.querySelector('.user-dropdown__preview');

let up = document.querySelector('.up');
let blogNav = document.querySelectorAll('.blog-nav__category');


let sliderOptions  = {
	slidesPerView: 1,
	spaceBetween: 10,
	direction:"horizontal",
	// Responsive breakpoints
	breakpoints: {
		// when window width is >= 640px
		640: {
			slidesPerView: 2,
			spaceBetween: 20
		},
		// when window width is >= 640px
		768: {
			slidesPerView: 3,
			spaceBetween: 20
		},
		991: {
			slidesPerView: 4,
			spaceBetween: 20
		}
	}
}

//Listeners

btnBurger.addEventListener('click',function (e){
	toggleMobileMenu(btnBurger);
})

window.onscroll = () =>{
	if(window.scrollY > 60){
		up.classList.add("active");
	}else {
		up.classList.remove("active");
	}
}

blogNav.forEach(nav=>{
	nav.addEventListener("click",()=>{
		hideSidebarNav();
		nav.classList.toggle("open");
	})
})

search.addEventListener('click',()=>{
	btnBurger.classList.add('open');
	btnBurger.setAttribute('action','search');
	if(isMobile) return;
	searchWrapper.style.width = '320px';

	let hider = new Hider("search__wrapper",() => {
		$(".search").removeClass("open");
		$(".burger").removeClass("open").attr("action","");
		$(".search__wrapper").css("width","50px");
		$(".search__results").hide();
	})

	document.addEventListener('mouseup', hider.hide);
});

searchInput.addEventListener('input',(event)=>{
	if(event.target.value.length > 2){
        let formData = new FormData();
        formData.append("_token", csrfToken);
        formData.append("search_text", event.target.value);

        $(".search__results").show();
        $(".search__empty").fadeOut();
        $(".search__loader").fadeIn();

        fetch(baseURL + '/search', {
            method: "POST",
            body: formData
        })
            .then((response) => {
                if (!response.ok){
                    $(".search__empty").fadeIn();
                } else {
                    response.json().then(
                        (result) => {
                            $(".search__loader").fadeOut();
                            searchResults.innerHTML = "";
                            if (result.data.articles.length < 1 && result.data.products.length < 1) {
                                $(".search__empty").fadeIn();
                            }
                            if (result.data.articles.length > 0) {
                                let articlesHtml = result.data.articles.map(generateSearchLink).join("");
                                searchResults.innerHTML = `<div class="search__row">
                                 <div class="search__title h4">Статті</div>
                                  ${articlesHtml}
                                 </div>`;
                            }
                            if (result.data.products.length > 0) {
                                let productsHtml = result.data.products.map(generateSearchLink).join("");
                                searchResults.innerHTML += `<div class="search__row">
                                 <div class="search__title h4">Продукти</div>
                                  ${productsHtml}
                                 </div>`;
                            }
                        }
                    )
                }
            })
            .catch(error => {
                console.log(error);
                $(".search__empty").fadeIn();
            })
            .finally( () => {
                $(".search__loader").fadeOut();
            })

	}else{
        $(".search__results").hide();
        $(".search__empty").fadeOut();
	}
})

if(!isMobile && triggerUserDropdown){
    triggerUserDropdown.addEventListener("click",() => {
        $(".user-dropdown").toggleClass("open");
        $(triggerUserDropdown).toggleClass("open");
    })
}


//Additional
function toggleMobileMenu(burger){
	let action = $(burger).attr("action");
	if(action === "search"){
		$(".search").removeClass("open");
		$(".search__results").hide();
		$(burger).removeClass("open").attr("action",'');
		return;
	}

	let isOpen = burger.classList.contains("open");
	if(isOpen){
		$(burger).removeClass("open");
		$('.header-mobile__wrapper').removeClass("active");
		$('.header-mobile__col .logo').removeClass("invert");
		document.body.style.overflow = "auto";
		$('.search_white').show();
		return;
	}
	document.body.style.overflow = "hidden";
	$(burger).addClass("open");
	$('.header-mobile__col .logo').addClass("invert");
	$('.header-mobile__wrapper').addClass("active");
	$('.search_white').hide();

}

function hideSidebarNav() {
	blogNav.forEach(nav=>{
		if(nav.classList.contains("open")){
			nav.classList.remove("open");
		}
	})
}

function generateSearchLink (elem) {
    return `<p class="search__link h5"><a href="${elem.link}">${elem.title}</a></p>`;
}

