let editPhotoNode = document.querySelector('#edit-photo');
let photoPreview = document.querySelector('#photo-preview');

editPhotoNode.addEventListener('change', readURL);

function readURL(input){
    let fileInput = input.target;
    let ext = fileInputs.files[0]['name'].substring(fileInputs.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
    debugger

    if (fileInputs.files && fileInputs.files[0] && (ext === "gif" || ext === "png" || ext === "jpeg" || ext === "jpg")){
        let reader = new FileReader(fileInputs.files[0] );
        reader.onload = function (e) {
            console.log(e.target.result)
            $(photoPreview).attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInputs.files[0]);
    }else{
        $(photoPreview).attr('src', '/app/img/profile.jpg');
    }
}
