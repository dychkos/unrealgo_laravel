export default class PhotoPreview {
	constructor($currentPhoto,$photoArray) {
		this.$currentPhoto = $currentPhoto;
		this.$photoArray = $photoArray;
		this.init();
	}

	init(){
		this.changePreviewPhoto = this.changePreviewPhoto.bind(this);
		this.deactivatePreviews = this.deactivatePreviews.bind(this);

		this.$currentPhoto.setAttribute("src",this.$photoArray[0].getAttribute("src"));
		this.$photoArray[0].classList.add("photos__previews_chosen");
		this.$photoArray.forEach(preview=>{
			preview.addEventListener("click",this.changePreviewPhoto);
		});
	}

	deactivatePreviews () {
		this.$photoArray.forEach(photoPreview=>{
			if(photoPreview.classList.contains("photos__previews_chosen")){
				photoPreview.classList.remove("photos__previews_chosen");
			}
		});
	}

	changePreviewPhoto (event) {
		this.deactivatePreviews();
		this.$currentPhoto.setAttribute("src",event.target.getAttribute("src"));
		event.target.classList.add("active");
	}

}
