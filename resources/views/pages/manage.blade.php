@extends('main')

@section('title', '| Manage')

@section('content')
@auth {{--  TODO: YOU ARE NOT AN ADMIN MSG  --}}
@if(Auth::user()->siterole_id >= 2)
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-8">
                    <div class="row container border rounded">
                        @include('manage.users')                        
                    </div>
                    <div class="row container border rounded">
                        @include('manage.teams')
                    </div>
                </div>
                <div class="col container border rounded">
                    <h2 class="text-center"> Team Roles </h2>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row justify-content-md-center">
        <h2 class="text-center"> You are not an admin. </h2>
    </div>
@endif
@endauth
@endsection