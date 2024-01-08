@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.sidebar')
        </div>
        <div class="col-6">
            <div class="">
                @include('shared.idea_card')
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_users')
        </div>
    </div>    
@endsection

