@extends('layout.app')

@section('title', 'Trainings')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-left">
                <h2 class="m-0">Trainings</h2>
            </div>
            <div class="float-right">
                <button onclick="addTraining();" class="btn btn-success">Add Training</button>
            </div>
        </div>
    </div>
    <hr>
    <div id="js_add_training"></div>

    <div id="listing_trainings">
        @foreach ($trainings as $training)
            @include('workout.listingItem')
        @endforeach
    </div>
@endsection
