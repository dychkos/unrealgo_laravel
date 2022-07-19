/*
* Nodes
* */

let checkActive = document.querySelector("#navigation");
let navigationActive = document.querySelector(".navigation__mobile a");
let navItems = document.querySelectorAll(".navigation__item");
let mainNav = document.getElementById("main_nav");

if (isMobile) {
	$(mainNav).show();
	if (checkActive.dataset.navigation) {
		navigationActive.innerHTML = checkActive.dataset.navigation;
	}
}
