/*
* Declaration
* */
// In your Javascript (external .js resource or <script> tag)

/*
* Nodes
* */
let countPlusBtns = document.querySelectorAll(".count_plus");
let countMinusBtns = document.querySelectorAll(".count_minus");


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




let sel1 = new Select("#order_city_dropdown",cities);
let sel2 = new Select("#order_department_dropdown",departments);
sel1.init();
sel2.init();

countPlusBtns.forEach( countPlusBtn => {
    countPlusBtn.addEventListener("click", countAction);
});

countMinusBtns.forEach( countMinusBtn => {
    countMinusBtn.addEventListener("click", (e) => { countAction(e,true) });
});

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


