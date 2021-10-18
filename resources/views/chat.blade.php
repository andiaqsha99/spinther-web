@extends('voyager::master')

@section('page:header')
<div class="container-fluid">
    <h1 class="page-title">
        <i class="icon voyager-news"></i> Chat
    </h1>
</div>
@stop
@section('content')
<div class="page-content browse container-fluid">
    @include('voyager::alerts')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div id="app">
                        <chat-room :auth-user="spinther"></chat-room>
                    </div>
                    <script src="{{ mix('js/app.js') }}"></script>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
