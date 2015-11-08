@extends('master')

@section('head_actions')
    <script id="listing_template" type="x-template">
        <div class="hotelPicker">
            <div class="hotel card">
                <div class="image-wrap">
                    <div class="image">
                        <img src="@{{ main_image }}" alt="">
                    </div>
                </div>
                <div class="info">
                    <div class="meta_top">
                        <div class="name">@{{ hotel_name }}</div>
                        <div class="area">@{{ city_name }}</div>
                    </div>
                    <div class="meta_bottom">
                        <div class="price">@{{ room_price }}</div>
                        <div class="rating">@{{ rating_string }} <span><small>stars</small></span></div>
                    </div>
                </div>
            </div>
            <div class="choices">
                <a href="#" @click="onNoClick" class="no-button">Maybe Later</a>
                <a href="#" @click="onYesClick" class="yes-button">Let's Go!</a>
            </div>
        </div>
    </script>
@endsection

@section('footer_scripts')
    <script>
        var hotel = <?php echo json_encode($hotel) ?>;
        var form_params = <?php echo json_encode($prev_params) ?>;
    </script>
    <script src="http://cdn.jsdelivr.net/vue/1.0.7/vue.min.js"></script>
    <script src="/js/accounting.min.js"></script>
    <script src="/js/vue.router.js"></script>
    <script src="/js/jquery.bxslider/jquery.bxslider.min.js"></script>
    <script src="/js/ListingPicker.js"></script>
@endsection


@section('content')

    <div id="picker_app">
        <router-view></router-view>
    </div>

@endsection