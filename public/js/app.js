var App = Vue.extend({});

var router = new VueRouter();

router.map({
    '/': {
        component: Form
    },
});

router.start(App, '#app');