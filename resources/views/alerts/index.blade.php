@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold font-family-Tahoma">DISASTER  INFORMATION</h1>
    <div class='form-row'>
        <div class="col-sm-4 offset-sm-8">
            <div class="submit-select">
                <form id="submit_form" method="get" action="area_searches">
                    @include('commons.area_search')
                </form>
            </div>
        </div>
    </div>
    @include('alerts.posts', ['alerts'=>$alerts])
@endsection