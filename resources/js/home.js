import MainController from "./main";

export default class Home extends MainController{
	static init() {
		super.init();

		new Swiper(".swiper", {
			...MainController.sliderOptions,
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			}
		});
	}
}

Home.init();
