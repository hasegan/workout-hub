<tr class="row justify-content-center text-center">
    <form class="row justify-content-center pb-3 pt-3 border text-center" id="edit_category_{{ $category->id }}">
        @csrf
        <td class="col-sm-2">{{ $category->id }}</td>
        <td class="col-sm-8">
            <input name="name" type="text" value="{{ $category->name }}" id="name_{{ $category->id }}">
        </td>
        <td class="col-sm-2">
            <button onclick="updateCategory({{ $category->id }})" class="btn btn-success  btn-sm"
                type="button">Update</button>
            <button onclick="cancelEditCategory({{ $category->id }})" type="button"
                class="btn btn-outline-secondary btn-sm" id="cancel-category"> Cancel</button>
        </td>
    </form>
</tr>
