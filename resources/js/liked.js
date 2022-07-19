import MainController from "./main";

export default class Liked extends MainController {
	static init() {
		super.init();

		new Swiper(".recommended-swiper", {
			...MainController.sliderOptions, navigation: {
				nextEl: "#swiper-button-next-1",
				prevEl: "#swiper-button-prev-1",
			}
		});
	}
}

Liked.init();
