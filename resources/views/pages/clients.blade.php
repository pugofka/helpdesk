@extends('layouts.cabinet')

@section('content')



<div id="client">
    <div class="row">
        <div class="col-xs-12 page-title-section">
            <h1 class="pull-left">Клиенты</h1>
            <a class="btn btn-primary pull-right" title="Create new client">+ Добавить клиента</a>
            <div class="clearfix"></div>
        </div>
    </div>

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
