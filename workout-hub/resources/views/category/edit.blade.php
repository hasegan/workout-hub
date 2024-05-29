<form class="row justify-content-center pb-3 pt-3 border text-center" id="edit_category_{{ $category->id }}">
    @csrf
    <div class="col-sm-2 ">
        {{ $category->id }}
    </div>
    <div class="col-sm-6 ">
        <label for="name">Category name:</label>
        <input name="name" type="text" value="{{ $category->name }}" id="name_{{ $category->id }}">
    </div>
    <div class="col-sm-4">
        <button onclick="updateCategory({{ $category->id }})" class="btn btn-success  btn-sm"
            type="button">Update</button>
        <button onclick="cancelEditCategory({{ $category->id }})" type="button"
            class="btn btn-outline-secondary btn-sm" id="cancel-category"> Cancel</button>
    </div>
</form>
