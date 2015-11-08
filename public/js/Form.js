// Define some components
var slider;
var fromPicker;
var toPicker;

var Form = Vue.extend({
    template: '#form_template',
    data: function() {
        return {
            form_step: 1,
            rooms: 1,
            max_price: null,
            check_in_date: null,
            check_out_date: null
        }
    },
    methods: {
        onLessPeople: function(e) {
            e.preventDefault();
            if(this.rooms < 2) {
                return;
            }
            else {
                this.rooms--;
            }
        },
        onMorePeople: function(e) {
            e.preventDefault();
            this.rooms++;
        },
        onStep1Next: function(e) {
            e.preventDefault();
            slider.goToNextSlide();
        },
        onStep2Next: function(e) {
            var self = this;
            e.preventDefault();
            if(!self.check_in_date || !self.check_out_date) {
                alert("Yo pick some dates son!");
                return;
            }
            slider.goToNextSlide();
        },
        onFormDone: function(e) {
            var self = this;
            e.preventDefault();
            if(self.max_price < 1) {
                alert("Hey, you'll need at least 1 dollar!")
                return;
            }

            var targetUrl = window.location.origin+"/search?"+ $.param(self.getFormParams());
            window.location = targetUrl;
        },
        getFormParams: function() {
            var self = this;
            var params = {
                'check-in': self.check_in_date,
                'check-out': self.check_out_date,
                'rooms': self.rooms,
                'max-price': self.max_price
            }
            return params;
        }
    },
    ready: function() {
        var self = this;
        slider = $('.step_1_content').bxSlider({
            maxSlides: 1,
            slideMargin: 10,
            pager: false,
            mode: 'vertical',
            controls: false,
        });

        var $fromInput = $('.from-picker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            container: 'body .main.content',
            onSet: function(context){
                self.check_in_date = this.get('select', 'yyyymmdd');
            }
        });

        var $toInput = $('.to-picker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            container: '.main.content',
            onSet: function(context){
                self.check_out_date  = this.get('select', 'yyyymmdd');
            }
        });

        fromPicker = $fromInput.pickadate('picker');
        toPicker = $toInput.pickadate('picker');

    }

});