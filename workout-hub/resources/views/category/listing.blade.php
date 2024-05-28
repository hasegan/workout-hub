@extends('layout.app')

@section('title', 'Categories')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-left">
                <h3>Category</h3>
                <br>
            </div>
            <div class="float-right">
                <button onclick="addCategory();" class="btn btn-success">Add Category</button>
            </div>
        </div>
    </div>
    <hr>
    <div id="js_add_category"></div>

    <table class="table">
        <thead class="thead-light">
            <tr class="row justify-content-center text-center">
                <th scope="col" class="col-sm-2">ID</th>
                <th scope="col" class="col-sm-8">Category Name</th>
                <th scope="col" class="col-sm-2">Actions</th>
            </tr>
        </thead>

        <tbody id="listing_categories">
            @foreach ($categories as $category)
                @include('category.listingItem')
            @endforeach
        </tbody>
    </table>
@endsection
