export default class Admin {
	/*
    * Nodes
    * */
	static nodes = {
		openMenuBtn : document.querySelector(".admin-burger"),
		menuNav : document.querySelector(".admin-navbar"),
		navItems : document.querySelectorAll(".admin-navbar__title"),
		mainGrid : document.querySelector(".admin-body"),
		fileInput : document.getElementById("file_input"),
		productSizeSelect : document.getElementById("sizes"),
		orderStatusSelect : document.getElementById("status"),
		invoiceInput : document.getElementById("invoice_code"),
	};

	static ORDER_STATUSES = {
		WAITING: 1,
		SENT: 2,
		DELIVERED: 3,
		DONE: 4,
		CANCELED: 5
	};

	/*
    * Init  listeners
    * */
	static init() {

		let openMenuBtn = Admin.nodes.openMenuBtn;
		openMenuBtn.addEventListener("click", () => {
			openMenuBtn.classList.toggle("open");
			Admin.nodes.menuNav.classList.toggle("open");
			Admin.nodes.mainGrid.classList.toggle("active");
			$(Admin.nodes.navItems).fadeToggle("open");
		});

		let fileInput = Admin.nodes.fileInput;
		if (fileInput) {
			fileInput.addEventListener("change",function (e) {
				let files = this.files;
				let fileNames = "";

				for (const file of files) {
					fileNames += `<span>${file.name}</span>`;
				}

				let fileLabel = document.querySelector(".file-input__files");
				if (files.length >= 2) {
					fileLabel.innerHTML  = fileNames;
				} else {
					fileLabel.textContent = e.target.value.split("\\").pop();
				}
			});
		}

		let productSizeSelect = Admin.nodes.productSizeSelect;
		if (productSizeSelect) {
			$(productSizeSelect).select2({
				placeholder: "Розміри продукту",
			});

			$(productSizeSelect).on("change", function (e) {
				let sizesArray = [];
				$("#sizes option:selected").each(function () {
					let $this = $(this);
					if ($this.length) {
						const index = sizesArray.findIndex(object => object.id === $this.val());
						if (index === -1) {
							let selText = $this.text();
							let initial = Admin.initSizesArray();
							let idx = initial.findIndex(object => object.id === $this.val());
							sizesArray.push({
								id: $this.val(),
								value:  idx !== -1 ? initial[idx].value : 0,
								name: selText,
								initial: idx !== -1
							});
						}
					}
				});

				if (sizesArray) {
					Admin.renderDynamicInputs(sizesArray, "#sizes_array");
				}

			});
		}

		let orderStatusSelect = Admin.nodes.orderStatusSelect;
		if (orderStatusSelect) {
			$(orderStatusSelect).select2({
				placeholder: "Виберіть із списку",
			});
			$(orderStatusSelect).on("select2:select", function (e) {
				let data = e.params.data;
				if (+data.id === Admin.ORDER_STATUSES.SENT) {
					Admin.nodes.invoiceInput.disabled = false;
					return;
				}
				Admin.nodes.invoiceInput.disabled = true;
			});

		}
	}


	static renderDynamicInputs(source, rootEl) {
		let html = source.map(item => {
			return `<div class="${item.initial && "ready-size"}">
                    <label for="count-size-${item.id}">Кількість товарів розміру ${item.name}: </label>
                    <input type="number" id="count-size-${item.id}"
                           placeholder="5"
                           value="${item.value ?? 0}"
                           name="count-size-${item.id}"
                           data-id="${item.id}"
                           data-name="${item.name}"
                           >
        </div>`;
		}).join(" ");

		document.querySelector(rootEl).innerHTML = html;

	}

	static initSizesArray() {
		let sizeArray = [];
		let sizeBlock = document.getElementById("sizes_array");
		let readySizes = sizeBlock.querySelectorAll(".ready-size");

		readySizes.forEach(size => {
			let tempInput = size.querySelector("input");
			sizeArray.push({
				id: tempInput.dataset.id,
				name: tempInput.dataset.name,
				value: tempInput.value ?? 0,
				initial: true
			});
		});

		return sizeArray;
	}

}

Admin.init();










