//Global variables
const isMobile = getComputedStyle(document.querySelector('.header-mobile')).display === 'block';

//Common Nodes
let btnBurger = document.querySelector('.burger');
let search = isMobile
	? document.querySelector('.search[data-mobile]')
	: document.querySelector('.search[data-desktop]')  ;
let searchWrapper = document.querySelector('.search__wrapper');
let searchInput = search.querySelector('.search__input');
let searchResults = search.querySelector('.search__results');
let logo = document.querySelector(".header-mobile__col .logo");
let userDropdown = document.querySelector('.user-dropdown');
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
	search.classList.add('open');
	btnBurger.classList.add('open');
	btnBurger.setAttribute('action','search');
	if(isMobile) return;
	searchWrapper.style.width = '320px';

	let hider = new Hider("search__wrapper",()=>{
		$(".search").removeClass("open");
		$(".burger").removeClass("open").attr("action","");
		$(".search__wrapper").css("width","60px");
		$(".search__results").hide();
	})

	document.addEventListener('mouseup',hider.hide);
});

searchInput.addEventListener('input',(event)=>{
	if(event.target.value.length > 2){
		searchResults.style.display = "block";
		searchResults.innerHTML =
			` <div class="search__row">
             	<div class="search__title h4">Статьи</div>
                  <p class="search__link h5"><a href="#">Рандомный текст</a></p>
                  <p class="search__link h5"><a href="#">Типо текст</a></p>
              </div>
              <div class="search__row">
                <div class="search__title h4">Товары</div>
                  <p class="search__link h5"><a href="#">Найдено туть</a></p>
                  <p class="search__link h5"><a href="#">эовы туть</a></p>
              </div>`
	}else{
		searchResults.style.display = "none";
	}
})

if(userDropdown) {
    userDropdown.addEventListener("click",()=>{
        userDropdown.classList.toggle("open");

        let hider = new Hider(".user-dropdown",()=>{
            $(".user-dropdown").removeClass("open");
        });

        if(userDropdown.classList.contains("open")){
            document.addEventListener('mouseup',hider.hide);
        }else{
            document.removeEventListener('mouseup',hider.hide);
        }
    })
}


//Additional
function toggleMobileMenu(burger){
	let action = $(burger).attr("action");
	if(action==="search"){
		$(".search").removeClass("open");
		searchResults.style.display = "none";
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

function hideSidebarNav(){
	blogNav.forEach(nav=>{
		if(nav.classList.contains("open")){
			nav.classList.remove("open");
		}
	})
}


