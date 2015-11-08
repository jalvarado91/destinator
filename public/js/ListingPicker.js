var ListingPicker = Vue.extend({
    template: '#listing_template',
    data: function () {
        return {
            hotel: null,
            loading: false,
            prev_params: null,
        }
    },
    methods: {
        onNoClick: function(e) {
            var self = this;
            e.preventDefault();
            self.loading = true;
            var $picker = $(".hotelPicker");
            $picker.addClass('rotate-right').delay(700).fadeOut(1);
            var url = window.location.origin + '/searchjs';
            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: self.prev_params
            }).done(function(data) {
                console.log(data);
                self.hotel = data.hotel;
                self.loading = false;
                $picker.show();
                $picker.removeClass('rotate-right');
            });
        }
    },
    computed: {
        main_image: function () {
            return this.hotel.images[0].imageUrl;
        },
        city_name: function () {
            if(this.hotel.location.address.provinceCode) {
                return this.hotel.location.address.cityName + ', ' + this.hotel.location.address.provinceCode;
            }
            else {
                return this.hotel.location.address.cityName;
            }
        },
        hotel_name: function () {
            return this.hotel.name;
        },
        room_price: function () {
            return '$' + this.hotel.rooms[0].displayableRates[0].displayPrice;
        },
        rating_string: function () {
            if(!this.hotel.starRating) {
                return 'Rating N/A';
            }
            return this.hotel.starRating + " /5";
        }
    },
    ready: function () {
        var self = this;
        self.hotel = hotel.hotel;
        self.prev_params = form_params;

        $("#picker_app").on("swiperight",function(){
            $(this).addClass('rotate-left').delay(700).fadeOut(1);
            $('.hotelPicker').find('.status').remove();
            console.log('liked');
            //$(this).append('<div class="status like">Like!</div>');
            //if ( $(this).is(':last-child') ) {
            //    $('.hotelPicker:nth-child(1)').removeClass ('rotate-left rotate-right').fadeIn(300);
            //} else {
            //    $(this).next().removeClass('rotate-left rotate-right').fadeIn(400);
            //}
        });

            $(".hotelPicker").on("swipeleft",function(){
                $(this).addClass('rotate-right').delay(700).fadeOut(1);
                $('.hotelPicker').find('.status').remove();
                $(this).append('<div class="status dislike">Dislike!</div>');

                //if ( $(this).is(':last-child') ) {
                //    $('.hotelPicker:nth-child(1)').removeClass ('rotate-left rotate-right').fadeIn(300);
                //} else {
                //    $(this).next().removeClass('rotate-left rotate-right').fadeIn(400);
                //}
            });

    }

});

var App = Vue.extend({});
var router = new VueRouter();
router.map({
    '/': {
        component: ListingPicker
    },
});

router.start(App, '#picker_app');