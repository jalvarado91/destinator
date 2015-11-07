// Define some components
var Form = Vue.extend({

    template: '#form_template',

    data: {
        form_step: 1,
        rooms: null,
        max_price: null,
        check_in_date: null,
        check_out_date: null,
    }

});