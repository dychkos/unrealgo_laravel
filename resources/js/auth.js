import MainController from "./main";

export default class Auth extends MainController {
	static nodes = {
		privacyBtn : document.querySelector("#privacy")
	};

	static init () {
		super.init();
		// let modal = new Modal(Auth.nodes.privacyBtn, ".modal-wrapper");
		// modal.setTitle("ПОЛІТИКА КОНФІДЕНЦІЙНОСТІ")
		// 	.setDescription(privacyHtml)
		// 	.init();
	}
}

Auth.init();





