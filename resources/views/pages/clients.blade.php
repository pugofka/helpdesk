@extends('layouts.cabinet')

@section('content')



<div id="client">


    <clients ></clients>


    {{--
--}}
     {{--FORMS --}}

    {{--@include('partials.popup_form.client_create')--}}
    {{--@include('partials.popup_form.project_create')--}}
    {{--@include('partials.popup_form.client_update')--}}

</div>


@endsection

@section('scripts-footer')

<script>


    function contentMenuInit(){
        $(".content-menu .links a").click(function(){
            event.preventDefault();

            $(".content-menu .links a").removeClass("active").addClass("inactive");
            $(this).removeClass("inactive").addClass("active");

            var id = "#" + $(this).attr("data-id");
            $(".content-menu .content .item").hide();
            $(id).show();
        });
    }



</script>


@endsection
