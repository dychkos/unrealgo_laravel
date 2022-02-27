/*
* Declaration
* */
// In your Javascript (external .js resource or <script> tag)

/*
* Nodes
* */

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

