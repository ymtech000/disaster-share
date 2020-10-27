@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold font-family-Tahoma">DISASTER  INFORMATION</h1>
    <div class='form-row'>
        <div class="col-sm-4 offset-sm-8">
            <div class="submit-select">
                @include('commons.area_search')
                <div class="city"></div>
            </div>
        </div>
    </div>
    @include('alerts.posts', ['alerts'=>$alerts])
    <script src="{{ asset('/js/city_search.js') }}"></script>
@endsection
