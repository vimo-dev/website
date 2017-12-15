@extends('main')

@section('title', '| Home')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md container main-content border rounded">
                    <div class="media">
                        <div class="media-body media-middle text-center">
                            <h1 class="home-main-heading media-heading display-4"> Die neue Victrix Mortalis Website! </h1>
                            <h2 class="text-muted">Under construction.</h2>
                        </div>
                        <img class="home-main-logo" src="img/vimo_complete.png" alt="Vimo logo"> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 container main-content border rounded">
                    <h1 class="text-center"> Recent Matches </h1>
                </div>
                <div class="col-md container sidebar border rounded">
                    <h1 class="text-center"> Rosters </h1>
                </div>
            </div>
        </div>
    </div>
@endsection