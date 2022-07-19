export default class Helper {

	static generateSearchLink (elem) {
		return `<p class="search__link h5"><a href="${elem.link}">${elem.title}</a></p>`;
	}

	static readImageURL(input, $node) {
		let fileInput = input.target;
		let ext = fileInput.files[0]["name"]
			.substring(fileInput.files[0]["name"]
				.lastIndexOf(".") + 1).toLowerCase();

		if (fileInput.files && fileInput.files[0] && (ext === "gif" || ext === "png" || ext === "jpeg" || ext === "jpg")) {
			let reader = new FileReader(fileInput.files[0] );
			reader.onload = function (e) {
				$($node).attr("src", e.target.result);
			};
			reader.readAsDataURL(fileInput.files[0]);
		} else {
			$($node).attr("src", "/app/img/profile.jpg");
		}
	}

}
