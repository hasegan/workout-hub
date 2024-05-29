@extends('layout.app')

@section('title', 'Categories')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-left">
                <h2 class="m-0">Categories</h2>
            </div>
            <div class="float-right">
                <button onclick="addCategory();" class="btn btn-success">Add Category</button>
            </div>
        </div>
    </div>
    <hr>
    <div id="js_add_category"></div>

    <div class="row justify-content-center pb-3 pt-3 border text-center text-white bg-secondary">
        <div class="col-sm-2">
            ID
        </div>
        <div class="col-sm-6">
            Category
        </div>
        <div class="col-sm-4">
            Actions
        </div>
    </div>
    <div id="listing_categories">
        @foreach ($categories as $category)
            @include('category.listingItem')
        @endforeach
    </div>
@endsection
