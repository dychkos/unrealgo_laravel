import Modal from "./includes/Modal";
import Helper from "./includes/Helper";
import MainController from "./main";
import Mask from "./includes/Mask";

export default class UserProfile extends MainController {
	static nodes = {
		editPhotoNode: document.querySelector("#edit-photo"),
		photoPreview: document.querySelector("#photo-preview"),
		removeUserBtn: document.querySelector("#open-modal"),
		phoneInput : document.querySelector("input[name=\"phone\"]"),
	};

	static init() {
		super.init();

		let editPhotoNode = UserProfile.nodes.editPhotoNode;
		let photoPreview = UserProfile.nodes.photoPreview;
		let removeUserBtn = UserProfile.nodes.removeUserBtn;
		editPhotoNode.addEventListener("change", (e) => Helper.readImageURL(e, photoPreview));

		let modal = new Modal(removeUserBtn, ".modal-wrapper" , true);
		modal
			.setTitle("Ви увпевнені?")
			.setDescription("<p class=\"p\" style=\"text-align: center\"> Ваш аккаунт буде повністю видалений із системи. </p>")
			.setActionYES(this.deleteAccount)
			.init();

		let phoneInput = UserProfile.nodes.phoneInput;
		phoneInput.addEventListener("input", Mask.phoneNumber);
	}

	static deleteAccount() {
		fetch(urlDelete,{
			method: "GET"
		}).then((response) => {
			if (!response.ok && response.status === 422){
				Toastify({
					text: "Помилка, при видалені",
					backgroundColor: "#04AA6D",
					duration: 3000,
					close: true,
					gravity: "top",
					position: "left",
				}).showToast();
			} else {
				response.json().then(
					(result) => {
						if (result.success)  window.location.href = baseURL;
					}
				);
			}
		})
			.catch(error => {
				console.log(error);
				Toastify({
					text: "Помилка, при видалені",
					backgroundColor: "#04AA6D",
					duration: 3000,
					close: true,
					gravity: "top",
					position: "left",
				}).showToast();
			});
	}
}

UserProfile.init();



