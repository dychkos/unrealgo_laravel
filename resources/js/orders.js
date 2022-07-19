import MainController from "./main";

export default class Orders extends MainController {
	static nodes = {
		quickNav: document.querySelector(".quick-nav"),
		helpLink: document.querySelector(".help-link")
	};

	static init() {
		super.init();

		let navItems = Orders.nodes.quickNav.querySelectorAll(".quick-nav__item");
		navItems.forEach(nav => {
			nav.addEventListener("click", () => {
				let needShow = nav.dataset.nav;
				if(needShow) {
					this.clearActive(navItems, "quick-nav__item_active");
					$(nav).addClass("quick-nav__item_active");
					this.toStep(needShow);
				}
			});
		});

		Orders.nodes.helpLink.addEventListener("click", () => {
			window.location.href = "mailto:unrgo@unreal-go.top?subject=Необхідна допомога";
		});
	}

	static clearActive(elems, className) {
		elems.forEach(nav => {
			nav.classList.remove(className);
		});
	}

	static toStep(stepName) {
		let current = $(".nav-active");
		if(current.id === stepName) return;
		$(current).fadeOut();
		$(current).removeClass("nav-active");
		let needShowSelector = $("#" + stepName);
		$(needShowSelector).addClass("nav-active");
		$(needShowSelector).fadeIn();
		localStorage.setItem("nav-active", stepName);
	}

}

Orders.init();
