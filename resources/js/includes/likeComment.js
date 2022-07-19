export default class LikeComment {
	constructor() {
		this.addAnswerButtons = document.querySelectorAll(".to-add-comment");
		this.needFocusNode = document.querySelector(".add-comment__body textarea");
		this.formAnswerInput = document.querySelector("#answer_for");
		this.likesBtns = document.querySelectorAll(".likeable");

		this.init();
	}

	init() {
		if (this.addAnswerButtons && this.likesBtns) {
			this.likesBtns.forEach((likeBtn) => {
				likeBtn.addEventListener("click", () => {
					const modelID = likeBtn.nextElementSibling.dataset.comment;
					const formData = new FormData();

					formData.append("_token", csrfToken);
					formData.append("model", modelID);

					fetch(baseURL + "/user/comment/like", {
						method: "POST",
						body: formData,
					}).then((response)=>{
						if (response.redirected) {
							window.location.href = baseURL + "/login";
						}
						if (!response.ok && response.status === 404) {
							console.log("Like error");
						} else {
							response.json().then(
								(result) => {
									likeBtn.textContent = result.data.likes + " Подобається";
								},
							);
						}
					}).catch((error) => console.log(error));
				});
			});

			this.addAnswerButtons.forEach((button) => {
				button.addEventListener("click", () => {
					const answerID = button.dataset.comment;
					const answerFor = button.dataset.answerfor;
					if (answerID) {
						this.formAnswerInput.value = answerID;
						this.needFocusNode.value = "@" + answerFor + " ";
					}
					this.needFocusNode.focus();
				});
			});
		}
	}
}


