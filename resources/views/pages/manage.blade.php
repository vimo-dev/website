@extends('main')

@section('title', '| Manage')

@section('content')
@if(Auth::user()->role >= 2)
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-8">
                    <div class="row container border rounded">
                        <h1 class="text-center"> Users </h1>
                    </div>
                    <div class="row container border rounded">
                        <h1 class="text-center"> Teams </h1>
                    </div>
                </div>
                <div class="col-md-2 container border rounded">
                    <h1 class="text-center"> Team Roles </h1>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row justify-content-md-center">
        <h1 class="text-center"> You are not an admin. </h1>
    </div>
@endif
@endsection