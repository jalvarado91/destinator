@extends('master')

@section('footer_scripts')
    <script>
        $(document).ready(function() {
            console.log("Hello from start.blade.php");
        });
    </script>
@endsection


@section('content')

    <h1>I'm the form</h1>


    <form action="/search">
        <input type="text" name="max_guests">
        <button type="submit"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accen">
            YO!
        </button>
    </form>

@endsection