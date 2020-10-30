@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold font-family-Tahoma">DISASTER  INFORMATION</h1>
    <input type="hidden" id="area_name" value="{{$area}}">
    <input type="hidden" id="city_name" value="{{$city}}">
    <div class='form-row'>
        <div class="col-md-4 offset-md-8">
            <div class="submit-select">
                <span>@include('commons.area_search')</span>
                <span>
                    <form id="submit_form" method="get" action="city_searches">
                        <div class="city">
                            @include('cities.search_hokkaido')
                        </div>
                    </form>
                </span>
            </div>
        </div>
    </div>
    <!--検索条件に一致した投稿を表示-->
    <div class="posts">
        @include('alerts.posts', ['alerts'=>$alerts])
    </div>
    <script src="{{ asset('/js/area_select.js') }}"></script>
@endsection
