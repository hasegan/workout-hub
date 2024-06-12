<form class="row justify-content-center pb-3 pt-3 border text-center" id="add_training">
    @csrf
    <div class="col-sm-12  text-center ">
        <label for="name">Training name: </label>
        <input name="name" type="text" placeholder=". . ." require autocomplete="off" id="name"
            onkeydown="removeWarningForName()">
        <span id="check-name" class="row justify-content-center text-danger"></span>
    </div>

    <div class="col-sm-12  text-center ">
        <label for="content" class="align-top">Training content: </label>
        <textarea name="content" type="text" placeholder=". . ." require autocomplete="off" id="content" rows="4"
            cols="80" onkeydown="removeWarningForTrainingContent()"></textarea>
        <span id="check-content" class="row justify-content-center text-danger"></span>
    </div>

    <div class="col-sm-12  text-center">
        <label for="category_id">Training category:</label>
        <select name="category_id" id="category_id" multiple onchange="removeWarningForTrainingCategory()">
            @foreach ($categories as $category)
                {
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                }
            @endforeach
        </select>
        <span id="check-category_id" class="row justify-content-center text-danger"></span>
    </div>

    <div class="col-sm-3">
        <button onclick="storeTraining()" type="button" class="btn btn-success btn-sm"> Submit</button>
        <button onclick="cancelCreateTraining()" type="button" class="btn btn-outline-secondary btn-sm"
            id="cancel-training"> Cancel</button>
    </div>
</form>
