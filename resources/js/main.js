import Helper from "./includes/Helper";
import LikeProduct from "./includes/likeProduct";
import LikeComment from "./includes/likeComment";
import Hider from "./includes/Hider";

export default class MainController {
	static isMobile = getComputedStyle(document.querySelector(".header-mobile")).display === "block";

	static nodes = {
		btnBurger: document.querySelector(".burger"),

		search: MainController.isMobile
			? document.querySelector(".search[data-mobile]")
			: document.querySelector(".search[data-desktop]"),
		searchWrapper: document.querySelector(".search__wrapper"),

		logo: document.querySelector(".header-mobile__col .logo"),

		userDropdown: document.querySelector(".user-dropdown"),
		triggerUserDropdown: document.querySelector(".user-dropdown__preview"),

		up: document.querySelector(".up"),
		blogNav: document.querySelectorAll(".blog-nav__category"),
		likesBtn: document.querySelectorAll(".product__like")
	};


	/*
    * Global slider setting*/
	static sliderOptions = {
		slidesPerView: 1,
		spaceBetween: 10,
		direction: "horizontal",
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
	};

	static init() {
		new LikeProduct();
		new LikeComment();

		MainController.nodes.searchResults = MainController.nodes.search.querySelector(".search__results-body");
		MainController.nodes.searchInput = MainController.nodes.search.querySelector(".search__input");

		let triggerUserDropdown = MainController.nodes.triggerUserDropdown;
		if (!MainController.isMobile && triggerUserDropdown) {
			triggerUserDropdown.addEventListener("click",() => {
				$(".user-dropdown").toggleClass("open");
				$(triggerUserDropdown).toggleClass("open");
			});
		}

		let up = MainController.nodes.up;
		window.onscroll = () => {
			if (window.scrollY > 60) {
				up.classList.add("active");
			} else {
				up.classList.remove("active");
			}
		};

		if (MainController.nodes.btnBurger) {
			MainController.nodes.btnBurger.addEventListener("click", function () {
				MainController.toggleMobileMenu(MainController.nodes.btnBurger);
			});
		}

		if (MainController.nodes.blogNav) {
			MainController.nodes.blogNav.forEach(nav => {
				nav.addEventListener("click", () => {
					MainController.nodes.blogNav.forEach(nav => {
						if (nav.classList.contains("open")) {
							nav.classList.remove("open");
						}
					});
					nav.classList.toggle("open");
				});
			});
		}


		let search = MainController.nodes.search;
		let searchWrapper = MainController.nodes.searchWrapper;
		search && search.addEventListener("click", () => {
			MainController.nodes.btnBurger.classList.add("open");
			MainController.nodes.btnBurger.setAttribute("action", "search");
			$(".search").addClass("open");
			if (MainController.isMobile) return;
			searchWrapper.style.width = "320px";
			let hider = new Hider("search__wrapper", () => {
				$(".search").removeClass("open");
				$(".burger").removeClass("open").attr("action", "");
				$(".search__wrapper").css("width", "50px");
				$(".search__results").hide();
			});
			document.addEventListener("mouseup", hider.hide);
		});

		MainController.nodes.searchInput.addEventListener("input",(event) => {
			if (event.target.value.length > 2) {
				let formData = new FormData();
				formData.append("_token", csrfToken);
				formData.append("search_text", event.target.value);

				$(".search__results").show();
				$(".search__empty").fadeOut();
				$(".search__loader").fadeIn();

				fetch(baseURL + "/search", {
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
									MainController.nodes.searchResults.innerHTML = "";
									if (result.data.articles.length < 1 && result.data.products.length < 1) {
										$(".search__empty").fadeIn();
									}
									if (result.data.articles.length > 0) {
										let articlesHtml = result.data.articles.map(Helper.generateSearchLink).join("");
										MainController.nodes.searchResults.innerHTML = `<div class="search__row">
                                 <div class="search__title h4">Статті</div>
                                  ${articlesHtml}
                                 </div>`;
									}
									if (result.data.products.length > 0) {
										let productsHtml = result.data.products.map(Helper.generateSearchLink).join("");
										MainController.nodes.searchResults.innerHTML += `<div class="search__row">
                                 <div class="search__title h4">Продукти</div>
                                  ${productsHtml}
                                 </div>`;
									}
								}
							);
						}
					})
					.catch(error => {
						console.log(error);
						$(".search__empty").fadeIn();
					})
					.finally( () => {
						$(".search__loader").fadeOut();
					});

			} else {
				$(".search__results").hide();
				$(".search__empty").fadeOut();
			}
		});


	}

	static toggleMobileMenu(burger){
		let action = $(burger).attr("action");
		if (action === "search") {
			$(".search").removeClass("open");
			$(".search__results").hide();
			$(burger).removeClass("open").attr("action","");
			return;
		}

		if (burger.classList.contains("open")) {
			$(burger).removeClass("open");
			$(".header-mobile__wrapper").removeClass("active");
			$(".header-mobile__col .logo").removeClass("invert");
			document.body.style.overflow = "auto";
			$(".search_white").show();
			return;
		}
		document.body.style.overflow = "hidden";
		$(burger).addClass("open");
		$(".header-mobile__col .logo").addClass("invert");
		$(".header-mobile__wrapper").addClass("active");
		$(".search_white").hide();
	}
}


