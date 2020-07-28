@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold font-family-Tahoma">DISASTER  INFORMATION</h1>
    <div class='form-row'>
        <div class="col-sm-2 offset-sm-10">
            <div class="submit-select">
                <form id="submit_form" method="get" action="area_searches">
                    @include('commons.area_search')
                </form>
            </div>
        </div>
    </div>
    @include('commons.posts', ['alerts'=>$alerts])
    <script src="{{asset('/js/area_searches.js')}}"></script>
    <style>
        .user-img{
            border-radius:50%;
            margin-bottom:10px;
        }
        .submit-select{
            width:100%;
            text-align: right;
            margin-bottom:10px;
        }
        
        .side{
          display: flex;
          justify-content:space-between;
        }
        
        .icons li{
            display:inline-block;
        }
        
        .edit li{
            display:inline-block;
        }
    </style>
@endsection