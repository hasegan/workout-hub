<div class="card m-4" id="listing_training_{{ $training->id }}">
    <div class="card-header">
        {{ $training->name }}
    </div>
    <div class="card-body py-2 px-4">
        <blockquote class="blockquote mb-0">
            <pre>{{ $training->content }}</pre>
            <button class="btn btn-info btn-sm" onclick="editTraining({{ $training->id }})">
                Edit
            </button>
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                data-target="#trainingModal{{ $training->id }}" data-id="{{ $training->id }}">
                Delete
            </button>

            <footer class="blockquote-footer">
                <cite title="Source Title">Category: {{ $training->category->name }}</cite>
            </footer>
        </blockquote>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="trainingModal{{ $training->id }}" tabindex="-1" role="dialog"
    aria-labelledby="trainingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trainingModalLabel">Delete training</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete training: {{ $training->name }} ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <form action="{{ route('trainings.destroy', $training->id) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
