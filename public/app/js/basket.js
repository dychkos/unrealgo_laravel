/*
* Declaration
* */
let departaments = [];

/*
* Nodes
* */
let countPlusBtns = document.querySelectorAll('.count_plus');
let countMinusBtns = document.querySelectorAll('.count_minus');
let makeOrderForm = document.getElementById('make-order');
let orderCityDropdown = document.getElementById('order_city_dropdown');
let orderDepartmentSelect = document.getElementById('order_department');
let navigation = document.querySelector('.navigation__active');
let cities = [
    {id:1,value:"Снигиревка"},
    {id:2,value:"Николаев"},
    {id:3,value:"Сингапур"},
    {id:4,value:"Село"},
    {id:5,value:"Прикол 2 "},
    {id:6,value:"Прикол 2 "},
    {id:7,value:"Лофик 3"},
    {id:8,value:"Гавана"}
];


let departments = [
    {id:1,value:"Отделение 1"},
    {id:2,value:"Отделение 2"},
    {id:3,value:"Отделение 3"},
    {id:4,value:"Отделение 4"},
    {id:5,value:"Отделение 5"},
];

let yesHTML = `<div style="display: flex; flex-direction: column; align-items: center"><?xml version="1.0" encoding="iso-8859-1"?>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="80px" height="80px" x="0px" y="0px"
                \t viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                <circle style="fill:#25AE88;" cx="25" cy="25" r="25"/>
                <polyline style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" points="
                \t38,15 22,33 12,25 "/>
                </svg>
                <p class="p" style="text-align: center"> Замовлення сформоване. Очікуйте повідомлення на пошту. <br>
                </p>
                </div>`;

let hasFormError = false;
let modal = new Modal("", ".modal-wrapper");

makeOrderForm.addEventListener("submit", (event) => {
    event.preventDefault();

    if(hasFormError){
        makeOrderForm.querySelector(".make-order__card").classList.remove("required");
        $(".required_alert").fadeOut();
        hasFormError = false;
    }

    [...makeOrderForm.elements].forEach( elem => {
        if(["INPUT", "OPTION", "TEXTAREA"].includes(elem.tagName)) {
            if (checkEmptyField(elem)) {
                makeOrderForm.querySelector(".make-order__card").classList.add("required");
                elem.classList.add("required");
                $(".required_alert").text("Вкажіть всю інформацію").fadeIn();
                hasFormError = true;
                return;
            }
            if(!hasFormError && elem.classList.contains("required")) {
                elem.classList.remove("required")
            }

        }
    })

    if(hasFormError){
        return;
    }

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
                    result => {
                        makeOrderForm.querySelector(".make-order__card").classList.add("required");
                        $(".required_alert").text("Виникла помилка").fadeIn();
                        hasFormError = true;
                    }
                )
            } else {
                response.json().then(
                    () => {
                        modal
                            .setTitle("Успішно")
                            .setDescription(yesHTML)
                            .setOnClose(() => window.location.href = baseURL + "/store")
                            //.setActionYES(() => {  window.location.href = baseURL + "/basket";},"Переглянути")
                            //.setActionNO(() => {}, "Продовжити покупки")
                            .init()
                            .onOpen();
                    }
                )
            }
        })
        .catch(error => {
            console.log(error);
        })
        .finally( () => {
            $(".make-order__loader").fadeOut();
            $(".make-order__submit").removeClass("disabled");
        })

});




// let sel2 = new Select("#order_department_dropdown", departments);
// sel2.init();

$('#order_city_dropdown').select2({
    width: "100%",
    placeholder: "Виберіть місто",
    minimumInputLength: 3,
    templateResult: formatResults,
    ajax: {
        url: baseURL + "/get-cities",
        dataType: 'json',
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
            }))
            return {
                results: res,
            };
        }
    }
});

$(orderDepartmentSelect).select2({
    width: "100%",
    placeholder: "Номер відділення",
    disabled: true
});


$(orderCityDropdown).on('select2:select', function (e) {
    let cityRef = e.target.value;
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('cityRef', cityRef);
    $('input[name="city"]').val($("#order_city_dropdown option:selected").text());
    fetch( baseURL + "/get-warehouses", {
        method: "POST",
        body: formData
    })
        .then((response) => {
            if (!response.ok && response.status === 422){
                console.log('error', response)
            } else {
                response.json().then(
                    ( result ) => {
                        let data = result.data.map(depart => {
                            return {
                                id: depart.Description,
                                text: depart.Description
                            };
                        });
                        console.log(data);
                        $(orderDepartmentSelect).html('').select2({
                            width: "100%",
                            placeholder: "Номер відділення",
                            disabled: false,
                            data: data
                        });
                    }
                )
            }
        })
        .catch(error => {
            console.log(error);
        })
});

$(orderCityDropdown).on('select2:unselect', function (e) {
    console.log(e.target);
});

countPlusBtns.forEach( countPlusBtn => {
    countPlusBtn.addEventListener("click", countAction);
});

countMinusBtns.forEach( countMinusBtn => {
    countMinusBtn.addEventListener("click", (e) => { countAction(e,true) });
});

function formatResults(res) {
    if (!res.text) {
        return "Пошук..."
    }
    return res.text;
}

function countAction(event, decrement = false) {

    if(!event.target.classList.contains("order__action-image")) {
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
                        $('.basket__action-error').text("Виникла помилка, спробуйте ще раз!").fadeIn();
                    }
                )
            } else {
                response.json().then(
                    ( result ) => {
                        console.log(result);
                       $(elem).find(".order__count").text(result.data.count);
                       $("#total_price").text(result.data.total_price + " UAH");
                       $(elem).find(".order__price").text(result.data.price + " UAH");
                    }
                )
            }
        })
        .catch(error => {
            console.log(error);
            $('.basket__action-error').text("Виникла помилка, спробуйте ще раз!")
        })
        .finally( () => {
            event.target.classList.remove("disabled");
        })

}

function checkEmptyField($node) {
    return $node.value.length <= 1;
}

