var ListingPicker =  Vue.extend({
    template: '#listing_template'
});

var App = Vue.extend({});
var router = new VueRouter();
router.map({
    '/': {
        component: ListingPicker
    },
});

router.start(App, '#picker_app');