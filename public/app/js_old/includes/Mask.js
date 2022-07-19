export default class Mask {
    static phoneNumber(phoneString) {
        let x = phoneString.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        phoneString = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        return phoneString;
    }

}
