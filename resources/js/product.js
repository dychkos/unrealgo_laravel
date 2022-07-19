import PhotoPreview from "./includes/PhotoPreviews";
import Modal from "./includes/Modal";
import { yesProductAdded, svgCart } from "./includes/innerText";
import MainController from "./main";

export default class Product extends MainController {
	static nodes = {
		swiperWrapper: document.querySelector("#swiper-wrapper"),
		bigPhoto: document.querySelector(".photos__big"),
		swiperSlides: document.querySelectorAll(".photos__slide"),
		quickNav: document.querySelector(".quick-nav"),
		quickLinks: document.querySelectorAll(".product-page__link"),
		addToCardBtn: document.getElementById("add_to_card"),
		basketNotification: this.isMobile
			? document.querySelector(".basket-mobile .basket__notification")
			: document.querySelector(".basket .basket__notification"),
		photoPreviews: document.querySelectorAll("[data-photo]"),
		photo: document.querySelector("#main-photo"),
		sizes: document.querySelectorAll(".sizes__item")
	};

	static init() {
		super.init();
		new PhotoPreview (Product.nodes.photo, Product.nodes.photoPreviews);
		let modal = new Modal("", ".modal-wrapper" , true);
		let navItems = Product.nodes.quickNav.querySelectorAll(".quick-nav__item");


		if (window.matchMedia("(max-width: 768px)").matches) {
			Product.nodes.swiperWrapper.append(Product.nodes.bigPhoto);

			Product.nodes.swiperWrapper.classList.add("swiper-wrapper");
			Product.nodes.swiperSlides.forEach(swipe => {
				swipe.classList.add("swiper-slide");
			});
			new Swiper("#photosSwiper", {
				slidesPerView: 1,
				spaceBetween: 10,
				autoplay:true,
				direction:"horizontal",
				pagination: {
					el: ".swiper-pagination",
				},
			});
		}

		let sizes = Product.nodes.sizes;
		let addToCardBtn = Product.nodes.addToCardBtn;

		sizes.forEach( size => {
			size.addEventListener("click", () => {
				this.clearActive(sizes, "sizes__item_chosen");
				size.classList.add("sizes__item_chosen");
				this.toggleCartButton(addToCardBtn);
			});
		});

		addToCardBtn.addEventListener("click", () => {
			let formData = new FormData();
			let chosenSize = document.querySelector(".sizes__item_chosen");
			let sizeId = chosenSize ? chosenSize.dataset.size : -1;

			if (addToCardBtn.classList.contains("product-page__make-order_ordered")){
				return;
			}

			formData.append("size_id", sizeId);
			formData.append("product_id", productId);
			formData.append("_token", csrfToken);

			addToCardBtn.classList.add("disabled");


			fetch(baseURL + "/store/add-to-cart", {
				method: "POST",
				body: formData,
			})
				.then((response) => {
					if (!response.ok && response.status === 422){
						response.json().then(
							result => {
								$("#product_error").text(result.message);
								$(".product-page__error").fadeIn();
							}
						);
					} else {
						response.json().then(
							() => {
								this.toggleCartButton(addToCardBtn, true);
								let prev = +Product.nodes.basketNotification.textContent;
								if (Product.nodes.basketNotification.parentElement.classList.contains("d-none")) {
									Product.nodes.basketNotification.parentElement.classList.remove("d-none");
								}
								Product.nodes.basketNotification.textContent = ++prev;
								modal
									.setTitle("Успішно")
									.setDescription(yesProductAdded)
									.setActionYES(() => {  window.location.href = baseURL + "/basket";},"Переглянути")
									.setActionNO(() => {}, "Продовжити покупки")
									.init()
									.onOpen();
							}
						);
					}
				})
				.catch(error => {
					console.log(error);
				})
				.finally( () => {
					addToCardBtn.classList.remove("disabled");
				});
		});

		navItems.forEach(nav => {
			nav.addEventListener("click", () => {
				let needShow = nav.dataset.nav;
				if (needShow) {
					this.clearActive(navItems, "quick-nav__item_active");
					$(nav).addClass("quick-nav__item_active");
					this.toStep(needShow);
				}
			});
		});

		Product.nodes.quickLinks.forEach(link => {
			link.addEventListener("click", (event) => {
				let needShow = link.dataset.nav;
				event.preventDefault();
				if (needShow) {
					this.clearActive(navItems, "quick-nav__item_active");
					$(`.quick-nav__item[data-nav="${needShow}"]`).addClass("quick-nav__item_active");
					this.toStep(needShow);
				}
			});
		});

		let acc = document.getElementsByClassName("closebtn");
		let i;
		for (i = 0; i < acc.length; i++) {
			acc[i].onclick = function(){
				let div = this.parentElement;
				div.style.opacity = "0";
				setTimeout(function(){ div.style.display = "none"; }, 600);
			};
		}
	}

	static clearActive(elems, className) {
		elems.forEach(nav => {
			nav.classList.remove(className);
		});
	}

	static toStep(stepName) {
		let current = $(".nav-active");
		if (current.id === stepName) return;
		$(current).fadeOut();
		$(current).removeClass("nav-active");
		let needShowSelector = $("#" + stepName);
		$(needShowSelector).addClass("nav-active");
		$(needShowSelector).fadeIn();
		localStorage.setItem("nav-active", stepName);
	}

	static toggleCartButton(btn, ordered = false) {
		if (ordered) {
			btn.classList.add("product-page__make-order_ordered");
			btn.querySelector(".btn").innerHTML = svgCart + "Додано до кошику";
			return;
		}
		btn.classList.remove("product-page__make-order_ordered");
		btn.querySelector(".btn").innerHTML = svgCart + "В кошик";
	}

}

Product.init();







