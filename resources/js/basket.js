import Mask from "./includes/Mask";
import { yesHTML } from "./includes/innerText";
import Modal from  "./includes/Modal";
import MainController from "./main";


export default class Basket extends MainController {
	static hasFormError = false;
	static modal = new Modal("", ".modal-wrapper");

	static nodes = {
		countPlusBtns : document.querySelectorAll(".count_plus"),
		countMinusBtns : document.querySelectorAll(".count_minus"),
		makeOrderForm : document.getElementById("make-order"),
		orderCityDropdown : document.getElementById("order_city_dropdown"),
		orderDepartmentSelect : document.getElementById("order_department"),
		navigation : document.querySelector(".navigation__active"),
		phoneInput : document.querySelector("input[name=\"phone\"]"),
	};

	static init() {
		super.init();
		let countPlusBtns = Basket.nodes.countPlusBtns;
		countPlusBtns.forEach( countPlusBtn => {
			countPlusBtn.addEventListener("click", Basket.countAction);
		});

		let countMinusBtns = Basket.nodes.countMinusBtns;
		countMinusBtns.forEach( countMinusBtn => {
			countMinusBtn.addEventListener("click", (e) => { Basket.countAction(e,true); });
		});

		let makeOrderForm = Basket.nodes.makeOrderForm;
		makeOrderForm.addEventListener("submit", (event) => {
			event.preventDefault();

			if (Basket.hasFormError){
				makeOrderForm.querySelector(".make-order__card").classList.remove("required");
				$(".required_alert").fadeOut();
				Basket.hasFormError = false;
			}

			[...makeOrderForm.elements].forEach( elem => {
				if (["INPUT", "OPTION", "TEXTAREA"].includes(elem.tagName)) {
					if (Basket.checkEmptyField(elem)) {
						makeOrderForm.querySelector(".make-order__card").classList.add("required");
						if (elem.classList.contains("select2-hidden-accessible")) {
							document.querySelector(".select2-selection");
						}
						elem.classList.add("required");
						$(".required_alert").text("Заповніть всі необхідні поля").fadeIn();
						Basket.hasFormError = true;
						return;
					}
					if (!Basket.hasFormError && elem.classList.contains("required")) {
						elem.classList.remove("required");
					}

				}
			});

			if (Basket.hasFormError) return;

			$(".make-order__loader").fadeIn();
			$(".make-order__submit").addClass("disabled");

			let formData = new FormData(makeOrderForm);
			formData.append("_token", csrfToken);

			fetch(baseURL + "/make-order", {
				method: "POST",
				body: formData
			})
				.then((response) => {
					if (!response.ok){
						response.json().then(
							() => {
								makeOrderForm.querySelector(".make-order__card").classList.add("required");
								Basket.hasFormError = true;
							}
						);
					} else {
						response.json().then(
							() => {
								window.scrollTo({ top: 0, behavior: "smooth" });
								Basket.modal
									.setTitle("Успішно")
									.setDescription(yesHTML)
									.setOnClose(() => window.location.href = baseURL + "/store")
									.init()
									.onOpen();
							}
						);
					}
				})
				.catch(error => {
					console.log(error);
				})
				.finally( () => {
					$(".make-order__loader").fadeOut();
					$(".make-order__submit").removeClass("disabled");
				});

		});

		let phoneInput = Basket.nodes.phoneInput;
		phoneInput.addEventListener("input", Mask.phoneNumber);


		$("#order_city_dropdown").select2({
			width: "100%",
			placeholder: "Виберіть місто",
			minimumInputLength: 3,
			templateResult: Basket.formatResults,
			ajax: {
				url: baseURL + "/get-cities",
				dataType: "json",
				method: "POST",
				data: function (params) {
					// Query parameters will be ?search=[term]&type=public
					return {
						search: params.term,
						"_token": csrfToken
					};
				},
				processResults: function (data) {
					let res = data.data.map(item => ({
						id: item.Ref,
						text: item.Description + ", " + item.AreaDescription,
					}));
					return {
						results: res,
					};
				}
			}
		});

		$(Basket.nodes.orderDepartmentSelect).select2({
			width: "100%",
			placeholder: "Номер відділення",
			disabled: true
		});

		$(Basket.nodes.orderCityDropdown).on("select2:select", function (e) {
			let cityRef = e.target.value;
			let formData = new FormData();
			formData.append("_token", csrfToken);
			formData.append("cityRef", cityRef);
			$("input[name=\"city\"]").val($("#order_city_dropdown option:selected").text());
			fetch( baseURL + "/get-warehouses", {
				method: "POST",
				body: formData
			})
				.then((response) => {
					if (!response.ok && response.status === 422){
						console.log("error", response);
					} else {
						response.json().then(
							( result ) => {
								let data = result.data.map(depart => {
									return {
										id: depart.Description,
										text: depart.Description
									};
								});
								$(Basket.nodes.orderDepartmentSelect).html("").select2({
									width: "100%",
									placeholder: "Номер відділення",
									disabled: false,
									data: data
								});
							}
						);
					}
				})
				.catch(error => {
					console.log(error);
				});
		});
	}

	static countAction(event, decrement = false) {
		if (!event.target.classList.contains("order__action-image")) {
			return;
		}

		let index = event.target.parentElement.dataset.item;
		let elem = $(`.order[data-item="${index}"]`);
		let formData = new FormData();
		formData.append("_token", csrfToken);
		formData.append("index", index);
		formData.append("decrement", String(decrement));

		event.target.classList.add("disabled");

		fetch( baseURL + "/basket/count", {
			method: "POST",
			body: formData
		})
			.then((response) => {
				if (!response.ok && response.status === 422){
					response.json().then(
						() => {
							$(".basket__action-error").text("Виникла помилка, спробуйте ще раз!").fadeIn();
						}
					);
				} else {
					response.json().then(
						( result ) => {
							console.log(result);
							$(elem).find(".order__count").text(result.data.count);
							$("#total_price").text(result.data.total_price + " UAH");
							$(elem).find(".order__price").text(result.data.price + " UAH");
						}
					);
				}
			})
			.catch(error => {
				console.log(error);
				$(".basket__action-error").text("Виникла помилка, спробуйте ще раз!");
			})
			.finally( () => {
				event.target.classList.remove("disabled");
			});

	}

	static checkEmptyField($node) {
		return $node.value.length <= 1;
	}

	static formatResults(res) {
		if (!res.text) {
			return "Пошук...";
		}
		return res.text;
	}

}

Basket.init();
















