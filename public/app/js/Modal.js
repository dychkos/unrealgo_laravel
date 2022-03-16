class Modal {
    constructor(trigger, nodeEl, needFooter) {
        this.modalWrapper = nodeEl;
        this.needFooter = needFooter;
        this.trigger = trigger;

        this.textYES = "Окей";
        this.textNO = "Отменить";

    }

    setTitle(title) {
        this.title = title;

        return this;
    }

    setDescription(description) {
        this.description = description;

        return this;
    }

    setActionYES(action, text = "Окей") {
        this.actionYES = action;
        this.textYES = text;

        return this;
    }

    setActionNO(action, text = "Отменить") {
        this.actionNO = action;
        this.textNO = text;

        return this;
    }

    init() {
        if(!this.needFooter)
        {
            $('.modal__footer').addClass('d-none');
        }

        $(this.trigger).on('click', () => {
            this.onOpen();
        })

        $('.modal__close').on('click', () => {
            this.onClose();
        });

        let btn1 = $('.modal__action-first');
        let btn2 = $('.modal__action-second');


        $('.modal__body').html(this.description);
        $(btn1).text(this.textNO);
        $(btn2).text(this.textYES);
        $('.modal__header').text(this.title);

        $(btn1).on('click', () => {
            this.actionNO && this.actionNO();
            this.onClose();

        })

        $(btn2).on('click', () => {
            this.actionYES && this.actionYES();
            this.onClose();

        })

    }

    onClose() {
        $('html, body').css({ overflow: 'auto', height: 'initial' });
        $(this.modalWrapper).fadeOut();

    }

    onOpen() {
        $('html, body').css({ overflow: 'hidden', height: '100%' });
        $(this.modalWrapper).fadeIn();

    }
}
