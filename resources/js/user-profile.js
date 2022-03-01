let editPhotoNode = document.querySelector('#edit-photo');
let photoPreview = document.querySelector('#photo-preview');

editPhotoNode.addEventListener('change', readURL);

function readURL(input){
    let ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();

    if (input.files && input.files[0] && (ext === "gif" || ext === "png" || ext === "jpeg" || ext === "jpg")){
        let reader = new FileReader(input.files[0] );
        reader.onload = function (e) {
            console.log(e.target.result)
            $(photoPreview).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }else{
        $(photoPreview).attr('src', '/app/img/profile.jpg');
    }
}
