@extends('master')

@section('head_actions')
    <script id="listing_template" type="x-template">
        <div class="hotelPicker">
            <div class="hotel">
                <h1>yo</h1>
            </div>
            <div class="choices">

            </div>
        </div>
    </script>
@endsection

@section('footer_scripts')
    <script>
        var hotel = <?php echo json_encode($hotel) ?>;
    </script>
    <script src="http://cdn.jsdelivr.net/vue/1.0.7/vue.min.js"></script>
    <script src="/js/vue.router.js"></script>
    <script src="/js/jquery.bxslider/jquery.bxslider.min.js"></script>
    <script src="/js/ListingPicker.js"></script>
@endsection


@section('content')

    <div id="picker_app">
        <router-view></router-view>
    </div>

@endsection