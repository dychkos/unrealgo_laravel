/*
* Provide ability to do ACTION when click outside ELEMENT
* */
class Hider {
    constructor(element, action, allowInsideClick = false) {
        this.element = element;
        this.action = action;
        this.allowInsideClick = allowInsideClick;
    }

    hide = (event) => {
        let div = $(this.element);

        if(this.allowInsideClick){
            this.action();
            return;
        }

        if (!div.is(event.target) // если клик был не по нашему блоку
            && div.has(event.target).length === 0) { // и не по его дочерним элементам
            this.action();
        }
    }
}

