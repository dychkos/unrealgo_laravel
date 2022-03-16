let editPhotoNode = document.querySelector('#edit-photo');
let photoPreview = document.querySelector('#photo-preview');
let removeUserBtn = document.querySelector('#open-modal');

editPhotoNode.addEventListener('change', readURL);

let modal = new Modal(removeUserBtn, ".modal-wrapper" , true);
modal
    .setTitle("Вы уверены ?")
    .setDescription('<p class="p" style="text-align: center"> Ваш аккаунт будет полностью удалён из системы </p>')
    .setActionYES(deleteAccount)
    .init();

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

console.log('urlDelete',urlDelete);

function deleteAccount() {
    fetch(urlDelete,{
        method: "delete"
    })
}


