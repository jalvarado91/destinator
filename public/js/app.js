var App = Vue.extend({});

var router = new VueRouter();

router.map({
    '/': {
        component: Form
    },
    '/explore': {
        component: ListingPicker
    }
});

router.start(App, '#app');