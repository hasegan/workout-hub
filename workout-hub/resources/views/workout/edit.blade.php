<form class="border  m-4" id="edit_training_{{ $training->id }}">
    @csrf
    <div class="card-header">
        <label for="name">Training name: </label>
        <input name="name" type="text" value="{{ $training->name }}" id="name_{{ $training->id }}">
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>
                <label for="content" class="align-top">Training content: </label>
                <textarea name="content" type="text" require autocomplete="off" id="content" rows="4" cols="80"
                    value="{{ $training->content }}">{{ $training->content }}</textarea>
            </p>

            <button onclick="updateTraining({{ $training->id }})" class="btn btn-success  btn-sm"
                type="button">Update</button>
            <button onclick="cancelEditTraining({{ $training->id }})" type="button"
                class="btn btn-outline-secondary btn-sm" id="cancel-training"> Cancel</button>

            <footer class="blockquote-footer">
                <cite title="Category Name">
                    <label for="category_id">Training category:</label>
                    <select name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </cite>
            </footer>
        </blockquote>
    </div>
</form>
