<div class="row justify-content-center pb-3 pt-3 border text-center" id="listing_category_{{ $category->id }}">
    <div class="col-sm-2">
        {{ $category->id }}
    </div>
    <div class="col-sm-6">
        {{ $category->name }}
    </div>
    <div class="col-sm-4">
        <button class="btn btn-info btn-sm" onclick="editCategory({{ $category->id }})">
            Edit
        </button>
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
            data-target="#categoryModal{{ $category->id }}" data-id="{{ $category->id }}">
            Delete
        </button>
    </div>
</div>

{{-- delete modal --}}
<div class="modal fade" id="categoryModal{{ $category->id }}" tabindex="-1" role="dialog"
    aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Delete category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete category: {{ $category->name }} ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Yes
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
