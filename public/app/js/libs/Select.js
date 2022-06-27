class Select {
    /*
    @param node - HTML dropdown element
    @param items - {id:number,value:string}
    @param inputEvent - function
    @param placeholder - string
    @param selected - number (id chosen element)
    * */
    constructor(node, items, placeholder = "Почніть вводити...", inputEvent, selected) {
        this.node = node;
        this.items = items;
        this.placeholder = placeholder;
        this.inputEvent = inputEvent;

        this.dropdown = document.querySelector(this.node);
        this.dropdownInput = this.dropdown.querySelector(".dropdown__input");
        this.dropdownBody = this.dropdown.querySelector(".dropdown__body");

        this._selected = this.items.filter(item => item.id===this.selected)[0] ?? {};
    }

    init(){
        this.dropdownInput.placeholder = this.placeholder;
        this.dropdownInput.addEventListener("input", this.onInput);

        this.render();
    }

    render(items = this.items){
        let html = items.map(item=>{
            return `<div class="dropdown__option" data-id="${item.id}" data-value="${item.value}">${item.value}</div>`
        })
        this.dropdownBody.innerHTML = html.join("");
        if(!this.isSelectedEmpty()){
            this.dropdownInput.value = this._selected.value;
        }
        this.initEvent();
    }

    get selected() {
        return this._selected;
    }

    set selected(value) {
        this._selected = value;
    }

    onInput = (event) => {

        let str = event.target.value.toLowerCase();
        this.dropdownBody.classList.add("open");
        this.selected = {};

        if (str.length > 0) {
            this.inputEvent();
            // let filtered = this.items.filter((item) => {
            //     item = item.value.toLowerCase();
            //     if(item.includes(str)){
            //         return item;
            //     }
            // });
            // this.render(filtered);
        }else {
            this.dropdownBody.classList.remove("open");
        }
    }

    onSelect = (event) => {
        this.selected = {
            id: event.target.dataset.id,
            value: event.target.dataset.value,
        };
        this.dropdownBody.classList.remove("open");
        console.log(this.selected)
        this.render();
    }

    initEvent = () =>{
        let options = this.dropdownBody.querySelectorAll(".dropdown__option");
        options.forEach(option=>{
            option.addEventListener("click",this.onSelect);
        })
    }

    isSelectedEmpty() {
        return Object.keys(this._selected).length === 0;
    }
}
