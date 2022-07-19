import MainController from "./main";

export default class Article extends MainController {
	static init() {
		super.init();

		window.addEventListener("load",() => {
			let chosenNav = document.querySelector(".chosen");
			$([chosenNav.parentElement]).animate({ scrollTop: ($(".chosen").offset().top - 400)}, 500);
			chosenNav.parentElement.parentElement.classList.add("open");
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
}


Article.init();


