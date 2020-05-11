@extends('layouts.app')

@section('content')
<!--ボタン・リンククリック後に表示される画面の内容 -->
    <!--<div class="modal fade" id="alertcomment-comment-thread" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">-->
    <!--    <div class="modal-dialog">-->
    <!--        <div class="modal-content">-->
    <!--            <div class="modal-header">-->
    <!--                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"></span></button>-->
    <!--            </div>-->
    <!--            <div class="modal-body">-->
                    <!--@if(count($alert->alertcomments)>0)-->
                        <div class="card card-body">
                            <!--@foreach($alert->alertcomments->where('parent_id', null) as $alertcomment)-->
                            <!--@foreach($alertcomments as $alertcomment)-->
                                <table>
                                    <thread>
                                        <tr>
                                            <td>{{$alertcomment->user->name}}</td>
                                            <td>{{$alertcomment->comment}}</td>
                                            <td>{{$alertcomment->time}}</td>
                                        </tr>
                                    </thread>
                                </table>
                                <!--@foreach($alert->alertcomments->where('parent_id', $alertcomment->id) as $alertcomment)-->
                                <!--    <table>-->
                                <!--        <thread>-->
                                <!--            <tr>-->
                                <!--                <td>{{$alertcomment->user->name}}</td>-->
                                <!--                <td>{{$alertcomment->comment}}</td>-->
                                <!--                <td>{{$alertcomment->time}}</td>-->
                                <!--            </tr>-->
                                <!--        </thread>-->
                                <!--    </table>-->
                                <!--@endforeach-->
                            @endforeach
                        </div>
                    <!--@endif-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div> -->
@endsection