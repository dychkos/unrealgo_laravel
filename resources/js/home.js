import MainController from "./main";

export default class Home extends MainController {
	static init() {
		super.init();

		new Swiper(".swiper", {
			...MainController.sliderOptions,
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			}
		});

		new Swiper(".swiper-banner", {
			slidesPerView: 1,
			direction: "horizontal",
			pagination: {
				el: ".swiper-pagination",
			},
			autoplay: {
				delay: 5000,
			},
		});
	}
}

Home.init();
