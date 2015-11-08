@extends('master')

@section('head_actions')
    <link rel="stylesheet" href="js/jquery.bxslider/jquery.bxslider.css"/>

    <script id="form_template" type="x-template">
        <form>
            <div class="step_1_content">
                <div class="step step_1">
                    <div class="card">
                        <div class="card-content grey-text">
                            <span class="card-title grey-text text-darken-4">How Many People Are Going?</span>
                            <div class="people_counter">
                                <button @click="onLessPeople" class="waves-effect waves-light btn remove_person">-</button>
                                <input type="number" v-model="rooms"  class="count" />
                                <button @click="onMorePeople" class="waves-effect waves-light btn add_button">+</button>
                            </div>
                        </div>
                        <div class="card-action">
                            <a @click="onStep1Next" href="#">Next</a>
                        </div>
                    </div>
                </div>
                <div class="step step_2">
                    <div class="card">
                        <div class="card-content grey-text">
                            <span class="card-title grey-text text-darken-4">Choose some dates</span>
                            <div class="date_pickers">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input placeholder="from" type="date" id="from" class="datepicker from-picker">
                                        <label for="from">From</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input placeholder="to" type="date" id="to" class="datepicker to-picker">
                                        <label for="to">To</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <a @click="onStep2Next" href="#">Next</a>
                        </div>
                    </div>
                </div>
                <div class="step step_3">
                    <div class="card">
                        <div class="card-content grey-text">
                            <span class="card-title grey-text text-darken-4">What's your max budget?</span>
                            <div class="budget">
                                <input v-model="max_price" placeholder="Max" type="number">
                            </div>
                        </div>
                        <div class="card-action">
                            <button @click="onFormDone" class="waves-effect waves-light btn">Explore Vacations!</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </script>
@endsection

@section('footer_scripts')
    <script src="http://cdn.jsdelivr.net/vue/1.0.7/vue.min.js"></script>
    <script src="/js/jquery.bxslider/jquery.bxslider.min.js"></script>
    <script src="/js/vue.router.js"></script>
    <script src="/js/ListingPicker.js"></script>
    <script src="/js/Form.js"></script>
    <script src="/js/app.js"></script>
    <script>

    </script>
@endsection


@section('content')

    <div id="app">
        <div v-if="routes_debug">
            <a v-link="{ path: '/' }">home</a>
            <a v-link="{ path: '/explore' }">explore</a>
        </div>
        <!-- route outlet -->
        <router-view></router-view>
    </div>

@endsection