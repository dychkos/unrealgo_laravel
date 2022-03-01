let editPhotoNode = document.querySelector('#edit-photo');
let photoPreview = document.querySelector('#photo-preview');

editPhotoNode.addEventListener('change', readURL);

function readURL(input){
    let fileInput = input.target;
    let ext = fileInput.files[0]['name'].substring(fileInput.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();

    if (fileInput.files && fileInput.files[0] && (ext === "gif" || ext === "png" || ext === "jpeg" || ext === "jpg")){
        let reader = new FileReader(fileInput.files[0] );
        reader.onload = function (e) {
            console.log(e.target.result)
            $(photoPreview).attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }else{
        $(photoPreview).attr('src', '/app/img/profile.jpg');
    }
}
