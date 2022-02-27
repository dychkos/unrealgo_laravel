/*
* Provide ability to do ACTION when click outside ELEMENT
* */
class Hider {
    constructor(element,action) {
        this.element = element;
        this.action = action;
    }

    hide=(event)=>{
        let div = $(this.element);
        if (!div.is(event.target) // если клик был не по нашему блоку
            && div.has(event.target).length === 0) { // и не по его дочерним элементам
            this.action();
        }
    }
}

