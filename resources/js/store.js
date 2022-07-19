import Hider from "./includes/Hider";
import MainController from "./main";

export default class Store extends MainController {
	static nodes = {
		navigation: document.querySelector(".navigation__mobile"),
		sort: document.querySelector(".sort"),
		confirmSortForm: document.getElementById("confirm_sort")
	};

	static init() {
		super.init();

		new Swiper(".new-swiper", {
			...MainController.sliderOptions,navigation: {
				nextEl: "#swiper-button-next-1",
				prevEl: "#swiper-button-prev-1",
			}
		});
		new Swiper(".popular-swiper", {
			...MainController.sliderOptions, navigation: {
				nextEl: "#swiper-button-next-2",
				prevEl: "#swiper-button-prev-2",
			}
		});

		let sort = Store.nodes.sort;
		sort && sort.addEventListener("click",(event) => {
			let sortBody = sort.querySelector(".sort__body");

			if (event.target.classList.contains("sort__item")) {
				let order = event.target.dataset.order;
				let chosenOrderNode = document.getElementById("chosen-order");
				chosenOrderNode.value = order;
				Store.nodes.confirmSortForm.submit();
				return;
			}

			let hider = new Hider(".sort", () => {
				$(".sort__body").removeClass("active");
			});

			if (sortBody.classList.contains("active")) {
				sortBody.classList.remove("active");
				document.removeEventListener("click",hider.hide);
			} else {
				sortBody.classList.add("active");
				document.addEventListener("click",hider.hide);
			}

		});

		let navigation = Store.nodes.navigation;
		navigation && navigation.addEventListener("click",() => {
			let navBody = document.querySelector(".navigation__body");

			let hider = new Hider(".navigation__active",() => {
				$(".navigation__body").removeClass("active");
			});

			if (navBody.classList.contains("active")) {
				navBody.classList.remove("active");
				document.removeEventListener("mouseup",hider.hide);
			} else {
				navBody.classList.add("active");
				document.addEventListener("mouseup",hider.hide);
			}
		});
	}

}

Store.init();
